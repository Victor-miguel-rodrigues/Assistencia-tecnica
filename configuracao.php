<?php

namespace tecnica\config;

class Configuracao{
    

    public static function conexao(){
        define("HOST" , "localhost");
        define("Password", "1234");
        define("USER_NAME", "miguel");
        define("BD_NAME", "assistencia_tecnica");

        $connect = mysqli_connect(HOST,USER_NAME,Password,BD_NAME);

        if(mysqli_connect_error()){
            echo "ERROR";
        }

        return $connect;
    }
}

