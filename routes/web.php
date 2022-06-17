<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\FreelancerModel;
use App\Models\JobModel;
use App\Models\Client;
use App\Models\Proposal;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EventNotification;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // echo DB::table("freelancer")->get();
    // session
    // echo session()->get("email");
    return view("home");
});



// Route::get('/', function () {
//     echo var_dump(Hash::info(DB::table("freelancer")->get('password'))) ;
// });


// Route::group(["prefix" => "u"])


Route::get("/test", function(Request $request){
    // $freelancers = FreelancerModel::orderBy("rate", "desc")->get();
    $client = DB::table("client")->get();
    $job = JobModel::search("")->get();
    if(empty("awd")){
        echo "true";
    }
    else{
        echo "false";
    }
    // echo $client;
    // $freelancers = FreelancerModel::where("rate", 39)->get();
    // $freelancer = FreelancerModel::find(2);
    // $freelancer->delete();
    

});



Route::get('/u/login', function(){
    if(request()->session()->exists("email")){
        return redirect("/dashboard");
    }
    else{
        return view('auth.login');
    }
})->name("login");



Route::get('/u/register', function(){
    return view('auth.register');
});

Route::get('u/register/client', function(){
    return view('auth.client-register');
});


Route::get('u/register/freelancer', function(){
    return view('auth.freelancer-register');
});


Route::get('u/logout', function(Request $request){
    $request->session()->forget("email");
    // session("email")->flush();
    return redirect()->route("login");
});



//file size has to be less than 5mb
Route::post('u/register/freelancer/add', function(Request $request){
    $hashed_password = Hash::make($request->input("password"));
    $profile_image = $request->file("profile-image");
    $size = round(filesize($profile_image) / 1024 / 1024, 1);
    if($size > 5){
        //add validation message
        return redirect("u/register/freelancer");
                    // ->withErrors()
    }
    else{    
        $path = Cloudinary::upload($profile_image->getRealPath())->getSecurePath();
        DB::table('freelancer')->insert([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "profile_image_url" => $path,
            "career" => $request->input("career"),
            "location" => $request->input("location"),
            "rate" => $request->input("rate"),
            "password" => $hashed_password
        ]);
        Session::put("email", $request->input("email"));
        // session(["email" => $request->input("email")]);
        return redirect('/fx/dashboard');
    }
});

/** Code Repetition !! squash them into a single form handler **/

Route::post("/u/login/check", function(Request $request){
    $password = $request->input("pwd");
    $email = $request->input("email");
    $freelancer = FreelancerModel::where("email", $email)->get();
    $hashed_password = $freelancer[0]["password"];
    if(Hash::check($password, $hashed_password)){
        session(["email" => $email, "account_type" => "freelancer"]);
        return redirect('fx/dashboard');
    }
    else{
        error_log("something went wrong");
        return redirect()->route("login");
    }
});



Route::post("/cx/login/check", function(Request $request){
    $password = $request->input("pwd");
    $email = $request->input("email");
    $client = Client::where("email", $email)->get();
    // $user = $request->input("f-type") == "freelancer" ? FreelancerModel::where("email", $email)->get() : Client::where("email", $email)->get();
    if(empty($client) != 1){    
        $hashed_password = $client[0]["password"];
        if(Hash::check($password, $hashed_password)){
            session(["email" => $email, "account_type" => "client"]);
            return redirect('cx/dashboard');
        }
        else{
            return redirect()->route("login");
        }
    }
    else{
        return redirect()
                // ->withErrors() //provide errors
                ->route("login");
    }
});

/** Code Repetition !! squash them into a single form handler **/



Route::post("u/register/client/add", function(Request $request){
    DB::table('client')->insert([
        "name" => $request->input("name"),
        "password" => Hash::make($request->input("password")),
        "email" => $request->input("email"),
        "location" => $request->input("location"),
        "total_spent" => 0,
    ]);
    session(["email" => $request->input("email")]);
    error_log(session()->get("email"));
    return redirect('cx/dashboard');
});


