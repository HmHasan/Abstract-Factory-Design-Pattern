<?php


include("db.php");

class db 
{
    private static $pdo;

    public static function connection()
    {
        try
        {
            self::$pdo = new PDO('mysql:host='.dbhost.';dbname='.dbname,dbuser,dbpass);
        }

        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        return self::$pdo;
    }

    public static function myprepare($sql)
    {
        return self::connection()->prepare($sql);
    }
}


?>