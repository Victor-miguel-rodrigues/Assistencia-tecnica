<?php

namespace tecnica\repository;

use tecnica\config\Configuracao as config;
class ClienteRepository{

    
    public $connection;

    public function __construct(){
        $this->connection =  config::conexao();
    }

    public function send($nome,$cpf,$email,$telefone){
        $sql = "INSERT INTO clientes VALUES (?,?,?,?)";
        $this->sendEndereco();
    }

    public function sendEndereco(){

    }
    public function update(){

    }

    public function delete(){

    }

    public function obter($nome,$cpf,$email,$telefone){

    }
}

