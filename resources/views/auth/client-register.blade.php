<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <!--freelancer data form-->
  <h1 class="text-center text-3xl font-bold my-6">A little bit more..</h1>
  <div class="sm:w-1/2 w-11/12 mx-auto space-y-6">
    <div>
      <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select your country</label>
      <select id="countries" form="c-form" name="location" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
      <form action="/u/register/client/add" method="post" class="space-y-6" id="c-form">
        @csrf
        <div>
          <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
          <input type="text" id="nameinput" name="name" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

          <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
          <input type="email" id="email" name="email" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

          <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
          <input type="password" id="password" name="password" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
      <input class="bg-black px-2 w-full font-semibold text-[#b1ff00] hover:bg-gray-900 py-3 rounded" value="Continue" type="submit">
    </form>
  </div>
</body>
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

</html>