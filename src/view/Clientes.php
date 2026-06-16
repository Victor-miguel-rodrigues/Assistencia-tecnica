<?php

namespace tecnica\view;

require "../../vendor/autoload.php";

use  tecnica\controllers\ClienteController as mineControler;
use tecnica\models\ClientesModel as model;
class Clientes{

        public $cliente;
        public $nome;

        public function __construct(){
            $this->cliente = new mineControler();
            $this->nome = new model();
        }

        public function alterar_dados(){
            echo "<h1>Alterar dados</h1>";
            $smt = '';
            foreach($this->cliente->getDados() as $cliente){
               
                if($_GET['alter'] == $cliente['nomeCliente']){
                    $smt = "
                        <form action='Clientes.php?alteracao=enviado' method='post'>
                            <label for='nomeCliente'> Nome do cliente: {$cliente['nomeCliente']} </label><br>
                            <input type='text' name='nomeCliente' id='nomeCliente'><br>
                            <label for='cpf'> CPF do cliente: {$cliente['cpf']}</label><br>
                            <input type='text' name='CPF' id='CPF'><br>
                            <label for='telefone'> Numero de Telefone: {$cliente['telefone']}</label><br>
                            <input type='text' name='telefone' id='telefone'><br>
                            <label for='nomeCliente'> Email do cliente: {$cliente['email']} </label><br>
                            <input type='text' name='email' id='email'><br>
                            
                            <input type='submit' name='Alterar' value='alterar dados'>
                        </form>
                    ";
                 
                }
            }
                echo $smt;
        }

        public function alterando_formulario(){
            if(isset($_POST['Alterar'])){
                if(!empty($_POST['nomeCliente']) and !empty($_POST['CPF']) and !empty($_POST['telefone']) and !empty($_POST['email'])){
                    $this->cliente->alterar($_POST);
                }
            }else{
                echo "não foi";
            }
        }


        public function mostrar_dados(){
           echo "  <h1> Clientes cadastrado</h1>";
            foreach($this->cliente->getDados() as $cliente){
                $smt = "
                        <p> Nome do cliente: {$cliente['nomeCliente']} </p>
                        <p> CPF do cliente: {$cliente['cpf']} </p>
                        <p> Numero de Telefone: {$cliente['telefone']} </p>
                        <p> Email do cliente: {$cliente['email']} </p>
                        <p><a href='Clientes.php?alter={$cliente['nomeCliente']}'>Alterar dados do cliente</a><p>
                        <br>
                    ";
                        $this->nome = $cliente['nomeCliente'];
                    echo $smt;
            }

        }

}

if(!isset($_GET['alter']) and !isset($_GET['alteracao'])){
    echo (new Clientes())->mostrar_dados();
}else if(isset($_GET['alteracao']) and $_GET['alteracao'] == "enviado"){
    echo (new Clientes())->alterando_formulario();
}else if(isset($_GET['alter']) and !empty($_GET['alter'])){
    echo (new Clientes())->alterar_dados();
}

/*
if(!isset($_GET['alter'])){
    echo (new Clientes())->mostrar_dados();
}
*/