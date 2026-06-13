<?php

namespace tecnica\repository;

use tecnica\config\Configuracao as config;
class ClienteRepository{

    
    public $connection;

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

    public function update(string $cpf, $str = []){
        
        if(!preg_match("/[0-9]+/", $cpf)){
            header("Location: ../../alterar_dados.php?error=dados");
        }

        $sql = "select * from clientes where cpf = '$cpf'";
        if($resultado = mysqli_query($this->connection,$sql)){

             if(mysqli_num_rows($resultado) == 1){

                 $dados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
                 $recebidos = $str;

                
                if(!empty($recebidos['nomeCliente']) and !empty($recebidos['telefone']) and !empty($recebidos['email'])){
                    foreach($dados as $dado){

                        if($recebidos['nomeCliente'] != $dado['nomeCliente']){
                        $sql = "update clientes set nomeCliente = '{$recebidos['nomeCliente']}' where id = {$dado['id']} ";
                        $stmt = mysqli_prepare($this->connection,$sql);
                        if(mysqli_stmt_execute($stmt)){
                            echo "Concluido <a href='../view/Clientes.php'> clique aqui para voltar </a>";
                        }else{
                            echo "falhou <a href='../view/Clientes.php'> clique aqui para voltar </a>";
                        }

                        }

                        if($recebidos['telefone']  != $dado['telefone']){
                            $sql = "update clientes set telefone = '{$recebidos['telefone']}' where id = {$dado['id']}";
                            $stmt = mysqli_prepare($this->connection,$sql);
                            mysqli_stmt_execute($stmt);

                        }

                        if($recebidos['email'] != $dado['email']){
                            $sql = "update clientes set email = '{$recebidos['email']}' where id = {$dado['id']}";
                            $stmt = mysqli_prepare($this->connection,$sql);
                            mysqli_stmt_execute($stmt);
                        }

                    }
                    // termino do for
                }
                // termino do if para verificar se os dados não tão vazios
                
            }

                
        }
    }



    public function delete(){

    }

    public function obter(){
        $sql = "Select * from clientes";

        // depois de executar a consulta e salvo se foi true ou false
        if($resultado = mysqli_query($this->connection,$sql)){

            if(mysqli_num_rows($resultado) > 0 ){
                $dados = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
                return $dados;
            }

        }


    }
}

