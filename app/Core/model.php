<?php
namespace APP\Core;
use Dcblogdev\PdoWrapper\Database;
class model{
    public static function db(){
        // make a connection to mysql here
        $options = [
            //required
            'username' => USERNAME,
            'database' => DATABASE,
            //optional
            'password' => PASSWORD,
            'type' => 'mysql',
            'charset' => CHARSET,
            'host' => HOST,
            'port' => PORT
        ];
        return $db = new Database($options);
    }
}