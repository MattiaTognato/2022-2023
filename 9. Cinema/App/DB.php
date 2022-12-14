<?php 
namespace App;

class DB{
    private static \PDO $db;

    public function __construct(){    
        try
        {
            DB::$db = new \PDO("mysql:host=127.0.0.1;dbname=cinema", 'root', '');
        }
        catch (\PDOException $e)
        {
            exit("Error: " . $e->getMessage());
        }
    }
    public static function DB_singletone(){
        if(isset(DB::$db)){
            return DB::$db;
        }
        new DB();
        return DB::$db;
    }
}