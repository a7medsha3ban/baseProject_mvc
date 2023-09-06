<?php

namespace APP\Core;

class helpers
{
    public static function redirect($path){
        // getting hostname
        $host  = $_SERVER['HTTP_HOST'];
        // getting the current directory preceded by a forward “/” slash
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        // using the PHP header location with an absolute URL to redirect to the $path
        header("Location: http://$host$uri/$path");
        //The script following the header function might continue to execute even after redirection. Therefore,
        // it is recommended to run the exit statement after the PHP header location to terminate the current script.
        exit;
    }
}