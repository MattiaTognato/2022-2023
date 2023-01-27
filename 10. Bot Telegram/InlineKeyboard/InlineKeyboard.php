<?php
class InlineKeyboard{
    public $inline_keyboard;
    function __construct(){}
    function set_rows($rows){
        $this->inline_keyboard = $rows;
    }
}
