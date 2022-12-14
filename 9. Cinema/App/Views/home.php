<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cinema App</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg- px-6 md:px-8 xl:px-16 py-4">
  <div class="bg-teal-400 absolute top-0 left-0 bg-gradient-to-b from-teal-700 via-teal-500 to-teal-400 bottom-0 leading-5 h-full w-full overflow-hidden">
  </div>
  
  <div class="relative bg-transparent">
  <nav class="bg-teal-900  rounded-xl">
    <div class=" px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        
        <div class="flex flex-1 items-center">
          <div class="flex flex-shrink-0 items-center">
            <svg class="block h-8 w-auto lg:block" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"  x="0" y="0" viewBox="0 0 192 192" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m192 96c0-53.019531-42.980469-96-96-96s-96 42.980469-96 96 42.980469 96 96 96h96v-16h-43c26.839844-17.769531 42.988281-47.808594 43-80zm-48.976562 64.722656c-10.722657 7.789063-25.734376 5.414063-33.523438-5.3125-7.789062-10.722656-5.414062-25.730468 5.308594-33.523437 10.726562-7.789063 25.734375-5.414063 33.523437 5.3125 7.792969 10.722656 5.414063 25.730469-5.308593 33.523437zm-1.179688-104.851562c12.605469-4.097656 26.144531 2.800781 30.242188 15.40625 4.09375 12.609375-2.804688 26.148437-15.410157 30.242187-12.605469 4.097657-26.144531-2.800781-30.242187-15.40625-4.09375-12.605469 2.804687-26.148437 15.410156-30.242187zm-45.84375-39.871094c13.253906 0 24 10.746094 24 24s-10.746094 24-24 24-24-10.746094-24-24 10.746094-24 24-24zm-76.085938 55.277344c4.097657-12.605469 17.636719-19.503906 30.242188-15.410156 12.605469 4.097656 19.503906 17.636718 15.410156 30.242187-4.097656 12.605469-17.636718 19.503906-30.242187 15.410156s-19.503907-17.632812-15.410157-30.242187zm62.585938 84.132812c-7.789062 10.726563-22.800781 13.101563-33.523438 5.3125-10.722656-7.792968-13.101562-22.800781-5.308593-33.523437 7.789062-10.722657 22.800781-13.101563 33.523437-5.308594 10.722656 7.789063 13.097656 22.796875 5.308594 33.519531zm5.5-59.410156c0-4.417969 3.582031-8 8-8s8 3.582031 8 8-3.582031 8-8 8-8-3.582031-8-8zm0 0" fill="#ffffff" data-original="#000000" class=""></path></g></svg>
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="#" class="bg-teal-800 text-white px-3 py-2 rounded-md text-m font-medium" aria-current="page">Home</a>
            </div>
          </div>
        </div>
        <!-- Profile -->
        <div class="flex right space-x-4">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="/index.php/user/login" class="bg-teal-800 text-white px-3 py-2 rounded-md text-m font-medium" aria-current="page">Sign In</a>
          <a href="/index.php/user/register" class="bg-teal-800 text-white px-3 py-2 rounded-md text-m font-medium" aria-current="page">Sign Up</a>
          <a href="/index.php/user/logout" class="bg-teal-800 text-white px-3 py-2 rounded-md text-m font-medium" aria-current="page">Sign Out</a>
        </div>
        <div class="relative ml-3">
              <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="h-8 w-8 rounded-full" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g><g>		<path d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z" fill="#ffffff" data-original="#000000" class=""></path></g></g><g><g><path d="M423.966,358.195C387.006,320.667,338.009,300,286,300h-60c-52.008,0-101.006,20.667-137.966,58.195C51.255,395.539,31,444.833,31,497c0,8.284,6.716,15,15,15h420c8.284,0,15-6.716,15-15C481,444.833,460.745,395.539,423.966,358.195z" fill="#ffffff" data-original="#000000" class=""></path></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g></svg>
              </button>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>
<div class="mt-16 flex space-x-8 justify-center">

<?php
foreach($schedule as $film){
    $ore = explode(';', $film['ore']);
    $buttonsHTML = "";
    foreach($ore as $ora){
      $buttonsHTML .= '<li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600"><div class="flex items-center pl-3">
          <input type="radio" value="'.$ora.'" name="ora" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" require>
          <label for="ora" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">'.$ora.':00</label>
      </div></li>';
    }
        
    echo 
    '<div class="z-10 w-96 max-h-80 rounded-3xl">
        <div class="flex max-h-80 bg-white rounded-3xl justify-center self-center p-15 z-10">
          <img class="justify-center self-center rounded-t-lg h-96 md:h-80 md:w-48 md:rounded-none md:rounded-l-lg" src="' . $film['foto'] . '">
          <div class="flex flex-col justify-around ml-2 p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold break-normal  text-teal-700">' . $film['nome'] . '</h5>
              <div class="flex justify-around">
                <form action="/index.php/booking" method="get">
                  <input type="hidden" name="schedule_id" value="'.$film["id"].'">
                  <ul class="w-32 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    '.$buttonsHTML.'
                  </ul>
                  <button type="submit" class="mt-2 text-white w-32 bg-teal-500 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-teal-400 dark:hover:bg-teal-500 dark:focus:ring-teal-600">
                    <svg aria-hidden="true" class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                    Buy now
                  </button>
                </form>
                <p class="mb-3 font-normal text-white"></p>
              </div>
            </div>
        </div>
      </div>';  
}
?>
</div>

  <svg class="absolute bottom-0 left-0 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>

</body>
</html>