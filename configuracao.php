<?php

namespace tecnica\config;

class Configuracao{
    
    /* var_dump(__FILE__);
     debug_print_backtrace();*/

    public static function conexao(){

        define("HOST" , "");
        define("Password", "");
        define("USER_NAME", "");
        define("BD_NAME", "");

        $connect = mysqli_connect(HOST,USER_NAME,Password,BD_NAME);

        if(mysqli_connect_error()){
            echo "ERROR";
        }

        return $connect;
    }
}

