<?php
require 'vendor/autoload.php';
use Telegram\Bot\Api;

$client = new Api('5831007873:AAGm5EAwqCSgqPkKfAl-lhfH-uGHQ2yjVT0');

$last_update_id=0;
function messages($text){
	$text = '';
	$json = '';
	switch($text){
		default:
			$text = 'BOTTING';
			$json = '{"inline_keyboard": [[{
				"text": "Share with your friends",
				"switch_inline_query": "share"
			},{
				"text": "🍎",
				"callback_data": "culo"
			}]]}';
			break;
	}
	return [$json, $text];
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
			[$json, $response_text] = messages($text);
			var_dump($response_text);
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