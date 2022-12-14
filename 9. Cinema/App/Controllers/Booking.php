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

        $stmt = $this->db->prepare(
            'SELECT numero_posto FROM `booking` where schedule_id=? and ora=?;'
        );
        $stmt->execute([$_GET['schedule_id'], $_GET['ora']]); 
        $posti_occupati = $stmt->fetchAll($mode=\PDO::FETCH_NUM);
        $posti_occupati = array_merge(...$posti_occupati);
        $posti = null;
        foreach($posti_occupati as $seat){
            $posti[$seat] = 'seat occupied';
        }
        return $view -> render(['seat_block' => $posti]);
    }
    function book(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $stmt = $this->db->prepare(
            'INSERT INTO booking (user_id, schedule_id, numero_posto, ora, nome)
             VALUES (?, ?, ?, ?, ?)',
        );
        foreach ($data['seat'] as $seat){
            $stmt->execute([$_SESSION['userID'], $data['schedule_id'], $seat, $data['ora'], $_SESSION['email']]); 
            $result = $stmt->fetch();
        }
        http_response_code(201);
    }
    function user_booking(){
        $stmt = $this->db->prepare(
            'SELECT film.nome,schedule.data, booking.ora, booking.numero_posto, film.foto FROM `booking` 
            join `schedule` on booking.schedule_id = schedule.id
            join `film` on schedule.film_id = film.id

            where booking.nome=?'
        );
        $stmt->execute([$_SESSION['email']]);
        $booking = $stmt->fetchAll();
        $view = new View('yourbooking.php');
        return $view -> render(['booking' => $booking]);
    }
}