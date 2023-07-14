@extends("client-dashboard.client-main")
@section("content")
@use Illuminate\Support\Str

	@if(count($posted_jobs) < 1)
		<div class="border h-auto sm:w-96 w-10/12 mx-auto shadow-sm my-9">
		  <div class="flex flex-col m-2 space-y-5">
		    <h1 class="text-3xl text-center font-semibold">You Haven't posted anything</h1>
			<button class="font-semibold hover:bg-gray-900 bg-black text-[#b1ff00] px-3 py-1 rounded-sm">
		    	<a href="/cx/post-job">
			    	Post a job
			    </a>
		    </button>
		  </div>
		</div>
	@else
	<div class="mx-auto sm:translate-x-32 w-9/12">
	<!--card-->
    <h1 class="text-center font-bold text-4xl my-3">Showing {{ count($posted_jobs) }} jobs </h1>
    <button class="px-6 py-3 font-bold mt-4 rounded-md bg-[#b1ff00] text-black"><a href="/cx/post-job">Post a job</a></button>
	@foreach($posted_jobs as $job)
		<div class="mt-10 mb-5 flex h-auto flex-col justify-between rounded border shadow-sm sm:flex-row sm:items-center">
		  <div class="mx-4 my-3 flex flex-col items-center space-x-3 sm:my-5 sm:flex-row">
		    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
		      <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
		    </svg>
		    <div class="flex flex-col">
		      <span class="font-semibold">{{ $job->job_title }}</span>
		      <span class="text-xs opacity-50">{{ Str::limit($job->job_description, 70) }}</span>
		      <span>{{ $client->name }}</span>
		      <div class="flex sm:flex-row flex-col items-center">
		        <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5 text-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
		          <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
		        </svg>
		        <span class="text-sm font-bold">${{ $job->price }}/hr</span>
		        <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 inline h-4 w-4 text-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
		          <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
		        </svg>
		        <span class="text-sm font-bold">{{ $client->location }}</span>
		        
		        <div class="mx-4 flex sm:flex-row items-center space-x-2">
		          <div class="flex -space-x-2">
		          	@foreach($job->proposals as $proposal)
			            <div class="h-4 w-4 ring-2 ring-[#b1ff00] overflow-hidden object-cover rounded-full">
			              <img class="w-full h-full object-cover" src="{{ $proposal->freelancer->profile_image_url }}" alt="proposer_image">
			            </div>
		            @endforeach
		          </div>

		          @php
				    $proposals = $proposals->where("job_id", $job->job_id);
				  @endphp


		          @if(count($job->proposals) < 2)
				      <span class="text-sm font-bold text-[#b1ff00]">{{ count($job->proposals) }} Proposal
				      </span>
			      @else
				      <span class="text-sm font-bold text-[#b1ff00]">{{ count($job->proposals) }} Proposals</span>
			      @endif

			      @if(!$job->is_open)
			      	<span class="bg-green-100 px-2 py-1">Assigned</span>    
			      @endif
		        </div>
		      </div>
		    </div>
		    <div class="flex items-center space-x-1">
		      <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 text-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
		        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
		      </svg>
		      <span class="text-sm font-semibold">{{ Carbon\Carbon::parse($job->created_date)->diffForHumans() }}</span>
		    </div>
		  </div>
		  @if(count($job->proposals) == 0 && $job->is_open)
		  	<button class="m-7 rounded bg-gray-300 py-2 duration-150 font-semibold text-black sm:px-3">No Proposal yet</button>
		  @elseif (count($job->proposals) > 0 && $job->is_open)
		  	<a href="/cx/posted-jobs/{{ $job->job_id }}/proposals">
			  <button class="m-7 rounded bg-black py-2 hover:bg-gray-900 duration-150 font-semibold text-[#b1ff00] sm:px-3">Browse Proposals</button>
		  	</a>
		  @endif
		</div>
	@endforeach	
	<!--card-->

	</div>

	@endif
@endsection