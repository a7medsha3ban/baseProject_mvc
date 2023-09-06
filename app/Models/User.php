<?php

namespace APP\Models;
use APP\Core\model;

class User extends model{
    public function getAllUsers(){

        //returns array we can access like this user['name']
        //$data =  model::db()->run("select * FROM users")->fetchAll();

        // returns stdClass obj we can access like this user->name
        $data =  model::db()->rows("select * FROM users");
        return $data;
    }

    public function getUser($email , $password){
        $data =  model::db()->row("select * FROM `users` where `email` = '$email'  &&  `password` = '$password' ");
        return $data;
    }
}