Route::prefix("fx")->group(function(){
    Route::get("/dashboard", function(){
        $saved_email = session()->get("email");
        $freelancer = DB::table("freelancer")->where("email", $saved_email)->get()[0];
        return view("freelancer-dashboard.main", ["freelancer" => $freelancer]);
    })->middleware("userauth");

    Route::get('/dashboard/search/', function(Request $request){
        /* DRY CODE WARNING !! */
        $saved_email = session()->get("email");
 
        $freelancer = DB::table("freelancer")->where("email", $saved_email)->get()[0];
        $jobs =  JobModel::where("is_open", true)->orderBy("created_date", "asc")->get();

        /**alternatives 
            Eager loading load related queries

            ==> JobModel::with(["proposal"])->get()

            gets jobs along with proposals

        **/

        return view("freelancer-dashboard.search-jobs", ["query" => "", "freelancer" => $freelancer, "jobs" => $jobs]);

    })->middleware("userauth");


    Route::get('/dashboard/search/jobs', function(Request $request){
        /* DRY CODE WARNING !! */
        $saved_email = session()->get("email");
        $freelancer = DB::table("freelancer")->where("email", $saved_email)->get()[0];
        $query = $request->input("query");
        // $results = JobModel::search($query)->get();
        $results = JobModel::query()->where("job_title", "LIKE", "%{$query}%")->get();
        return view("freelancer-dashboard.search-results", [
            "freelancer" => $freelancer,
            "results" => $results,
            "query" => $query
        ]);

    })->name("search");

    Route::get("/dashboard/apply", function(){
        //check if the freelancer already applied
        $saved_email = session()->get("email");
        $freelancer = DB::table("freelancer")->where("email", $saved_email)->get()[0];

        return view("freelancer-dashboard.application-page", ["freelancer" => $freelancer]);
    })->middleware("userauth");


    Route::post("/dashboard/apply/done", function(Request $request){
        //check if the freelancer already applied
        $saved_email = session()->get("email");
        $bidder = FreelancerModel::query()->where("email", $saved_email)->select("freelancer_id")->get()->first();
        $proposal_count = Proposal::where("freelancer_id", $bidder->freelancer_id)->get()->count();
        if($proposal_count > 0){
            return redirect("/fx/dashboard");
        }
        else{
            $proposal_text = $request->input("proposal_text");
            $bid = $request->input("bid");
            $job_id = $request->input("job_id");
            DB::table("proposal")->insert([
                "proposal_text" => $proposal_text,
                "bid" => $bid,
                "job_id" => $job_id,
                "freelancer_id" => $bidder["freelancer_id"]
            ]);
            // Notification::send($bidder, new EventNotification());
            return redirect()->route("search");
        }
    });

    Route::get("/dashboard/saved_jobs", function(){
        $email = session()->get("email");
        $freelancer_id = DB::table("freelancer")->where("email", $email)->select("id")->get()[0];
        $saved_jobs = DB::table("saved_jobs")->where("freelancer_id", $freelancer_id)->get();
        return view("freelancer-dashboard.search-results.blade.php", $saved_jobs);
    })->middleware("userauth");

    Route::post("dashboard/saved_jobs/save", function(){
        $saved_by = FreelancerModel::query()->where("email", "kalzokaleb@gmail.com")->select("freelancer_id")->get();
        DB::table("saved_job")->insert([
            "job_id" => $job_id,
            "freelancer" => $saved_by
        ]);
        return redirect(request()->headers->get('referer'));
    });
    // Route::post("/dashboard/apply/send", function(Request $request){

    // });


    Route::get("/dashboard/saved-jobs", function(){
        return view("freelancer-dashboard.saved-jobs");
    });
});


// use controllers otherwise no caching
Route::prefix("cx")->group(function(){
    Route::get("/dashboard", function(){
        return view("client-dashboard.dashboard");
    })->middleware("userauth");

    Route::get("/post-job", function(){
        return view("client-dashboard.job-post");
    })->middleware("userauth");

    Route::post("/post-job/new", function(Request $request){
        $client = Client::where("email", session()->get("email"))->get();
        DB::table("job")->insert([
            "job_title" => $request->input("title"),
            "price" => $request->input("price"),
            "job_description" => $request->input("description"),
            "id" => $client[0]["id"],
        ]);
        return redirect("/cx/dashboard");
    })->middleware("userauth");

    //try except and logging
    Route::get("/posted-jobs", function(){
        $client_id = Client::where("email", session()->get("email"))->select("id")->get();
        $posted_jobs = DB::table("job")->where("id", $client_id[0]["id"])->get();
        return view("client-dashboard.posted-list", ["posted_jobs" => $posted_jobs]);
    });
});






Route::get('/inertia', function(){
    return Inertia::render("Home");
});
