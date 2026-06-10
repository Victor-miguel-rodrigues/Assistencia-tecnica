<?php

namespace tecnica\repository;

use tecnica\config\Configuracao as config;
class ClienteRepository{

    
    public $connection;
    public $error =[];

    public function __construct(){
        $this->connection =  config::conexao();
    }

    //interface para inserir dados no banco de dados
    public function send($nome,$cpf,$email,$telefone,$endereco  = []){
        $sql = "INSERT INTO clientes (NomeCliente,cpf,telefone,email) VALUES (?,?,?,?)";
        // interface para preparar os dados para ser inserido no banco de dados
        $stmt = mysqli_prepare($this->connection,$sql);
        // interface para fazer o adicionamento dos dados no lugar do ?
        mysqli_stmt_bind_param($stmt,'ssss',$nome,$cpf,$telefone,$email);

        $this->sendEndereco($endereco);
        // interface de execção depois de preparar e colocar os dados
        mysqli_stmt_execute($stmt);
    }

    // interface para inserir o endereço na tabela de endereços
    public function sendEndereco($endereco = []){
        $sql = "INSERT INTO endereco (rua,numero,bairro) Values (?,?,?)";
        $stmt = mysqli_prepare($this->connection, $sql);
        mysqli_stmt_bind_param($stmt,"sis", $endereco[0], $endereco[1],$endereco[2]);
        mysqli_stmt_execute($stmt);
    }

    public function update(){

    }

    public function delete(){

    }

    public function obter($cpf){
    
        if(!preg_match("/[0-9]/", $cpf)){
            header("Location: ../../login.php?error=dados");;
        }

        $sql = "Select id,NomeCliente from clientes where cpf = '$cpf'";
        // interface de consulta 
        $stmt = mysqli_query($this->connection,$sql);
        // depois de executar a consulta e salvo se foi true ou false
        if($resultado = mysqli_query($this->connection,$sql)){
            if(mysqli_num_rows($resultado) > 0 ){
                $dados = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
                var_dump($dados);
            }
        }else{
            $this->error[] = "CPF Invalido ou contem caracteres que são diferentes de um numero";
        }

    }
}

