<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="overflow-x-hidden">

<aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
    <div>
        <div class="-mx-6 px-6 py-4">
            <a href="#" title="home">
                <img src="/images/project-camp-logo.png" class="w-12" alt="projectcamp logo">
            </a>
        </div>

        <div class="mt-8 text-center">
            <img src="https://avatars.dicebear.com/api/initials/{{ $client->name[0]}}.svg" alt="" class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
            <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">{{ $client->name }}</h5>
            <span class="hidden text-gray-400 lg:block">Client Dashboard</span>
        </div>

        <ul class="space-y-2 tracking-wide mt-8">
            <li>
                <a href="/cx/dashboard" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white  visited:bg-black">
                    <svg class="-ml-1 h-6 w-6 group-hover:text-[#b1ff00]" viewBox="0 0 24 24" fill="none">
                        <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current text-black group-hover:text-green-300"></path>
                        <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current text-black group-hover:text-green-300"></path>
                        <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current text-black group-hover:text-green-300"></path>
                    </svg>
                    <span class="-mr-1 font-medium text-black group-hover:text-green-300">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/cx/posted-jobs" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group visited:bg-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:text-[#b1ff00]" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M9 9a2 2 0 114 0 2 2 0 01-4 0z" />
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a4 4 0 00-3.446 6.032l-2.261 2.26a1 1 0 101.414 1.415l2.261-2.261A4 4 0 1011 5z" clip-rule="evenodd" />
                    </svg>
                    <span class="group-hover:text-gray-700">Posted Jobs</span>
                </a>
            </li>
            <li>
                <a href="/cx/ongoing-jobs/" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span class="group-hover:text-gray-700">Ongoing</span>
                </a>
            </li>

            <li>
                <a href="/cx/bills" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:text-[#b1ff00]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                  </svg>
                    <span class="group-hover:text-gray-700">Bill</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
        <a href="/u/logout">        
            <button class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="group-hover:text-gray-700">Logout</span>
            </button>
        </a>
    </div>
</aside>
<div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
        <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Dashboard</h5>
            <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="flex space-x-4">
                <a href="/cx/notifications">                
                    <button aria-label="notification" class="w-10 h-10 rounded-xl border hover:bg-[#b1ff00] focus:bg-gray-100 active:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:text-white m-auto text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                        @if(count($client->unreadNotifications) > 0)
                            <span class="absolute translate-x-2 text-sm font-semibold bg-[#b1ff00] px-2 py-0.5 rounded-full text-white -translate-y-1">{{ count($client->unreadNotifications) }}</span>
                        @endif    
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
    @show
    @yield("content")
    @livewireScripts
</body>
</html>