<?php
    $arr = array();
    for($i = 0; $i < 5; $i++) {
        $arr[$i] = readline("arr[$i]: ");
    }
    $somma = 0;
    for($i = 0; $i < 5; $i++) {
        $somma += $arr[$i];
    }
    $media = $somma/count($arr);
    print "\nsomma: $somma\n";
    print "\nmedia: $media\n";
?>