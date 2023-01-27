<?php
require 'vendor/autoload.php';
require_once __DIR__.'/InlineKeyboard/SearchDrinkKeyboard.php';
require_once __DIR__.'/InlineKeyboard/FavoritesInlineKeyboard.php';
require_once __DIR__.'/Drink.php';
use Telegram\Bot\Api;

$client = new Api('5831007873:AAGm5EAwqCSgqPkKfAl-lhfH-uGHQ2yjVT0');

$last_update_id=0;

function messages_switch($text){
	$response_text = '';
	$json = '';
	switch($text){
		case "/start":
			$response_text = 'Scrivi il nome del drink che vuoi sdrinko sdunkare';
			break;
			
		default:
			//http request
			$ch = curl_init();
			$url = 'https://www.thecocktaildb.com/api/json/v1/1/search.php?s='.$text;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$drinks_raw = json_decode($response_json, true)["drinks"];
			
			if (!isset($drinks_raw)){
				$response_text = 'Non ho trovato niente :(';
				$json = '';
				break;
			}

			$length = count($drinks_raw);
			$max_length = $length < 10 ? $length : 10; //max 10 drinks
			$drinks_raw = array_slice($drinks_raw, 0, $max_length, false);

			$drinks_obj = Drink::drinks_obj_from_raw($drinks_raw);

			// RESPONSE TEXT
			$response_text = "Risultati 1-10 di ". $length ."\n";

			for($i = 1; $i <= $max_length; $i++){
				$name = $drinks_obj[$i-1]->name;
				$response_text .= "$i. $name\n\n";
			}
			$json = json_encode(new SearchDrinkKeyboard($drinks_obj));
			break;
	}
	return [$json, $response_text];
}

function callback_switch($request, $chat_id, $data){
	global $client;
	$drink = null;
	$json = '';
	echo $data;
	if (str_starts_with($data, 'fav')){
		echo 'preferito';
		return;
	}
	if (str_starts_with($data, 'unfav')){
		echo 'togli-preferito';
		return;
	}
	switch($data){
		case 'next':
			break;
		
		case 'previous':
			break;
		
		default:
			//http request
			$ch = curl_init();
			$url = 'https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i='.$data;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$drinks_raw = json_decode($response_json, true)["drinks"];

			if (!isset($drinks_raw)){
				$response_text = 'Non ho trovato niente :(';
				$json = '';
				break;
			}
			
			$drink = Drink::drinks_obj_from_raw($drinks_raw)[0];

			$response_text = "";
			$response_text .= "$drink->name\n\n";
			$response_text .= "Ingredienti:\n";
			foreach ($drink->ingredients as $ingrediente){
				$response_text .= "- $ingrediente\n";
			}

			$json = json_encode(new FavoritesInlineKeyboard($drink->id));

			$client->sendPhoto([
				'chat_id' => $chat_id, 
				'photo' => $drink->image,
				'caption' => $response_text,
				'reply_markup' => $json
			]);
		}

}

while(true){
	$response = $client->getUpdates(['offset'=>$last_update_id, 'timeout'=>5]);
	if (count($response)<=0) continue;

	foreach ($response as $r){
		// per non leggere piu' volte lo stesso messaggio aumento l'offset
		$last_update_id=$r->getUpdateId()+1;

		if (isset($r->getRawResponse()["message"])){
			//message info
			$message = $r->getMessage();
			$chatId = $message->getChat()->getId();
			$text = $message->getText();
			//elaborate response
			[$json, $response_text] = messages_switch($text);
			//send response
			$response = $client->sendMessage([
				'chat_id' => $chatId,
				'text' => $response_text,
			  	'reply_markup' => $json
		  	]);
			continue;
		}
		else{
			$callback_data = $r->getCallbackQuery()->getData();
			$chatId = $r->getCallbackQuery()->getMessage()->getChat()->getId();

			[$json, $image, $text] = callback_switch($r, $chatId, $callback_data);
			
			
			
		}
		
	}
}
?>