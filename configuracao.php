<?php

namespace tecnica\config;

class Configuracao{
    

    public static function conexao(){
        define("HOST" , "LC");
        define("Password", "SW");
        define("USER_NAME", "UN");
        define("BD_NAME", "DB_NM");

        $connect = mysqli_connect(HOST,USER_NAME,Password,BD_NAME);

        if(mysqli_connect_error()){
            echo "ERROR";
        }

        return $connect;
    }
}

