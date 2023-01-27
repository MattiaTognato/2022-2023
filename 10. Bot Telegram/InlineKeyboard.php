<?php
class InlineKeyboard{
    public $inline_keyboard;
    function __construct(){
        
        $row1 = [];
        for($i = 1; $i <= 5; $i++){
            $tmp = new InlineKeyboardButton();
            $tmp->text = $i;
            $tmp->callback_data = $i;
            array_push($row1, $tmp);
        }
        $row2 = [];
        for($i = 6; $i <= 10; $i++){
            $tmp = new InlineKeyboardButton();
            $tmp->text = $i;
            $tmp->callback_data = $i;
            array_push($row2, $tmp);
        }

        $this->inline_keyboard = [$row1, $row2];
    }
}
class InlineKeyboardButton{
    public $text;
    public $callback_data;
}