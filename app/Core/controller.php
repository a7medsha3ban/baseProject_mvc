<?php
namespace APP\Core;
use Dcblogdev\PdoWrapper\Database;
class controller{
    public function view($path,$params){
        extract($params);
        require_once (VIEWS.$path.".php");
    }
}