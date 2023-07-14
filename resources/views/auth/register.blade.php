<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.tailwindcss.com"></script>
		<title></title>
	</head>
	<body>

		<div class="relative py-16
		                before:absolute before:inset-0 before:w-full before:h-[50%]">
		    <div class="relative container m-auto px-6 text-gray-500 md:px-12 xl:px-40">

		        <div class="m-auto space-y-8 md:w-8/12 lg:w-full">
		            <img src="../../../images/project-camp-logo.png" loading="lazy" class="w-24 ml-4" alt="tailus logo">
		            <div class="rounded-xl border bg-opacity-50 backdrop-blur-2xl bg-white shadow-xl">
		                <div class="lg:grid lg:grid-cols-2">
		                    <div class="rounded-lg lg:block" hidden>
		                        <img src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mjl8fHdvcmt8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" class="rounded-l-xl object-cover" loading="lazy" height="" width="" alt="music mood">
		                    </div>
		                    <div class="p-6 sm:p-16">
		                        <h2 class="mb-8 text-2xl text-black font-bold">Create a new account</h2>
		                        {{-- <form action="" class="space-y-8"> --}}
		                        	{{-- @csrf --}}
		                            <div class="space-y-2">
		                                <label for="email" class="text-gray-700">Email</label>
		                                <input  type="email" name="email" id="email" 
		    class="block w-full px-4 py-3 rounded-md border border-gray-300 text-gray-600 transition duration-300
		        focus:ring-2 focus:ring-green-300 focus:outline-none
		        invalid:ring-2 invalid:ring-red-400"
		                                >
		                            </div>

		                            <div>
		                                <div class="flex items-center justify-between">
		                                    <label for="pwd" class="text-gray-700">Password</label>
		                                    <button class="p-2 -mr-2" type="reset">
		                                    </button>
		                                </div>
		                                <input  type="password" name="pwd" id="pwd" 
		                                        class="block w-full px-4 py-3 rounded-md border border-gray-300 text-gray-600 transition duration-300
		                                            focus:ring-2 focus:ring-green-300 focus:outline-none
		                                            invalid:ring-2 invalid:ring-red-400"
		                                >
		                            </div>
		                            <div class="mt-10 space-y-4">
			                            <button type="submit" id="sub" name="freelancer" 
			                                    class="w-full hover:scale-105 py-3 px-6 rounded-md bg-black
			                                        focus:bg-gray-700 active:bg-gray-500">
			                                <span class="text-[#b1ff00] font-semibold">Create a Freelancer account</span>
			                            </button>
			                            <button type="submit" id="sub2" name="client" 
			                                    class="w-full hover:scale-105 py-3 px-6 rounded-md
			                                         bg-[#b1ff00]">
			                                <span class="text-black font-bold">Create a Client account</span>
			                            </button>
		                            </div>


		                            <p class="border-t pt-6 text-sm">
		                                Already have an account ? 
		                                <a href="/u/login" class="text-[#66a753]">Sign in</a>
		                            </p>
		                        {{-- </form> --}}
		                    </div>
		                </div>
		            </div>
		            <div class="text-center space-x-4">
		                <span>&copy; ProjectCamp</span>
		                <a href="#" class="text-sm hover:text-sky-900">Contact</a>
		                <a href="#" class="text-sm hover:text-sky-900">Privacy & Terms</a>
		            </div>
		        </div>
		    </div>
		</div>

    <script type="text/javascript">

    	var sub = document.getElementById("sub")
    	var sub_two = document.getElementById("sub2")

    	var email = document.getElementById("email")
    	var password = document.getElementById("pwd")

    	sub.addEventListener('click', s1)
    	sub2.addEventListener('click', s2)

    	
    	function s1(e){
    		window.localStorage.email = email.value
    		window.localStorage.password = password.value
    		window.location.href = '/u/register/freelancer'
    		// window.location.href = '/'
    	}

    	function s2(e){
    		window.localStorage.email = email.value
    		window.localStorage.password = password.value
    		window.location.href = '/u/register/client'
    		// window.location.href = '/'
    	}

    	/*
    	if(e.target.name == "freelancer"){
    		//freelancer register route
    	}
    	else{
    		//freelancer register route

    	}
    	*/
    </script>    
	</body>
</html>