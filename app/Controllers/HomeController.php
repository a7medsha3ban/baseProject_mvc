<?php

namespace APP\Controllers;
use APP\Core\controller;
use APP\Core\session;
use APP\Models\User;
use Rakit\Validation\Validator;

class HomeController extends controller {
    public function __construct()
    {
        session::Start();
        $user = session::Get('user');
        if(isset($user)){
            echo "Hello ".$user->name;
        }
        else{
            echo "user not logged in";

        }
    }

    public function index(){
        $title = "index";
        $name = "Ahmed";
        $user = new User();
        $users = $user->getAllUsers();
        return $this->view('home/index',['title'=>$title,'name'=>$name , 'users'=>$users]);
    }
}