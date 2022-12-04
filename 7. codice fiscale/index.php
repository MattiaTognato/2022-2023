<?php
	error_reporting(-1);
	ini_set( 'display_errors', 1 );
	require_once'db_connect.php';


	const CONSONANTI = ['B', 'C', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'V', 'W', 'Y', 'Z'];
	const MESI = ['A', 'B', 'C', 'D', 'E', 'H', 'L', 'M', 'P', 'R', 'S', 'T'];
	const ALFANUMERICIPARI = ["0" => 1,"1" => 0,"2" => 5,"3" => 7,"4" => 9,"5" => 13,"6" => 15,"7" => 17,"8" => 19,"9" => 21,"A" => 1,"B" => 0,"C" => 5,"D" => 7,"E" => 9,"F" => 13,"G" => 15,"H" => 17,"I" => 19,"J" => 21,"K" => 2,"L" => 4,"M" => 18,"N" => 20,"O" => 11,"P" => 3,"Q" => 6,"R" => 8,"S" => 12,"T" => 14,"U" => 16,"V" => 10,"W" => 22,"X" => 25,"Y" => 24,"Z" => 23];
	const ALFANUMERICIDISPARI = ["0" => 0,"1" => 1,"2" => 2,"3" => 3,"4" => 4,"5" => 5,"6" => 6,"7" => 7,"8" => 8,"9" => 9,"A" => 0,"B" => 1,"C" => 2,"D" => 3,"E" => 4,"F" => 5,"G" => 6,"H" => 7,"I" => 8,"J" => 9,"K" => 10,"L" => 11,"M" => 12,"N" => 13,"O" => 14,"P" => 15,"Q" => 16,"R" => 17,"S" => 18,"T" => 19,"U" => 20,"V" => 21,"W" => 22,"X" => 23,"Y" => 24,"Z" => 25];

	function get3Consonants($s){
		$s = strtoupper($s);
		$consonants = "";
		for($i = 0; $i < strlen($s); $i++){
			// controllo per ogni carattere se e' una consonante
			if(in_array($s[$i], CONSONANTI)){
				//consonante
				$consonants .= $s[$i];
			}
			// se raggiungo le 3 break
			if(strlen($consonants) > 2) return $consonants;
		}
		for($i = 0 ; $i < strlen($s); $i++){
			// controllo per ogni carattere se e' una vocale
			if(!in_array($s[$i], CONSONANTI)){
				//vocale
				$consonants .= $s[$i];
			}
			// se raggiungo le 3 break
			if(strlen($consonants) > 2) return $consonants;
		}
		//se non ho raggiungo le 3 aggiungi x
		while(strlen($consonants) < 3){
			$consonants .= 'X';
		}
		return $consonants;
	}
	function getMese($mese){        
		return MESI[$mese-1];
	}
	function getAnno($anno){
		$anno = trim($anno);
		//ultime due cifre dell'anno
		return substr($anno, -2);
	}
	function getGiorno($giorno, $sesso){
		return $giorno + (40*$sesso);
	}
	function getChecksum($codice){
		$somma = 0;

		for($i = 0; $i < strlen($codice); $i++){
			if ($i%2 == 0){
				//indici pari dell'array
				$somma += ALFANUMERICIPARI[$codice[$i]];
			}
			else if ($i%2 == 1){
				//indici dispari dell'array
				$somma += ALFANUMERICIDISPARI[$codice[$i]];
			}
		}
		$resto = range('A', 'Z');
		return $resto[$somma%26];
	}
	function getCodiceFiscale(){
		$nome = $_POST["nome"];
		$cognome = $_POST["cognome"];
		$mese = $_POST["mese"];
		$anno = $_POST["anno"];
		$giorno = $_POST["giorno"];
		$sesso = $_POST["sesso"];
		$comune = $_POST["comune"];

		$codiceFiscale = "";

		$codiceFiscale .= get3Consonants($cognome);
		$codiceFiscale .= get3Consonants($nome);
		$codiceFiscale .= getAnno($anno);
		$codiceFiscale .= getMese($mese);
		$codiceFiscale .= getgiorno($giorno, $sesso);
		$codiceFiscale .= $comune;
		$codiceFiscale .= getChecksum($codiceFiscale);

		return $codiceFiscale;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
	<title>Codice fiscale</title>
</head>
<body>
	<div class="flex flex-wrap justify-center text-center mb-12">
		<div class="w-full lg:w-6/12 px-4">
			<h4 class="block font-bold mb-2">Codice Fiscale</h4>
		</div>
	</div>
	<div class="flex flex-wrap m-auto"></div>
	<form method="post" class="mt-50 ml-auto mr-auto w-full max-w-lg">
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
		<button type="submit" class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
		</div>
	</form>
	<div class="flex flex-wrap justify-center text-center mb-12">
		<div class="w-full lg:w-6/12 px-4">
			<h4 class="appearance-none block w-full bg-gray-200 text-gray-700 font-extrabold border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white">
				<?php 
				if($_POST) {
					$codice = getCodiceFiscale();
					
					$sql="INSERT INTO codFiscale(`nome`, `cognome`, `giorno`, `mese`, `anno`, `comune`, `sesso`, `codiceFiscale` ) VALUES(:nome, :cognome, :giorno, :mese, :anno, :comune, :sesso, :code)";
					$query = $db->prepare($sql);
					
					$query->bindParam(':nome',$_POST["nome"],PDO::PARAM_STR);
					$query->bindParam(':cognome',$_POST["cognome"],PDO::PARAM_STR);
					$query->bindParam(':giorno',$_POST["giorno"],PDO::PARAM_INT);
					$query->bindParam(':mese',$_POST["mese"],PDO::PARAM_INT);
					$query->bindParam(':anno',$_POST["anno"],PDO::PARAM_INT);
					$query->bindParam(':comune',$_POST["comune"],PDO::PARAM_STR);
					$query->bindParam(':sesso',$_POST["sesso"],PDO::PARAM_STR);
					$query->bindParam(':code',$codice,PDO::PARAM_STR);
					$query->execute();
					
					$lastInsertId = $db->lastInsertId();
					if($lastInsertId)
					{
						echo $codice;
						echo "<br> recorded successfully";
					}
					else
					{
						// Message for unsuccessfull insertion
						echo "<script>alert('Something went wrong. Please try again');</script>";
						echo "<script>window.location.href='index.php'</script>";
					}
				}
				?>
			</h4>
		</div>
	</div>	
</body>
</html>
