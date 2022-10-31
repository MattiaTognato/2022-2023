<?php 
    $arr = range(1, 90);
    shuffle($arr);
    $arrRnd = array_slice($arr, 80);
    print_r($arrRnd);
?>