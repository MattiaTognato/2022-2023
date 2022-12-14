<?php
namespace App\Controllers;
use App\View;
use App\DB;

class User{
    public function __construct()
    {
        $this->db = DB::DB_singletone();
    }
    function register_page(){
        $view = new View('registration.php');
        $errore = '';
        return $view -> render(['errore'=>$errore]);
    }
    function login_page(){
        $view = new View('login.php');
        $errore = 'hidden';
        return $view -> render(['errore'=>$errore]);
    }

    function login(){
        $email = $_POST['email'];
        $password = $_POST['pwd'];

        $stmt = $this->db->prepare(
            'SELECT * from User 
            where email=? and pwd=?'
        );
        $result = $stmt->execute([$email, $password]); 
        $result = $stmt->fetch();

        if($result){
            //salvo l'id dell'utente e lo mando alla home
            $_SESSION['userID'] = $result['id'];
            $_SESSION['email'] = $result['email'];
            header("Location: /index.php/home");
            return;
        }
        else{
            //errore nel login 
            //mostro il div della pwd sbagliata
            $view = new View('login.php');
            $errore = '';
            return $view -> render(['errore'=>$errore]);
        }
    }

    function register(){
        $email = $_POST['email'];
        $password = $_POST['pwd'];

        $stmt = $this->db->prepare(
            'SELECT * from User 
            where email=?'
        );
        $result = $stmt->execute([$email]); 
        $result = $stmt->fetch();

        if($result){
            //email already exists
            $view = new View('registration.php');
            $errore = 'The email submitted already exists';
            return $view -> render(['errore'=>$errore]);
        }

        $stmt = $this->db->prepare(
            'INSERT INTO User (email, pwd)
             VALUES (?, ?)'
        );
        $result = $stmt->execute([$email, $password]); 
        if($result){
            //salvo l'id dell'utente e lo mando alla home
            $_SESSION['userID'] = $this->db->lastInsertId();
            $_SESSION['email'] = $email;
            header("Location: /index.php/home");
            return;
        }
        else{
            //errore nel login 
            //mostro il div della pwd sbagliata
            $view = new View('registration.php');
            $errore = 'database error';
            return $view -> render(['errore'=>$errore]);
        }
    }
    function logout(){
        session_unset();
        session_destroy();
        header("Location: /index.php/home");
    }
}