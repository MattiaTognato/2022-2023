<?php
require_once __DIR__ . '/InlineKeyboardButton.php';

class FavoritesInlineKeyboard{
    public $inline_keyboard;
    function __construct($drink_id){
        $button1 = new InlineKeyboardButton('❤', 'fav'.$drink_id);
        $button2 = new InlineKeyboardButton('💔', 'unfav'.$drink_id);
        $rows = [[$button1, $button2]];
        $this->inline_keyboard = $rows;
    }
}
