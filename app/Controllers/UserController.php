<?php

namespace APP\Controllers;
use APP\Core\controller;
use APP\Core\helpers;
use APP\Core\session;
use APP\Models\User;
use Rakit\Validation\Validator;
class UserController extends controller{
    public function __construct()
    {
        session::Start();
    }

    public function index(){
        $user = session::Get('user');
        if(isset($user)){
            echo "Hello ".$user->name;
        }
        else{
            echo "user not logged in";

        }
    }

    public function login(){
        $title = "login";
        return $this->view('user/login',['title'=>$title]);
    }

    public function handleLogin(){
        $validator = new Validator();
        // make it
        $validation = $validator->make($_POST ,[
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
        ]);

        // then validate
        $validation->validate();
        if ($validation->fails()) {
            // handling errors
            $errors = $validation->errors();
            echo "<pre>";
            print_r($errors->firstOfAll());
            echo "</pre>";
            exit;
        } else {
            // validation passes
            $userObj  = new User();
            $user = $userObj->getUser($_POST['email'],$_POST['password']);
            session::Set('user',$user);
            helpers::redirect('user/index');
        }
    }

    public function logout(){
        session::Stop();
        helpers::redirect('user/login');
    }
}