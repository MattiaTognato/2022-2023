<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");

@import url("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");

body {
	font-family: "Montserrat", sans-serif;
	min-height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
  background-color: #242333;
  color: #fff;
  margin: 0;
}

* {
	font-family: "Montserrat", sans-serif !important;
  box-sizing: border-box;
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
  margin: 40px 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.seat {
  background-color: #444451;
  height: 12px;
  width: 15px;
  margin: 3px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.selected {
  background-color: #0081cb;
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
  justify-content: space-between;
  list-style-type: none;
  background: rgba(0,0,0,0.1);
  padding: 5px 10px;
  border-radius: 5px;
  color: #777;
}

.showcase li {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 10px;
}

.showcase li small {
  margin-left: 2px;
}

.row {
  display: flex;
  align-items: center;
  justify-content: center;
}

.screen {
  background: #fff;
  height: 70px;
  width: 70%;
  margin: 15px 0;
  transform: rotateX(-45deg);
  box-shadow: 0 3px 10px rgba(255,255,255,0.7);
}

p.text {
  margin: 40px 0;
}

p.text span {
  color: #0081cb;
  font-weight: 600;
  box-sizing: content-box;
}

.credits a {
  color: #fff;
}

</style>
    <title>Booking</title>
</head>
<body>
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
      You have selected <span id="count">0</span>
    </p>
  </div>
</div>
<button id="send">book</button>
<a href="/index.php/home" id="home" hidden>Torna alla home</a>

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
</body>
</html>