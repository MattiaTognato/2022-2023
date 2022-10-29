<?php
    class Time{
        public $hours = 0;
        public $minutes = 0;
        public $seconds = 0;

        function __construct($_hours, $_minutes, $_seconds){
            $hours = $_hours;
            $minutes = $_minutes;
            $seconds = $_seconds;
        }
        public function getStringTime(){
            return "$hours\h  $minutes\m  $seconds\s";
        }
        public function getSeconds(){
            return $seconds + ($minutes* 60) + ($hours * 60 * 60);
        }
    }
    function getTimeFromInput()
    {
        $hours = (int)readline("hours: ");
        $minutes = (int)readline("minutes: ");
        $seconds = (int)readline("seconds: ");

        return new Time($hours, $minutes, $seconds);
    }

    print "inserire t1\n";
    $t1 = getTimeFromInput();
    print "inserire t2\n";
    $t2 = getTimeFromInput();
    $stringT1 = $t1.getStringTime();
    $stringT2 = $t2.getStringTime();

    if($t1.getSeconds() < $t2.getSeconds()){
        print "\n$stringT1 < $stringT2";
    }
    else{
        print "\n$stringT2 > $stringT1";
    }
?>