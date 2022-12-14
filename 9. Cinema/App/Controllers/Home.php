<?php
namespace App\Controllers;
use App\View;
use App\DB;

class Home{
    public function __construct()
    {
        $this->db = DB::DB_singletone();
    }
    function get_schedule(){
        $stmt = $this->db->prepare(
            'SELECT * from schedule
            join film on schedule.film_id = film.id;'
        );
        $stmt->execute(); 
        return $stmt->fetchAll();
    }
    function index(){
        $schedule = $this->get_schedule();
        $view = new View('home.php');
        return $view -> render(['schedule' => $schedule]);
    }
}