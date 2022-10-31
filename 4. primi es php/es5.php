<?php 
    //memino

    $arr1 = array(0,2,3,7,8);
    $arr2 = array(1,4,5,9,12);

    $arrFuso = array();
    for ($i = 0; $i < count($arr1); $i++){
        array_push($arrFuso, $arr1[$i]);
    }
    for ($i = 0; $i < count($arr2); $i++){
        array_push($arrFuso, $arr2[$i]);
    }
    asort($arrFuso);
    print_r($arrFuso);
?>