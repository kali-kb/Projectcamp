<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.tailwindcss.com"></script>
	<title></title>
</head>
<body>
	<!--freelancer data form-->
	<h1 class="text-center text-3xl font-bold my-6">Fill out a little bit more information..</h1>
    <div class="sm:w-1/2 w-11/12 mx-auto my-6 space-y-6">
	  <div>
      	<label for="careers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select Your Career</label>
        <select id="careers" name="career" form="f-form" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option>Game Developer</option>
          <option>Web Developer</option>
          <option>Web designer</option>
          <option>Software Engineer</option>
          <option>Backend Engineer</option>
          <option>Frontend Engineer</option>
          <option>Mobile Developer</option>
          <option>Blockchain Developer</option>
        </select>
    </div>
    <div>
      <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select your country</label>
      <select id="countries" name="location" form="f-form" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option>United States</option>
        <option>Canada</option>
        <option>France</option>
        <option>Ethiopia</option>
        <option>Kenya</option>
        <option>South Africa</option>
        <option>Autralia</option>
        <option>Ukraine</option>
      </select>
    </div>
	<form action="/u/register/freelancer/add" enctype="multipart/form-data" method="post" id="f-form">
      @csrf
	    <div>
        
        <label for="profile-image" class="block mb-2 text-sm font-medium text-gray-900">Upload your Profile Picture</label>
        <input class="border rounded" type="file" name="profile-image">

	      <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
	      <input type="text" id="large-input" name="name" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg sm:text-md focus:ring-blue-500 focus:border-blue-500">

        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
        <input type="email" id="email" name="email" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg sm:text-md focus:ring-blue-500 focus:border-blue-500">

        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
        <input type="password" id="password" name="password" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg sm:text-md focus:ring-blue-500 focus:border-blue-500">
	    
      </div>

	    <div>
	      <label class="font-semibold" for="">Rate</label>
	      <input min="0" name="rate" class="border px-3 py-3 block rounded" type="number">
	    </div>
	    <input class="bg-black mt-4 px-2 w-full font-semibold text-[#b1ff00] hover:bg-gray-900 py-3 rounded" value="Continue" type="submit">
	</form>
	</div>


  <script type="text/javascript">
    window.addEventListener('load', inject)
    function inject(e){
      var email = document.getElementById('email')
      var pwd = document.getElementById('password')

      email.value = window.localStorage.getItem("email")
      password.value = window.localStorage.getItem("password")
      window.localStorage.clear()
    }
  </script>


</body>
</html>