<?php

class DB{
    private static $instance;
    public static function getInstance(){
        if(self::$instance != null){
            return self::$instance;
        }

        self::$instance = new PDO(
                "mysql:host=db;dbname=blio;charset=utf8mb4","usuario","senha"
            );
        return self::$instance;
    }
}
DB::getInstance();
?>