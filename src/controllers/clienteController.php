<?php

namespace tecnica\controllers;

require "../../vendor/autoload.php";

use tecnica\models\ClientesModel as clientes;
use tecnica\service\ClienteService as service;



class ClienteController{


    public  $clientes;
    public  $servico;

    public function __construct(){
        $this->clientes = new clientes();
        $this->servico = new service();
    }

    public function getServico(){
        return $this->servico;
    }    
    public  function criar(){
        return $this->getServico()->cadastrarCLiente($_POST);
    }

    public function getDados(){
        return $this->getServico()->buscar();
    }    

    public function alterar($str = []){
        return $this->getServico()->alterarDados($_REQUEST['CPF'], $str);
    }

}


if(isset($_POST['Enviar']) ){
    if($_POST['Enviar']){
        echo (new ClienteController())->criar();
    }
}
/*
}else if(isset($_POST['logar'])){
    if($_POST['logar']){
        echo (new ClienteController())->getDados();
    }
}else if(isset($_POST['Alterar'])){
    if($_POST['Alterar']){
       echo (new ClienteController())->alterar();
    }
}*/