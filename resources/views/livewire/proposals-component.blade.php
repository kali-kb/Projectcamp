<div class="mx-auto translate-x-36">


      @if(count($proposals) < 1)
        <h1 class="text-center">No Proposals yet</h1>
      @else
        <!-- proposal count -->
        <div class="flex items-center translate-x-56 space-x-2 mt-2">
          <div class="bg-gray-200 inline-block px-2 py-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <h1 class="text-3xl text-gray-500 font-semibold">Proposals</h1>
          <span class="bg-gray-400 px-1 rounded-full mt-2 font-semibold text-white text-sm">{{count($proposals)}}</span>
        </div>
        @foreach($proposals as $proposal)
            <!-- proposal count -->
            <div class="flex rounded shadow-sm sm:flex-row flex-col justify-between items-center p-5 w-8/12 border h-auto mx-auto mt-10">
              <div class="flex space-x-3 items-center">
                <div class="h-12 w-12 ring ring-zinc-200 rounded-full overflow-hidden">
                  <img class="w-full object-cover h-12" src="{{ $proposal->freelancer->profile_image_url }}" alt="freelancer-image">
                </div>
                <span class="text-md font-bold">{{ $proposal->freelancer->name }}</span>
                <span class="">{{ $proposal->freelancer->career }}</span>

              </div>

              <div class="flex space-x-8">
                <div class="flex space-x-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <span class="text-sm font-semibold">{{ $proposal->freelancer->location }}</span>
                </div>
                <div class="flex space-x-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="font-semibold text-sm">Bid: ${{ $proposal->bid }}/hr</span>
                </div>
              </div>

              
              <!-- add a bid -->

              <div class="flex space-x-2 m-2">
                <button wire:click="acceptProposal({{ $proposal->id }})" class="bg-[#b1ff00] hover:bg-green-600 duration-150 font-semibold px-4 py-2 rounded text-white">Accept</button>
                <button wire:click="removeProposal({{ $proposal->id }})" class="bg-red-500 hover:bg-red-600 duration-150 rounded sm:w-auto w-full px-4 py-2 text-white font-semibold">Decline</button>
              </div>
            </div>
        @endforeach
    @endif
</div>
