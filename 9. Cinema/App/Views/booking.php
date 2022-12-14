<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");

@import url("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");

body {
	font-family: "Montserrat", sans-serif;
	min-height: 100vh;
  color: #fff;
}

* {
	font-family: "Montserrat", sans-serif !important;
}

.movie-container {
  margin: 20px 0px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column
}

.movie-container select {
  appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
  border: 0;
  padding: 5px 15px;
  margin-bottom: 40px;
  font-size: 14px;
  border-radius: 5px;
}

.container {
  perspective: 1000px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.seat {
  background-color: #444451;
  height: 24px;
  width: 30px;
  margin: 3px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.selected {
  background-color: #2dd4bf;
  border-style: solid;
  border-color: white;
  border-width: 3px; 
}

.occupied {
  background-color: #fff;
}

.seat:nth-of-type(2) {
  margin-right: 18px;
}

.seat:nth-last-of-type(2) {
  margin-left: 18px;
}

.seat:not(.occupied):hover {
  cursor: pointer;
  transform: scale(1.2);
}

.showcase .seat:not(.occupied):hover {
  cursor: default;
  transform: scale(1);
}

.showcase {
  display: flex;
  margin-left: 25%;
  margin-right: 25%;
  justify-content: space-around;
  list-style-type: none;
  background: rgba(0,0,0,0.1);
  padding: 5px 10px;
  border-radius: 5px;
  color: #777;
  z-index: 10;
}

.showcase li {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 10px;
}

.showcase li small {
  margin-left: 4px;
  color: white;
}

.row {
  display: flex;
  align-items: center;
  justify-content: center;
}

.screen {
  background: #fff;
  height: 70px;
  width: 40%;
  margin: 15px 0;
  transform: rotateX(-45deg);
  box-shadow: 0 3px 10px rgba(255,255,255,0.7);
}

p.text {
  margin: 40px 0;
}

p.text span {
  font-weight: 600;
  box-sizing: content-box;
}

</style>
</head>
<body>

<div class="bg-teal-400 absolute top-0 left-0 bg-gradient-to-b from-teal-700 via-teal-500 to-teal-400 bottom-0 leading-5 h-full w-full overflow-hidden">
  </div>
  
  <div class="m-10 relative bg-transparent">
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
              <a href="home" class="bg-teal-800 text-white px-3 py-2 rounded-md text-xl font-medium" aria-current="page">Home</a>
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
<div class="mt-16 flex flex-col justify-center">

  <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>N/A</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>
      <li>
        <div class="seat occupied"></div>
        <small>Occupied</small>
      </li>    
  </ul>
  <div class="container">
      <div class="screen"></div>
      
      <div class="row">
          <div id="0" class="<?php
          if(!isset($seat_block[0]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="1" class="<?php
          if(!isset($seat_block[1]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="2" class="<?php
          if(!isset($seat_block[2]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="3" class="<?php
          if(!isset($seat_block[3]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="4" class="<?php
          if(!isset($seat_block[4]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="5" class="<?php
          if(!isset($seat_block[5]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="6" class="<?php
          if(!isset($seat_block[6]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="7" class="<?php
          if(!isset($seat_block[7]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
        </div>
        <div class="row">
          <div id="8" class="<?php
          if(!isset($seat_block[8]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="9" class="<?php
          if(!isset($seat_block[9]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="10" class="<?php
          if(!isset($seat_block[10]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="11" class="<?php
          if(!isset($seat_block[11]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="12" class="<?php
          if(!isset($seat_block[12]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="13" class="<?php
          if(!isset($seat_block[13]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="14" class="<?php
          if(!isset($seat_block[14]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="15" class="<?php
          if(!isset($seat_block[15]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
        </div>
        <div class="row">
          <div id="16" class="<?php
          if(!isset($seat_block[16]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="17" class="<?php
          if(!isset($seat_block[17]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="18" class="<?php
          if(!isset($seat_block[18]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="19" class="<?php
          if(!isset($seat_block[19]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="20" class="<?php
          if(!isset($seat_block[20]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="21" class="<?php
          if(!isset($seat_block[21]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="22" class="<?php
          if(!isset($seat_block[22]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
          <div id="23" class="<?php
          if(!isset($seat_block[23]))
          {echo 'seat';}
          else{echo 'seat occupied';}?>"></div>
        </div>
      
      <p class="text">
        Buy <span id="count">0</span> tickets
        <button id="send" class="m-2 text-white w-32 bg-teal-800 border-gray-900 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2">book</button>
      </p>
    </div>
  </div>
  <a href="/index.php/home" id="home" hidden>Torna alla home</a>
</div>
<script>
const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .seat:not(.occupied)');
const count = document.getElementById('count');
let selectedSeat = [];
//Update total and count
function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll('.row .seat.selected');
  const selectedSeatsCount = selectedSeats.length;
  count.innerText = selectedSeatsCount;
  selectedSeat = [];
  selectedSeats.forEach(element => {
      selectedSeat.push(element.id);
    });
}

//Seat click event
container.addEventListener('click', e => {
  if (e.target.classList.contains('seat') &&
     !e.target.classList.contains('occupied')) {
    e.target.classList.toggle('selected');
  }
  updateSelectedCount();
});

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}


let btn = document.getElementById('send');
// Add an event listener to the button
btn.addEventListener('click', () => {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '/index.php/booking');
  
  const urlSearchParams = new URLSearchParams(window.location.search);
  const params = Object.fromEntries(urlSearchParams.entries());
  let ora = getParameterByName('ora');
  let schedule_id = getParameterByName('schedule_id');

  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onload = () => {
    
    window.location.replace("home");
  };

  let data = {
    schedule_id: schedule_id,
    ora: ora,
    seat: selectedSeat
  };
  let json = JSON.stringify(data);
  console.log(json);
  xhr.send(json);
});
</script>
<svg class="absolute bottom-0 left-0 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
</body>
</html>