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
	                        <h2 class="mb-8 text-2xl text-black font-bold">Sign in to your account</h2>
	                        {{-- error message --}}
                            @if ($errors->any())
						      @foreach ($errors->all() as $error)
						        <div class="w-full flex items-center px-3 border border-red-500 h-10 mx-auto my-2 rounded">
									  <div class="flex items-center space-x-2">
									    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
									      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
									    </svg>
									    <span class="font-semibold text-red-500">{{$error}}</span>
									  </div>
									</div>
						      @endforeach
						    @endif


	                        @if(session()->has("email_error") || session()->has("password_error"))
	                        	@if(session()->has("email_error"))
		                        	<div class="w-full flex items-center px-3 border border-red-500 h-10 mx-auto my-2 rounded">
									  <div class="flex items-center space-x-2">
									    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
									      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
									    </svg>
									    <span class="font-semibold text-red-500">{{ session()->get("email_error") }}</span>
									  </div>
									</div>
								@elseif(session()->has("password_error"))
									<div class="w-full flex items-center px-3 border border-red-500 h-10 mx-auto my-2 rounded">
									  <div class="flex items-center space-x-2">
									    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
									      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
									    </svg>
									    <span class="font-semibold text-red-500">{{ session()->get("password_error") }}</span>
									  </div>
									</div>
								@endif
							@endif	
	                        {{-- error message --}}
	                        <form action="login/check" id="f" method="post" class="space-y-8">
	                        	@csrf
	                            <div class="space-y-2">
	                                <label for="email" class="text-gray-700">Email</label>
	                                <input  type="email" name="email" id="email" 
	    class="block w-full px-4 py-3 rounded-md border border-gray-300 text-gray-600 transition duration-300
	        focus:ring-2 focus:ring-sky-300 focus:outline-none
	        invalid:ring-2 invalid:ring-red-400"
	                                >
	                            </div>
	                            <input type="hidden" id="h" name="f-type" value="freelancer">

	                            <div>
	                                <div class="flex items-center justify-between">
	                                    <label for="pwd" class="text-gray-700">Password</label>
	                                    <button class="p-2 -mr-2" type="reset">
	                                        <span class="text-sm text-[#b1ff00]">Forgot your password ?</span>
	                                    </button>
	                                </div>
	                                <input  type="password" name="pwd" id="pwd" 
	                                        class="block w-full px-4 py-3 rounded-md border border-gray-300 text-gray-600 transition duration-300
	                                            focus:ring-2 focus:ring-sky-300 focus:outline-none
	                                            invalid:ring-2 invalid:ring-red-400"
	                                >
	                            </div>

	                            <button type="submit" id="btn-1" 
	                                    class="w-full py-3 px-6 rounded-md bg-black
	                                        focus:bg-gray-700 active:bg-gray-500">
	                                <span class="text-[#b1ff00]">Sign in as Freelancer</span>
	                            </button>
	                            <button type="submit" id="btn-2"
	                                    class="w-full py-3 px-6 rounded-md 
	                                        focus:bg-green-500 focus:text-white bg-[#b1ff00]">
	                                <span class="text-black font-bold">Sign in as Client</span>
	                            </button>

	                            <p class="border-t pt-6 text-sm">
	                                Don't have an account ? 
	                                <a href="/u/register" class="text-[#b1ff00]">Sign up</a>
	                            </p>
	                        </form>
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
    	var cBtn = document.getElementById("btn-2")
    	var form = document.getElementById("f")
    	var hidden = document.getElementById("h")
    	cBtn.addEventListener("click", switchForm)

    	function switchForm(e){
    		form.setAttribute("action", "/cx/login/check")
    		hidden.value = "client"
    	}
    </script>
</body>
</html>