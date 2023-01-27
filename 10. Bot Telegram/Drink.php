<?php
class Drink{
    
    public static function drinks_obj_from_raw(array $drinks_raw) {
        $drinks_obj = [];
        
        for($i = 1; $i <= count($drinks_raw); $i++){
            $drink = new Drink($drinks_raw[$i-1]);
            array_push($drinks_obj, $drink);
        }
        return $drinks_obj;
    }
    
    public $id;
    public $name;
    public $ingredients;
    public $image;

    function __construct($raw_drink){
        $this->id = $raw_drink['idDrink'];
        $this->name = $raw_drink['strDrink'];
        $this->image = $raw_drink['strDrinkThumb'];
        $this->ingredients = [];
        for($i = 1; $i <= 15; $i++){
            $ingrediente = $raw_drink["strIngredient$i"];
            if ($ingrediente == null){break; }

            array_push($this->ingredients, $ingrediente);
        }
    }


}