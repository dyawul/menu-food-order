<?php

class Database 
{
    private static $host = "localhost";
    private static $username = "root";
    private static $pass = "";
    private static $db = "db_food";
    private static $connect;

    public static function getConnection()
    {
        if (!isset(self::$connect)) {
            self::$connect = new mysqli(self::$host, self::$username, self::$pass, self::$db);
            
            if (self::$connect->connect_error) {
                die('Connection failed: ' . self::$connect->connect_error);
            }
        }
        
        return self::$connect;
    }
}
