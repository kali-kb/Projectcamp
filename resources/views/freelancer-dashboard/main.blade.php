@extends('freelancer-dashboard.dashboard')
	@section('content')
		<h1 class="font-semibold text-xl mx-10 mt-6">Stats</h1>
	    <div class="flex flex-wrap">
		  <div class="max-w-md px-8 py-4 mx-auto mt-16 border bg-white rounded-lg shadow-sm dark:bg-gray-800">
		    <h2 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">Projects Taken</h2>
		    <p class="mt-2 text-gray-600 dark:text-gray-200 text-6xl">{{ $freelancer->projectsTakenSoFar() }}</p>
		  </div>
		  <div class="max-w-md px-8 py-4 mx-auto mt-16 border bg-white rounded-lg shadow-sm dark:bg-gray-800">
		    <h2 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">Projects Finished</h2>
		    <p class="mt-2 text-gray-600 dark:text-gray-200 text-6xl">{{ $freelancer->finishedJobsCount() }}</p>
		  </div>
		  <div class="max-w-md px-8 py-4 mx-auto mt-16 border bg-white rounded-lg shadow-sm dark:bg-gray-800">
		    <h2 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">Ongoing Project</h2>
		    <p class="mt-2 text-gray-600 dark:text-gray-200 text-6xl">{{ count($ongoing) }}</p>
		  </div>
		</div>

		<h1 class="font-semibold text-xl mx-10 mt-6 mb-3">Projects</h1>
		@if(count($ongoing) < 1)
			<p class="font-bold text-2xl text-center">No Projects Yet, <a class="text-blue-500" href="/fx/dashboard/search">Look for them here</a></p>
		@endif
		<div class="flex space-x-3 mx-10">
			@foreach($ongoing as $project)
				<div class="bg-green-500 rounded max-w-fit m-1">
				  <div class="items-center space-y-2 space-x-2 py-3">
				    <div class="flex mx-2 text-white">
				      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				        <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
				      </svg>
				      <span class="mx-2 text-white w-72">{{ $project->job->job_title }}</span>
				    </div>
				    <div class="text-white items-center space-x-1 flex">
				      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				        <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
				      </svg>
				      <span class="font-semibold">Price:</span>
				      <span class="text-sm font-bold mt-[2px]">{{ $project->job->price }}/hr</span>
				    </div>
				    <div id="{{ $project->job->job_id }}" class="flex items-center">
				      <button class="submit-button bg-white hover:scale-105 duration-150 px-2 py-1 mx-2 rounded text-green-500 text-sm font-bold">Submit Project</button>
				      <div class="bg-white flex py-1 rounded-xl px-2 mx-2">
				        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
				          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
				        </svg>
				        <button class="text-sm text-green-500 font-semibold px-2 rounded-xl">Ongoing</button>
				      </div>
				    </div>
				  </div>
				</div>
			@endforeach
		</div>
		
		<script type="text/javascript">

			console.log("executed")

			var buttons = document.getElementsByClassName("submit-button");
			for (var i = 0; i < buttons.length; i++) {
			  buttons[i].addEventListener("click", submitForm);
			}
            
			function submitForm(e) {
			  var button = e.target;
			  var id = button.parentNode.id;
			  window.localStorage.clear()
			  window.localStorage.job_id = id;
			  window.location.href = "/fx/submit_project";
			}

        </script>
	@endsection


