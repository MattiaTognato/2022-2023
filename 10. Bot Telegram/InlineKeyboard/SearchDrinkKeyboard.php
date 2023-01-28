<?php
require_once __DIR__ . '/InlineKeyboardButton.php';
class SearchDrinkKeyboard{
    public $inline_keyboard;
    function __construct(array $drinks)
    {
        $rows = [];
        for($k = 1; $k <= 40; $k += 5){
            $row = [];
            for($i = $k; $i <= $k+4; $i++){
                $drink = @$drinks[$i-1];
                if(!isset($drink)){break;}
    
                $tmp = new InlineKeyboardButton($i, $drink->id);
                array_push($row, $tmp);
            }
            array_push($rows, $row);
        }

        $this->inline_keyboard = $rows;
    }
}