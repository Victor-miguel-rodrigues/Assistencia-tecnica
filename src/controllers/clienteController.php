<?php

require "../../vendor/autoload.php";

use tecnica\models\Clientes as clientes;
use tecnica\service\ClienteService as service;
use tecnica\config\Configuracao as config;


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
        return $this->getServico()->buscar($_REQUEST['CPF']);
    }    

}

if(isset($_POST['Enviar']) ){
    if($_POST['Enviar']){
        echo (new ClienteController())->criar();
    }
}

if(isset($_POST)){
    if($_POST['logar']){
        echo (new ClienteController())->getDados();
    }
}

//$clientes->setNomeCliente($_REQUEST['NomeCliente']);

//echo $clientes->getNomeCliente();
/*
function controle_de_dados(){
    global $servico;

    $nome = $servico ->limparString($_REQUEST['NomeCliente']);

}


controle_de_dados();
/*


if(isset($_POST['Enviar']) and !empty($_POST['Enviar'])){
    
    $nome = filter_var($_POST['NomeCliente'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rua = filter_var($_POST['rua'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $bairro = filter_var($_POST['bairro'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $numero = filter_var($_POST['numero'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!empty($nome) and !empty($cpf) and !empty($rua) and !empty($bairro) and !empty($numero) and !empty($email) and !empty($telefone)){
        $clientes->setNomeCliente($nome);
        $clientes->setCpfCliente($cpf);
        $clientes->setEndereço($rua,$numero,$bairro);
        $clientes->setTelefon($telefone);
        $clientes->setEmail($email);
        sleep(0.2);
        
    }else{
        //header("Location: ../../cadastrar_cliente.php?failed=true");
    }
}

$connect = config::conexao();

$nome =   $clientes->getNomeCliente();
$cpf = $clientes->getCpfcliente();
$telefone = $clientes->getTelefone();
$email = $clientes->getEmail();

$sql = "INSERT INTO clientes (nomeCliente,cpf,telefone,email) Values ('$nome','$cpf','$telefone','$email')";

if($resultado = mysqli_query($connect,$sql)){
    
}else {
    echo "falhou";
}

/*
function exibir(){

$nome =   $clientes->getNomeCliente();
$cpf = $clientes->getCpfcliente();
$telefone = $clientes->getTelefone();
$email = $clientes->getEmail();
$endereco  = 1;

$connect = $config::conexao();

var_dump($connect);

$sql = "INSERT INTO clientes (,nomeCliente,cpf,telefone,email) Values ('$nome','$cpf','$telefone','$email')";

if($resultado = mysqli_query($connect,$sql)){
    
}else{
    header("Location: ../../cadastrar_cliente.php?failed=true");
}
}*/