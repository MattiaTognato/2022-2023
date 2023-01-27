<?php
class InlineKeyboard{
    public $inline_keyboard;
    function __construct(){
        
        $row1 = [];
        for($i = 1; $i <= 5; $i++){
            $tmp = new InlineKeyboardButton($i, $i);
            array_push($row1, $tmp);
        }
        $row2 = [];
        for($i = 6; $i <= 10; $i++){
            $tmp = new InlineKeyboardButton($i,$i);
            array_push($row2, $tmp);
        }
        $row3 = [];
        array_push($row3, new InlineKeyboardButton('⬅', 'indietro'));
        array_push($row3, new InlineKeyboardButton('➡','avanti'));

        $this->inline_keyboard = [$row1, $row2, $row3];
    }
}
class InlineKeyboardButton{
    public $text;
    public $callback_data;
    function __construct($_text, $_data){
        $this->text = $_text;
        $this->callback_data = $_data;    
    }
}