
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
	<title></title>
</head>
<body>
	<h1 class="my-6 text-center text-3xl font-bold">Submit your proposal</h1>
	<form action="/fx/dashboard/apply/done" method="post">
	  @csrf
	  <div class="mx-auto w-11/12 space-y-6 sm:w-1/2">
	    <input type="hidden" name="job_id" id="job_id" value="" />
	    <div>
	      <label for="large-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Write your proposal</label>
	      <input type="text" id="large-input" name="proposal_text" class="sm:text-md block w-full rounded-lg border border-gray-300 p-8 text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" />
	    </div>
	    <div>
	      <label for="large-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Place your bid</label>
	      <input type="number" id="large-input" name="bid" class="sm:text-md rounded-sm border border-gray-300 py-2 px-2 focus:border-blue-500 focus:ring-blue-500" />
	      <span class="px-4 text-xl">/hr</span>
	    </div>
	    <input class="w-full rounded bg-black px-2 py-3 font-semibold text-[#b1ff00] hover:bg-gray-900" value="Continue" type="submit" />
	  </div>
	</form>

	<script type="text/javascript">
		var input = document.getElementById("job_id")
		window.addEventListener("load", injectID)

		function injectID(e){
			var job_id = window.localStorage.getItem("job_id")
			// console.log(job_idItem)
			input.value = job_id
			window.localStorage.clear()
		}
	</script>

</body>
</html>

