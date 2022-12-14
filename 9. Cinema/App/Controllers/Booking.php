<?php
namespace App\Controllers;
use App\View;
use App\DB;


class Booking{
    public function __construct()
    {
        $this->db = DB::DB_singletone();
    }
    public function index(){
        $view = new View('booking.php');
        return $view -> render([]);
    }
}