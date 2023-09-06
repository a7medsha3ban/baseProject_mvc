<?php

namespace APP\Core;
class app{

    private $controller = "HomeController";
    private $method = 'index';
    private $params = [];
    public function __construct()
    {
        $this->prepareURL();
        $this->render();
    }

    //function to explode url and prepare it
    private function prepareURL(){
        $url = $_SERVER['QUERY_STRING'];
        if(!empty($url)){
            $url = trim($url, "/");
            $url = explode("/",$_SERVER['QUERY_STRING']);
            //controller
            $this->controller = isset($url[0]) ? ucwords($url[0]) . "Controller" : "HomeController";
            //method
            $this->method = isset($url[1]) ? $url[1] : "index";
            //params
            unset($url[0],$url[1]);
            $this->params = !empty($url) ? array_values($url) : [];
        }

    }


    //function to render the exploded url to controllers, methods(params)
    private function render(){
        $controller = "APP\Controllers\\".$this->controller;
        if(class_exists($controller)){
            $controller = new $controller;
            if(method_exists($controller,$this->method)){
                call_user_func_array([$controller,$this->method],$this->params);
            }
            else{
                echo "Method [".$this->method."] does not exist.";
            }
        }
        else{
            echo "Class [".$this->controller ."] does not exist";
        }
    }
}