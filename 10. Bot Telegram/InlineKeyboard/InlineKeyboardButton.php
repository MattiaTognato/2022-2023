<?php
class InlineKeyboardButton{
    public $text;
    public $callback_data;
    function __construct($_text, $_data){
        $this->text = $_text;
        $this->callback_data = $_data;    
    }
}