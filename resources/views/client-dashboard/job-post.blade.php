<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <h1 class="text-center text-3xl font-bold my-6">Post a Job</h1>
<form action="/cx/post-job/new" method="post">
  @csrf
  <div class="sm:w-1/2 w-11/12 mx-auto space-y-6">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <p class="text-red-500">{{ $error }}</p>
      @endforeach
    @endif
    <div>
      <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Job title</label>
      <input type="text" id="large-input" name="title" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div>
      <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Job description</label>
      <input type="text" id="large-input" name="description" class="block w-full p-8 text-gray-900 border border-gray-300 rounded-lg sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div>
      <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Project price(by hour)</label>
      <input type="number" id="large-input" name="price" class="block border px-2 border-gray-300 rounded-sm sm:text-md focus:ring-blue-500 focus:border-blue-500">
    </div>
    <input class="bg-black px-2 w-full font-semibold text-[#b1ff00] hover:bg-gray-900 py-3 rounded" value="Continue" type="submit">
  </div>
</form>
</body>
</html>

