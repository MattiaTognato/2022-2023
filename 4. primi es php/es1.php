<?php
    function checkTriangle($a, $b, $c)
    {
        return !($a + $b <= $c || $a + $c <= $b || $b + $c <= $a);
    }

    $lato1 = readline("lato 1");
    $lato2 = readline("lato 2");
    $lato3 = readline("lato 3");

    $isTriangle = checkTriangle($lato1, $lato2, $lato3);
    if ($isTriangle){
        echo "is triangle";
    }
    else{
        echo "is not triangle";
    }
?>