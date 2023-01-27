<?php
require_once __DIR__.'\InlineKeyboard.php';
$json = json_encode(new InlineKeyboard());
var_dump($json);