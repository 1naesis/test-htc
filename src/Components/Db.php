<?php


namespace App\Components;


class Db
{
    private static $db_file = 'figures.db';
    private static $pdo;

    public static function query($query)
    {
        if(!self::$pdo){
            self::$pdo = new \PDO('sqlite:'.self::$db_file);
        }
        $statment = self::$pdo->query($query);
        return $statment->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function insert($query, $bind=[])
    {
        if(!self::$pdo){
            self::$pdo = new \PDO('sqlite:'.self::$db_file);
        }
        $statment = self::$pdo->prepare($query);
        $statment->execute($bind);
        return true;
    }
}