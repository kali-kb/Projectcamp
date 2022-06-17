@extends("freelancer-dashboard.dashboard")

@section("content")
			
	<div class="w-full flex my-2 justify-center">
      <form class="w-10/12" action="{{ route("search") }}" method="GET">
        <div class="w-full flex space-x-2">
          <input placeholder="Search" class="border rounded p-2 w-9/12" name="query" type="search" />
          <input class="bg-black rounded hover:bg-gray-900 py-2 px-4 text-md font-semibold text-[#b1ff00]" value="Go" type="submit" />
        </div>
      </form>
    </div>

    <div class="my-5">
		<h1 class="translate-x-24">Showing results for <strong>{{ $query }}</strong></h1>
		@if(count($results) > 0)
		    @foreach($results as $result)
		        <div class="h-auto sm:w-6/12 w-9/12 border shadow-sm rounded flex sm:items-center sm:flex-row flex-col justify-between mx-auto mt-10">
		          <div class="flex sm:flex-row flex-col items-center mx-4 space-x-3 my-3 sm:my-5">
		            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
		              <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
		            </svg>
		            <div class="flex flex-col">
		              <span class="font-semibold">{{ $result->job_title }}</span>
		              <span class="text-xs opacity-50">{{ $result->job_description }}</span>
		              <span>Ryan Bosner</span>
		              <div class="inline">
		                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#b1ff00] inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
		                  <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
		                </svg>
		                <span class="font-bold text-sm">${{ $result->price }}</span>
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
		              <span class="text-sm font-semibold">{{ $result->created_date }}</span>
		            </div>
		          </div>
		          <div class="m-2">
		            <button class="px-4 py-2 text-md sm:w-auto w-full rounded md:-translate-x-7 font-semibold bg-black text-[#b1ff00]">Apply</button>
		          </div>
		        </div>
		    @endforeach
    	@else
    		<div class="mx-auto my-9">
	    		<h1 class="text-5xl font-semibold text-center text-gray-300">Couldn't Not Find Any Jobs</h1>
	    		<h2 class="text-center text-xl text-gray-300">check your query</h2>
    		</div>
    	@endif	

    </div>
@endsection