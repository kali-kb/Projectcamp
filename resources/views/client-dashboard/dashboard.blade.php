@extends('client-dashboard.client-main')
@section('content')
	<div class="translate-x-72">
		<div>
		  <h1 class="m-7 text-3xl font-bold">Stats</h1>
		  <div class="mx-5 flex sm:flex-row flex-col space-x-8 sm:space-y-0 space-y-4">
		    <div class="flex max-w-fit flex-col rounded border py-6 px-12">
		      <h1 class="text-3xl">Jobs Assigned</h1>
		      <span class="text-6xl">{{ count($ongoing_jobs) }}</span>
		    </div>
		    <div class="flex max-w-fit flex-col rounded border py-6 px-12 sm:-translate-x-0 -translate-x-8">
		      <h1 class="text-3xl">Jobs Posted</h1>
		      <span class="text-6xl">{{ count(App\Models\JobModel::where("id", $client->id)->get()) }}</span>
		    </div>
		  </div>
		</div>

		<div class="mx-7 my-7 space-y-6">
		  <h1 class="font-bold text-3xl">Ongoing Project</h1>
		  @if(count($ongoing_jobs) < 1)
		  	<p class="text-2xl text-center left-50">You havent assigned any projects yet</p>
		  @else
		  	<div class="flex flex-row space-x-5 flex-wrap">
			  	@foreach($ongoing_jobs as $ongoing_job)
				  <div class="max-w-fit rounded border mb-5 border-green-500 duration-150 hover:border-green-700">
				    <div class="items-center space-y-2 space-x-2 py-3">
				      <div class="mx-2 flex text-white">
				        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				          <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
				        </svg>
				        <span class="mx-2 text-black">{{ $ongoing_job->job->job_title }}</span>
				      </div>
				      <div class="flex items-center space-x-1 text-white">
				        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				          <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
				        </svg>
				        <span class="font-semibold text-black">Cost:</span>
				        <span class="mt-[2px] text-sm font-bold text-black">{{ $ongoing_job->job->price }}/hr</span>
				      </div>
				      <div class="flex items-center">
				        <!-- <button class="bg-white hover:scale-105 duration-150 px-2 py-1 mx-2 rounded text-green-500 text-sm font-bold">Submit Project</button> -->
				        <div class="mx-2 flex rounded-xl border border-green-200 bg-white py-1 px-2">
				          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
				            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
				          </svg>
				          <button class="rounded-xl px-2 text-sm font-semibold text-green-500">Ongoing</button>
				        </div>
				      </div>
				    </div>
				  </div>
				@endforeach
			<div>
		@endif
		</div>
	</div>


@endsection