@extends("client-dashboard.client-main")

@section("content")
	<div class="flex flex-col mx-auto sm:translate-x-24">
		@foreach($client->notifications as $notification)
			{{-- notifications --}}
			<div class="mx-auto items-center justify-between sm:px-5 px-2 h-16 w-7/12 border my-2 rounded flex hover:border-green-500 duration-100">
			  <div class="flex items-center space-x-3">
			    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 p-2 rounded-full bg-green-500 text-white" viewBox="0 0 20 20" fill="currentColor">
			      <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
			    </svg>
			    <span>{{ $notification->data["message"] }}</span>
			  </div>
			  <div class="flex items-center space-x-1">
			    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 text-green-500 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
			      <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
			    </svg>
			    <span class="font-semibold text-sm">2hr</span>
			  </div>
			</div>
		@endforeach
	</div>
@endsection