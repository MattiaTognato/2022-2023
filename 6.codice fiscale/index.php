<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
	<title>Form php</title>
</head>
<body>
	<form action="receiver.php" method="post" class="w-full max-w-lg self-center">
  		<div class="flex flex-wrap -mx-3 mb-6">
    		<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      			<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nome">
        			Nome
      			</label>
      			<input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="nome">
    		</div>
   			<div class="w-full md:w-1/2 px-3">
				<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cognome">
					Cognome
				</label>
				<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="cognome">
    		</div>
 		</div>
  		<div class="flex flex-wrap -mx-3 mb-6">
    		<div class="w-full px-3">
				<label for="giorno" class="text-gray-700 text-xs font-bold mb-2">
					Giorno
				</label>
				<select name="giorno">
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				<label for="mese" class="text-gray-700 text-xs font-bold mb-2">
					Mese
				</label>
				<select name="mese">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
				<label for="anno" class="text-gray-700 text-xs font-bold mb-2">
        			Anno
      			</label>
      			<input name="anno" class="appearance-none bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">				
    		</div>
    		<div class="w-full px-3">
				<label for="comune" class="text-gray-700 text-xs font-bold mb-2">
						Comune
				</label>
				<select name="comune" class="appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
					<?php 
					$file = file_get_contents('comuni.json');
					$comuni = json_decode($file, true); 
					print_r($comuni);
					foreach($comuni as $comune) {
						echo '<option value="'. $comune['codiceCatastale'].  '">'. $comune['nome'].'</option>';      
					}?>
				</select>
				<label for="sesso" class="text-gray-700 text-xs font-bold mb-2">Sesso</label>
				<select name="sesso">
					<option value="0">M</option>
					<option value="1">F</option>
				</select>
			</div>
		</div>
		<button type="submit" class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Default</button>
  		</div>
	</form>
</body>
</html>
