<div class="mx-5">
    <h1 class="text-2xl my-3 font-bold">Bookmarked jobs</h1>
    @if(count($saved_jobs) > 0)
         @foreach($saved_jobs as $job)
            <div id="{{ $job->jobs->job_id }}" class="h-auto sm:w-full w-9/12 border shadow-sm rounded flex sm:items-center sm:flex-row flex-col justify-between mx-auto mt-10">
              <div class="flex sm:flex-row flex-col items-center mx-4 space-x-3 my-3 sm:my-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <div class="flex flex-col">
                  <span class="font-semibold">{{ $job->jobs->job_title }}</span>
                  <span class="text-xs opacity-50">{{ Str::limit($job->jobs->job_description, 70) }}</span>
                  <span>{{ $job->jobs->client->name }}</span>
                  <div class="inline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#b1ff00] inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="font-bold text-sm">${{ $job->jobs->price }}/hr</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#b1ff00] inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg> 
                    <span class="font-bold text-sm">{{ $job->jobs->client->location }}</span>
                    <div class="mx-10 inline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#b1ff00] inline" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                        <span class="font-bold text-sm">{{ count($job->jobs->proposals()->where("job_id", $job->jobs->job_id)->get()) }} Proposals</span>
                    </div>
                  </div>
                </div>
                <div class="flex items-center space-x-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline text-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="text-sm font-semibold">{{ Carbon\Carbon::parse($job->jobs->created_date)->diffForHumans() }}</span>
                </div>
              </div>
              <div id="{{ $job->jobs->job_id }}" class="flex m-2 space-x-10">
                <button id="save-btn" wire:click="removeSaved({{ $job->jobs->job_id }})" class="hover:bg-green-100 hover:duration-200 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="active:bg-green-300 h-6 text-[#b1ff00] w-6 fill-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                </button>
                @if($job->jobs->hasFreelancerApplied() && $job->jobs->is_open)
                  <button id="apply-btn" class="px-4 py-2 text-md sm:w-auto w-full rounded md:-translate-x-7 font-semibold bg-black text-gray-500 hover:bg-grey-900">Applied</button>
                @elseif(!($job->jobs->hasFreelancerApplied()) && $job->jobs->is_open)
                  <button onClick="navigateToProposalFormPage({{$job->jobs->job_id}})" id="apply-btn" class="px-4 py-2 text-md sm:w-auto w-full rounded md:-translate-x-7 font-semibold bg-black text-[#b1ff00] hover:bg-grey-900">Apply</button>

                @endif
              </div>
            </div>
        @endforeach
    @else
        <h1>You havent saved any job</h1>
    @endif

    <script>
      function navigateToProposalFormPage(job_id) {
        window.localStorage.job_id = job_id
        window.location.href = "/fx/dashboard/apply"
        console.log("The button was clicked");
      }
    </script>
</div>
