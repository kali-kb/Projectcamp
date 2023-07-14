@extends("client-dashboard.client-main")

@section("content")
	<!-- bills page -->
	<div class="mx-auto flex flex-col translate-x-16 sm:w-7/12">
	  <div class="overflow-x-auto border rounded my-2">
	    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
	        <thead class="text-xs text-gray-700 uppercase bg-green-50 dark:bg-gray-700 dark:text-gray-400">
	            <tr>
	                <th scope="col" class="px-6 py-3">
	                    Assigned project
	                </th>
	                <th scope="col" class="px-6 py-3">
	                    Freelancer
	                </th>
	                <th scope="col" class="px-6 py-3">
	                    Date
	                </th>
	                <th scope="col" class="px-6 py-3">
	                    Payable
	                </th>

	            </tr>
	        </thead>
	        <tbody>
	        @foreach($hired as $hired)
	            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
	                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
	                    {{ $hired->job->job_title }}
	                </th>
	                <td class="px-6 py-4">
	                    {{ $hired->hired_freelancer->name }}
	                </td>
	                <td class="px-6 py-4">
	                    {{ $hired->job->created_date }}
	                </td>
	                <td class="px-6 py-4">
	                    ${{ $hired->job->price }}/hr
	                </td>

	            </tr>
            @endforeach
	        </tbody>
	    </table>
	  </div>
	  <div class="border px-10 rounded max-w-max my-4 py-3 space-y-4">
	      <span class="text-3xl">Your Total Due</span>
	      <div class="flex items-center">
	        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 text-green-500 w-10" viewBox="0 0 20 20" fill="currentColor">
	          <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
	          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
	        </svg>
	        <span class="text-3xl font-medium">{{ $client->total_cost }}/hr</span>
	      </div>
	  </div>
	</div>
@endsection