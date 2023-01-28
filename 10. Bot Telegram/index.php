<?php
require 'vendor/autoload.php';
require_once __DIR__.'/InlineKeyboard/SearchDrinkKeyboard.php';
require_once __DIR__.'/InlineKeyboard/FavoritesInlineKeyboard.php';
require_once __DIR__.'/Drink.php';
require_once __DIR__ . '/Favourites.php';
require_once __DIR__ . '/db_connection.php';
use Telegram\Bot\Api;

$client = new Api('5831007873:AAGm5EAwqCSgqPkKfAl-lhfH-uGHQ2yjVT0');

$last_update_id=0;

function get_drink_by_id($id){
	//http request
	$ch = curl_init();
	$url = 'https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i='.$id;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response_json = curl_exec($ch);
	curl_close($ch);
	$drinks_raw = json_decode($response_json, true)["drinks"];
	return $drinks_raw;
}

function messages_switch($text, $user_id, $chat_id){
	global $client;
	$response_text = '';
	$json = '';
	switch($text){
		case "/start":
			$response_text = "/start\n\n";
			$response_text .= "🇮🇹 Scrivi il nome di un drink per cercarlo.
Cliccando il numero associato puoi leggere i dettagli.
Cliccando su ❤/💔, puoi aggiungere o rimuovere dai preferiti.\n";
			$response_text .= "\n🇬🇧 Write the name of the drink you are looking for.
Click on the button with the number of the drink to read the details of it.
Clicking on ❤/💔, you can add or remove frome your favourites.\n";
			$response_text .= "\nCommands:
/start
/fav - List of your favourite drinks
/random - Random drink";
			break;
		case '/fav':
			$favs = Favourites::where('user_id', $user_id)->get();
			$response_text .= "🧉Favourites🍹\n\n";
			$i = 0;
			$drinks = [];
			foreach($favs as $fav){
				$drink_raw = get_drink_by_id($fav->drink_id);
				$drink = Drink::drinks_obj_from_raw($drink_raw)[0];
				array_push($drinks, $drink);
				$name = $drink->name;
				$i += 1;
				$response_text .= "$i. $name\n\n";
			}
			$json = json_encode(new SearchDrinkKeyboard($drinks));
			break;
		case '/random':
			//http request
			$ch = curl_init();
			$url = 'https://www.thecocktaildb.com/api/json/v1/1/random.php';
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$drinks_raw = json_decode($response_json, true)["drinks"];
			$drink = Drink::drinks_obj_from_raw($drinks_raw)[0];

			$response_text = "";
			$response_text .= "$drink->name\n\n";
			$response_text .= "$drink->alcholic\n\n";
			$response_text .= "Ingredients:\n";
			foreach ($drink->ingredients as $ingrediente){
				$response_text .= "- $ingrediente\n";
			}
			$response_text .= "\nInstructions:\n";
			$response_text .= $drink->instructions;

			$json = json_encode(new FavoritesInlineKeyboard($drink->id));

			$client->sendPhoto([
				'chat_id' => $chat_id, 
				'photo' => $drink->image,
				'caption' => $response_text,
				'reply_markup' => $json
			]);
			return [false, false];
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
			$max_length = $length < 40 ? $length : 40; //max 40 drinks
			$drinks_raw = array_slice($drinks_raw, 0, $max_length, false);

			$drinks_obj = Drink::drinks_obj_from_raw($drinks_raw);

			// RESPONSE TEXT
			$response_text = "Risultati 1-$max_length di ". $length ."\n";

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
	if (str_starts_with($data, 'fav')){
		$user_id = $request->getCallbackQuery()->getFrom()->getId();
		$drink_id = explode('fav', $data)[1];
		
		//check if already fav
		$check = Favourites::where('user_id', $user_id, 'and')->where('drink_id', $drink_id)->exists();
		if($check){return;} //if already exists return;

		// otherwise save favourite drink to db
		$fav = new Favourites();
		$fav->user_id = $user_id;
		$fav->drink_id = $drink_id;
		$fav->save();
		return;
	}
	if (str_starts_with($data, 'unfav')){
		$user_id = $request->getCallbackQuery()->getFrom()->getId();
		$drink_id = explode('fav', $data)[1];
		
		//check if already fav
		$check = Favourites::where('user_id', $user_id, 'and')->where('drink_id', $drink_id)->delete();
	}

	switch($data){
		default:
			//http request
			$drink_raw = get_drink_by_id($data);

			if (!isset($drink_raw)){
				$response_text = 'Non ho trovato niente :(';
				$json = '';
				break;
			}
			
			$drink = Drink::drinks_obj_from_raw($drink_raw)[0];

			$response_text = "";
			$response_text .= "$drink->name\n\n";
			$response_text .= "$drink->alcholic\n\n";
			$response_text .= "Ingredients:\n";
			foreach ($drink->ingredients as $ingrediente){
				$response_text .= "- $ingrediente\n";
			}
			$response_text .= "\nInstructions:\n";
			$response_text .= $drink->instructions;

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
			$user_id = $message->getFrom()->getId();
			$chat_id = $message->getChat()->getId();
			$text = $message->getText();
			//elaborate response
			[$json, $response_text] = messages_switch($text, $user_id, $chat_id);
			if($json == false && $response_text == false){continue;}
			//send response
			$response = $client->sendMessage([
				'chat_id' => $chat_id,
				'text' => $response_text,
			  	'reply_markup' => $json
		  	]);
		}
		else{
			$callback_data = $r->getCallbackQuery()->getData();
			$chatId = $r->getCallbackQuery()->getMessage()->getChat()->getId();

			callback_switch($r, $chatId, $callback_data);
		}
		
	}
}
?>