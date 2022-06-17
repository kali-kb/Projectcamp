@extends('freelancer-dashboard.dashboard')

@section("content")
<div>
  <section class="relative w-full px-5 py-4 mx-auto rounded-md">
        <div class="flex flex-col">
            <!--orignal-->
{{--             <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
            <input type="search" class="w-full py-3 pl-10 pr-4 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-black focus:outline-none focus:ring" placeholder="Search"> --}}
            <!--orignal-->
                        
            <div class="w-full flex my-2">
              <form class="w-10/12" action="{{ route("search") }}" method="GET">
                <div class="w-full flex space-x-2">
                  <input placeholder="Search" class="border rounded p-2 w-9/12" name="query" type="search" />
                  <input class="bg-black rounded hover:bg-gray-900 py-2 px-4 text-md font-semibold text-[#b1ff00]" value="Go" type="submit" />
                </div>
              </form>
            </div>

{{--         <div class="absolute inset-x-0 px-6 py-3 mx-5 mt-4 overflow-y-auto bg-white border rounded-md max-h-72 dark:bg-gray-800 dark:border-transparent">
            <a href="#" class="block py-1">
                <h3 class="font-medium text-gray-700 dark:text-gray-100 hover:underline">Software engineer</h3>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">02/04/2020</p>
            </a>
        </div> --}}

        <!--jobs -->
        <div class="my-5">
            <h1>Showing <strong>Recently Posted</strong> Jobs</h1>
            @foreach($jobs as $job)
                <div id="{{ $job->job_id }}" class="h-auto sm:w-full w-9/12 border shadow-sm rounded flex sm:items-center sm:flex-row flex-col justify-between mx-auto mt-10">
                  <div class="flex sm:flex-row flex-col items-center mx-4 space-x-3 my-3 sm:my-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div class="flex flex-col">
                      <span class="font-semibold">{{ $job->job_title }}</span>
                      <span class="text-xs opacity-50">{{ $job->job_description }}</span>
                      <span>{{ $job->client->name }}</span>
                      <div class="inline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#b1ff00] inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="font-bold text-sm">${{ $job->price }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#b1ff00] inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg> 
                        <span class="font-bold text-sm">{{ $job->client->location }}</span>
                        <div class="mx-10 inline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#b1ff00] inline" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                            <span class="font-bold text-sm">{{ count($job->proposals()->where("job_id", $job->job_id)->get()) }} Proposals</span>
                        </div>
                      </div>
                    </div>
                    <div class="flex items-center space-x-1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline text-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <span class="text-sm font-semibold">{{ Carbon\Carbon::parse($job->created_date)->diffForHumans() }}</span>
                    </div>
                  </div>
                  <div id="{{ $job->job_id }}" class="flex m-2 space-x-10">
                    <button id="save-btn" class="hover:bg-green-100 hover:duration-200 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="active:bg-green-300 h-6 text-black w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                    </button>
                    <button id="apply-btn" class="px-4 py-2 text-md sm:w-auto w-full rounded md:-translate-x-7 font-semibold bg-black text-[#b1ff00] hover:bg-grey-900">Apply</button>
                  </div>
                </div>
            @endforeach
                
        </div>
        <!--jobs-->
    </section>
</div>

<script type="text/javascript">
    var button = document.getElementById("apply-btn")
    var save = document.getElementById("save-btn")

    button.addEventListener("click", proposalForm)
    save.addEventListener("click", bookmark)


    function bookmark(e){
        e.preventDefault()
        console.log("hello")
        ic = save.children[0]
        ic.classList.add(" fill-[#b1ff00]")
        // ic.class += " fill-[#b1ff00]"
        // ic.setAttribute("class", "fill-[#b1ff00]")
        window.location.href = "dashboard/saved_jobs/save"
        
    }


    function proposalForm(e){
        var id = button.parentNode.id
        window.localStorage.job_id = id
        window.location.href = "/fx/dashboard/apply"
    }
    
</script>


@endsection