<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cinema App</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg- px-6 md:px-8 xl:px-16 py-4">
  <div class="bg-teal-400 fixed top-0 left-0 bg-gradient-to-b from-teal-700 via-teal-500 to-teal-400 bottom-0 leading-5 h-full w-full overflow-hidden">
  </div>
  
  <div class="relative bg-transparent">
  <nav class="bg-teal-900 rounded-xl">
    <div class=" px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-24 items-center justify-between">
        
        <div class="flex flex-1 items-center">
          <div class="flex flex-shrink-0 items-center">
            <svg class="block h-8 w-auto lg:block" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"  x="0" y="0" viewBox="0 0 192 192" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m192 96c0-53.019531-42.980469-96-96-96s-96 42.980469-96 96 42.980469 96 96 96h96v-16h-43c26.839844-17.769531 42.988281-47.808594 43-80zm-48.976562 64.722656c-10.722657 7.789063-25.734376 5.414063-33.523438-5.3125-7.789062-10.722656-5.414062-25.730468 5.308594-33.523437 10.726562-7.789063 25.734375-5.414063 33.523437 5.3125 7.792969 10.722656 5.414063 25.730469-5.308593 33.523437zm-1.179688-104.851562c12.605469-4.097656 26.144531 2.800781 30.242188 15.40625 4.09375 12.609375-2.804688 26.148437-15.410157 30.242187-12.605469 4.097657-26.144531-2.800781-30.242187-15.40625-4.09375-12.605469 2.804687-26.148437 15.410156-30.242187zm-45.84375-39.871094c13.253906 0 24 10.746094 24 24s-10.746094 24-24 24-24-10.746094-24-24 10.746094-24 24-24zm-76.085938 55.277344c4.097657-12.605469 17.636719-19.503906 30.242188-15.410156 12.605469 4.097656 19.503906 17.636718 15.410156 30.242187-4.097656 12.605469-17.636718 19.503906-30.242187 15.410156s-19.503907-17.632812-15.410157-30.242187zm62.585938 84.132812c-7.789062 10.726563-22.800781 13.101563-33.523438 5.3125-10.722656-7.792968-13.101562-22.800781-5.308593-33.523437 7.789062-10.722657 22.800781-13.101563 33.523437-5.308594 10.722656 7.789063 13.097656 22.796875 5.308594 33.519531zm5.5-59.410156c0-4.417969 3.582031-8 8-8s8 3.582031 8 8-3.582031 8-8 8-8-3.582031-8-8zm0 0" fill="#ffffff" data-original="#000000" class=""></path></g></svg>
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/index.php/home" class="bg-teal-800 text-white px-3 py-2 rounded-md text-xl font-medium" aria-current="page">Home</a>
              <a href="booking/user" class="<?php if(!isset($_SESSION['userID']) || $_SESSION['userID'] == null){echo 'hidden';} ?> bg-teal-800 text-white px-3 py-2 rounded-md text-xl font-medium" aria-current="page">Your Booking</a>
            </div>
          </div>
        </div>
        <!-- Profile -->
        <div class="flex right space-x-4">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="/index.php/user/login" class="<?php if(isset($_SESSION['userID']) and $_SESSION['userID'] != null){echo 'hidden';} ?> bg-teal-800 text-white px-3 py-2 rounded-md text-xl font-medium" aria-current="page">Sign In</a>
          <a href="/index.php/user/register" class="<?php if(isset($_SESSION['userID']) and $_SESSION['userID'] != null){echo 'hidden';} ?> bg-teal-800 text-white px-3 py-2 rounded-md text-xl font-medium" aria-current="page">Sign Up</a>
          <?php if(isset($_SESSION['userID']) and $_SESSION['userID'] != null){echo '<div class="text-white px-3 py-2 rounded-md text-xl font-medium" aria-current="page">'.$_SESSION['email'].'</div>';} ?>
          <a href="/index.php/user/logout" class="<?php if(!isset($_SESSION['userID']) || $_SESSION['userID'] == null){echo 'hidden';} ?> bg-teal-800 text-white px-3 py-2 rounded-md text-xl font-medium" aria-current="page">Sign Out</a>
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
<div class="z-10 relative grid justify-center mt-16 grid-cols-3 gap-7">

<?php
foreach($booking as $film){
    echo 
    '<div class="mt-10 align-middle w-96 max-h-80 rounded-3xl">
        <div class="max-h-80 bg-white rounded-3xl border border-teal-600 justify-center self-center p-15 z-10">
          <div class="justify-around ml-2 p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold break-normal  text-teal-700">' . $film['nome'] . '</h5>
            <div class="flex justify-around">
            <h5 class="mb-2 text-m font-bold break-normal  text-teal-700">data:' . $film['data'] . '</h5>
            <h5 class="mb-2 text-m font-bold break-normal  text-teal-700">ora:' . $film['ora'] . '</h5>
            <h5 class="mb-2 text-m font-bold break-normal  text-teal-700">posto:' . $film['numero_posto'] . '</h5>
            </div>
        </div>
      </div></div>';  
}
?>
</div>

</body>
</html>