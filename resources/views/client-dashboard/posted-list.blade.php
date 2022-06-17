@extends("client-dashboard.client-main")
@section("content")
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
	<div>
	<!--card-->
    <h1 class="text-center font-bold text-4xl my-3">Showing {{ count($posted_jobs) }} jobs </h1>
	@foreach($posted_jobs as $job)
		<div class="h-auto sm:w-6/12 w-9/12 border shadow-sm rounded flex sm:items-center sm:flex-row flex-col justify-between mx-auto mt-10">
		  <div class="flex sm:flex-row flex-col items-center mx-4 space-x-3 my-3 sm:my-5">
		    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
		      <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
		    </svg>
		    <div class="flex flex-col">
		      <span class="font-semibold">{{ $job->job_title }}</span>
		      <span class="text-xs opacity-50">{{ $job->job_description }}</span>
		      <span>You</span>
		      <div class="inline">
		        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#b1ff00] inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
		          <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
		        </svg>
		        <span class="font-bold text-sm">${{ $job->price }}</span>
		        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#b1ff00] inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
		          <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
		        </svg>
		        <span class="font-bold text-sm">Turkey</span>
		      </div>
		    </div>
		    <div class="flex items-center space-x-1">
		      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline text-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
		        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
		      </svg>
		      <span class="text-sm font-semibold">2h ago</span>
		    </div>
		  </div>
		</div>
	@endforeach	
	<!--card-->

	</div>

	@endif
@endsection