<?php
    $arr = array();
    $lastNumber = null;
    for($i = 0; true; $i++) {
        $arr[$i] = readline("arr[$i]: ");
        
        if($i != 0 and $arr[$i] == $arr[$i-1]){
            break;
        }
    }

?>