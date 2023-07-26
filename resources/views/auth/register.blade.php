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
		                                <input required type="email" name="email" id="email" 
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
		                                <input required type="password" name="pwd" id="pwd" 
		                                        class="block w-full px-4 py-3 rounded-md border border-gray-300 text-gray-600 transition duration-300
		                                            focus:ring-2 focus:ring-green-300 focus:outline-none
		                                            invalid:ring-2 invalid:ring-red-400"
		                                >
		                            </div>
		                            <div class="mt-10 space-y-4">
			                            <button type="button" id="sub" name="freelancer" 
			                                    class="complete-form-redirect w-full hover:scale-105 py-3 px-6 rounded-md bg-black
			                                        focus:bg-gray-700 active:bg-gray-500">
			                                <span class="text-[#b1ff00] font-semibold">Create a Freelancer account</span>
			                            </button>
			                            <button type="button" id="sub2" name="client" 
			                                    class="complete-form-redirect w-full hover:scale-105 py-3 px-6 rounded-md
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

    	 const email = document.getElementById("email");
	    const password = document.getElementById("pwd");
	    const freelancerButton = document.getElementById("sub");
	    const clientButton = document.getElementById("sub2");

	    // Function to handle form submission and validation
	    function nextFormRedirection(e) {
	        console.log("1");

	        // Check if email and password are empty
	        if (email.value.trim() === '' || password.value.trim() === '') {
	            alert("Please enter both email and password.");
	        } else {
	            // Determine which button was clicked and redirect accordingly
	            if (e.target === freelancerButton) {
	                console.log("freelancer");
	                window.localStorage.email = email.value;
	                window.localStorage.password = password.value;
	                window.location.href = '/u/register/freelancer';
	            } else if (e.target === clientButton) {
	                console.log("client");
	                window.localStorage.email = email.value;
	                window.localStorage.password = password.value;
	                window.location.href = '/u/register/client';
	            }
	        }
	    }

	    // Add event listeners to the buttons
	    freelancerButton.addEventListener("click", nextFormRedirection);
	    clientButton.addEventListener("click", nextFormRedirection);

    </script>    
	</body>
</html>