<?php
require 'vendor/autoload.php';
require_once __DIR__.'\InlineKeyboard.php';
use Telegram\Bot\Api;

$client = new Api('5831007873:AAGm5EAwqCSgqPkKfAl-lhfH-uGHQ2yjVT0');

$last_update_id=0;

function get_name($drink){
	return $drink["strDrink"];
}

function details($drink){
	$ingredienti = [];
	for($i = 1; $i <= 15; $i++){
		$ingrediente = $drink["strIngredient$i"];
		if ($ingrediente == null){break; }

		array_push($ingredienti, $ingrediente);
	}
	$name = $drink["strDrink"];
	$response_text = "";
	$response_text .= "$name\n\n";
	$response_text .= "Ingredienti:\n";
	foreach ($ingredienti as $ingrediente){
		$response_text .= "- $ingrediente\n";
	}
	return $response_text;
}

function messages_switch($text){
	$response_text = '';
	$json = '';
	switch($text){
		case "/start":
			$response_text = 'Scrivi il nome dek drink che vuoi sdrinko sdunkare';
			break;
			
		default:
			//http request
			$ch = curl_init();
			$url = 'https://www.thecocktaildb.com/api/json/v1/1/search.php?s='.$text;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$drinks = json_decode($response_json, true)["drinks"];
			
			if (!isset($drinks)){
				$response_text = 'Non ho trovato niente :(';
				$json = '';
				break;
			}

			$response_text = "";
			for($i = 0; $i < 10; $i++){
				$nome = get_name($drinks[$i]);
				$response_text .= $nome."\n";
			}
			$json .= ']]}';
			require_once __DIR__.'\InlineKeyboard.php';
			$json = json_encode(new InlineKeyboard());
			var_dump($json);
			/*$json = '{"inline_keyboard": [[{
				"text": "asd",
				"callback_data": "detail0"
		},{
				"text": "dfg",
				"callback_data": "detail1"
		}]]}';*/
			var_dump($json);

			/*$json = '{"inline_keyboard": [[{
				"text": "Share with your friends",
				"switch_inline_query": "share"
			},{
				"text": "🍎",
				"callback_data": "culo"
			}]]}';*/
			//$response_text = details($drinks[0]);

			break;
	}
	return [$json, $response_text];
}
while(true){
	$response = $client->getUpdates(['offset'=>$last_update_id, 'timeout'=>5]);
	if (count($response)<=0) continue;

	foreach ($response as $r){
		// per non leggere piu' volte lo stesso messaggio aumento l'offset
		$last_update_id=$r->getUpdateId()+1;

		if (isset($r->getRawResponse()["message"])){
			$message = $r->getMessage();
			$chatId = $message->getChat()->getId();
			$text = $message->getText();
			[$json, $response_text] = messages_switch($text);
			$response = $client->sendMessage([
				'chat_id' => $chatId,
				'text' => $response_text,
			  	'reply_markup' => $json
		  	]);
			continue;
		}
		else{
			$callback_data = $r->getCallbackQuery()->getData();
			var_dump($callback_data);
			if ($callback_data){
				continue;
			}
		}
		
	}
}
?>