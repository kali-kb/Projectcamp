@extends("freelancer-dashboard.dashboard")
  @section("content")
    <h1 class="text-center text-3xl font-bold my-6">Submit your work</h1>
    <div class="border ring-2 ring-[#b1ff00] sm:w-3/4 w-11/12 mx-auto py-3 px-6 rounded my-6 flex items-center justify-between">
      <div class="flex space-x-1 text-xl items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
        </svg>
        <span>Your finished project will arrive at the assignee client's email inbox</span>
      </div>
    </div>
    <form method="post" action="{{ route("submit") }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="job_id" name="job_id">
        <div class="sm:w-3/4 w-11/12 mx-auto my-3 space-y-6">
          <span>Project file</span>
          <div class="flex w-full h-36 items-center justify-center bg-grey-lighter">
          <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg tracking-wide uppercase border-2 border-[#b1ff00] border-dashed cursor-pointer hover:bg-blue">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
              </svg>
              <span class="mt-2 text-base leading-normal">Select a file</span>
              <input type='file' name="project-file" class="hidden" />
          </label>
        </div>
        <div>
          <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Something you want to say about the project (optional)</label>
          <input type="text" id="large-input" name="description" class="block w-full p-8 text-gray-900 border border-gray-300 rounded-lg sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <input class="bg-black px-2 w-full font-semibold text-[#b1ff00] hover:bg-gray-900 py-3 rounded" value="Submit the project" type="submit">
      </div>
    </form>

    <script type="text/javascript">
        job = document.getElementById("job_id")
        window.addEventListener("load", insertId)

        function insertId(e){
          var id = window.localStorage.getItem("job_id")
          job.value = id 
          window.localStorage.clear()
        }
    </script>
  @endsection