<?php
require_once __DIR__ . '/InlineKeyboardButton.php';
class SearchDrinkKeyboard{
    public $inline_keyboard;
    function __construct(array $drinks)
    {
        $row1 = [];
        for($i = 1; $i <= 5; $i++){
            $drink_id = $drinks[$i-1]->id;
            if(!isset($drink_id)){break;}

            $tmp = new InlineKeyboardButton($i, $drink_id);
            array_push($row1, $tmp);
        }
        $row2 = [];
        for($i = 6; $i <= 10; $i++){
            $drink_id = $drinks[$i-1]->id;
            if(!isset($drink_id)){break;}
            $tmp = new InlineKeyboardButton($i, $drink_id);
            array_push($row2, $tmp);
        }
        $row3 = [];
        array_push($row3, new InlineKeyboardButton('⬅', 'indietro'));
        array_push($row3, new InlineKeyboardButton('➡','avanti'));

        $rows = [$row1, $row2, $row3];

        $this->inline_keyboard = $rows;
    }
}