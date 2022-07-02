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
use App\Models\Hired;
use App\Models\Proposal;
use App\Models\SavedJobs;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EventNotification;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Http\Livewire\Bookmarked;
use App\Http\Livewire\ProposalsComponent;
use Illuminate\Support\Facades\Mail;
use Livewire\Event;
use App\Mail\ProjectDone;

Route::get('/', function () {
    return view("home");
});


// Route::group(["prefix" => "u"])


Route::get("/test", function(Request $request){
    // $freelancers = FreelancerModel::orderBy("rate", "desc")->get();
    // $client = DB::table("client")->get();
    // $job = JobModel::search("")->get();
    // if(empty("awd")){
    //     echo "true";
    // }
    // else{
    //     echo "false";
    // }

    echo session()->get("account_type");
    // echo $client;
    // $freelancers = FreelancerModel::where("rate", 39)->get();
    // $freelancer = FreelancerModel::find(2);
    // $freelancer->delete();
    

});



Route::get('/u/login', function(){
    if(request()->session()->exists("email")){
        $endpoint = session()->get("account_type") == "freelancer" ? "fx" : "cx";
        return redirect($endpoint . "/dashboard");
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



//there should be a file and size has to be less than 5mb
Route::post('u/register/freelancer/add', function(Request $request){
    $hashed_password = Hash::make($request->input("password"));
    $profile_image = $request->file("profile-image");
    $has_file = $request->hasFile("profile-image"); 
    $size = $has_file ? round(filesize($profile_image) / 1024 / 1024, 1) : 0;
    if(!$has_file && $size > 5){
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
        Session::put("account_type", $request->input("freelancer"));
        // session(["email" => $request->input("email")]);
        return redirect('/fx/dashboard');
    }
});

/** Code Repetition !! squash them into a single form handler **/

Route::post("/u/login/check", function(Request $request){
    $password = $request->input("pwd");
    $email = $request->input("email");
    $freelancer = FreelancerModel::where("email", $email)->get();
    if(count($freelancer) < 1){
        return redirect()->back()->with("email_error", "Provided email is incorrect");
    }
    else{    
        $hashed_password = $freelancer[0]["password"];
        if(Hash::check($password, $hashed_password)){
            session(["email" => $email, "account_type" => "freelancer"]);
            return redirect('fx/dashboard');
        }
        else{
            error_log("something went wrong");
            return redirect()->route("login")
                            ->with("password_error", "Provided password is not correct");
        }
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


//add a middleware to check if the current account accessing this route is freelancer
Route::prefix("fx")->group(function(){
    Route::get("/dashboard", function(){
        $saved_email = session()->get("email");
        $freelancer = DB::table("freelancer")->where("email", $saved_email)->get()[0];
        $ongoing = Hired::where("freelancer_id", $freelancer->freelancer_id)->get();
        return view("freelancer-dashboard.main", ["freelancer" => $freelancer, "ongoing" => $ongoing]);
    })->name("freelancer-dashboard")->middleware("freelancer_check", "userauth");

    //Replace with livewire
    Route::get('/dashboard/search/', function(){
        /* DRY CODE WARNING !! */

          /* this is inside livewire now */
        $saved_email = session()->get("email");
 
        $freelancer = DB::table("freelancer")->where("email", $saved_email)->get()[0];
        // $jobs =  JobModel::where("is_open", true)->orderBy("created_date", "asc")->get();
        $jobs =  JobModel::with(["proposals", "saved_job"])->where("is_open", true)->orderBy("created_date", "asc")->get();

        /**alternatives 
            Eager loading load related queries

            ==> JobModel::with(["proposal"])->get()

            gets jobs along with proposals

        **/

        return view("freelancer-dashboard.search-jobs", ["query" => "", "freelancer" => $freelancer]);

    })->middleware("userauth");


    Route::get('/dashboard/search/jobs', function(Request $request){
        /* DRY CODE HERE !! */
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
        $job_id = $request->input("job_id");
        $bidder = FreelancerModel::query()->where("email", $saved_email)->select("freelancer_id")->get()->first();
        $proposal_count = Proposal::where("freelancer_id", $bidder->freelancer_id)->get()->count();
        if($proposal_count > 0 && !(JobModel::find($job_id)->is_open)){
            return redirect("/fx/dashboard");
                    // ->withErrors
        }
        else{
            $proposal_text = $request->input("proposal_text");
            $bid = $request->input("bid");
            DB::table("proposal")->insert([
                "proposal_text" => $proposal_text,
                "bid" => $bid,
                "job_id" => $job_id,
                "freelancer_id" => $bidder["freelancer_id"]
            ]);
            // Notification::send($bidder, new EventNotification());
            return redirect()->route("freelancer-dashboard");
        }
    });


    Route::get("/dashboard/saved_jobs", Bookmarked::class)->middleware("userauth");


    Route::get("/submit_project", function(){
            $email = session()->get("email");
            $freelancer = FreelancerModel::where("email", $email)->get()->first();

        return view("freelancer-dashboard.submit", ["freelancer" => $freelancer]);
    })->name("submission")->middleware("userauth");

    Route::post("/submit_project/post", function(Request $request){
        error_log("job id:" . $request->input("job_id"));
        $client = JobModel::where("job_id", $request->input("job_id"))->get()->first()->client;
        $file = $request()->input("project-file");
        $subject = $request->input("description");
        if(request()->hasFile("project-file")){
            Mail::to("pjcamp81@gmail.com")
                ->send(new ProjectDone($file, $subject));
                // ->attach(request()->input("project-file"));
            // Mail::to("kalzokaleb@gmail.com"); //test
            $freelancer = FreelancerModel::where("email", session()->get("email"))->select("name")->first();
            $notification_data = [
                "event" => "You're project assigned to" . $freelancer["name"] . "is done check your inbox"
            ];
            Notification::send($client, new EventNotification($notification_data));
            error_log("excecuted");
            // JobModel::find($request->input("job_id"))->hired->delete()
            // JobModel::find($request->input("job_id"))->delete()
            return redirect("/fx/dashboard");
        }
        else{
            Log::warning("the project was not sent to the client");
            return redirect()->back()->with("Project Not Sent, Please Try Again");
        }
        //redirect with message bag to render on the freelancer dashboard
        // JobModel::where()
    })->name("submit");


});


// use controllers otherwise no caching
Route::prefix("cx")->group(function(){
    Route::get("/dashboard", function(){
        $client = Client::where("email", session()->get("email"))->get()->first();
        return view("client-dashboard.dashboard", ["client" => $client]);
    })->middleware("userauth");

    Route::get("/notifications", function(){
        $client = Client::where("email", session()->get("email"))->get()->first();
        // $client->notification->markAsRead();
        foreach($client->unreadNotifications as $notification){
            $notification->markAsRead();
        }
        return view("client-dashboard.notifications", ["client" => $client]);
    })->middleware("userauth");

    Route::get("/bills", function(){
        $client = Client::where("email", session()->get("email"))->get()->first();
        $hired = Hired::where("client_id", $client->id)->get();
        return view("client-dashboard.bills", ["client" => $client, "hired" => $hired]);
    });

    Route::get("/ongoing-jobs", function(){
        // ongoing
        $client = Client::where("email", session()->get("email"))->get()->first();
        $hired = Hired::where("client_id", $client->id)->get();
        return view("client-dashboard.ongoing-project", ["hired" => $hired, "client" => $client]);
    });

    Route::post("/login/check", function(Request $request){
        $password = $request->input("pwd");
        $email = $request->input("email");
        $client = Client::where("email", $email)->get();
        // $user = $request->input("f-type") == "freelancer" ? FreelancerModel::where("email", $email)->get() : Client::where("email", $email)->get();
        // if(empty($client) == 1)
        if(($client == []) != 1){    
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
        error_log(session()->get("email") . "email");
        $client = Client::where("email", session()->get("email"))->get()->first();
        error_log($client->id);
        $posted_jobs = JobModel::where("id", $client->id)->get();
        return view("client-dashboard.posted-list", ["client" => $client,"posted_jobs" => $posted_jobs]);
    })->middleware("userauth");

    Route::get("posted-jobs/{id}/proposals", ProposalsComponent::class)->middleware("userauth");
});


Route::get('/inertia', function(){
    return Inertia::render("Home");
});
