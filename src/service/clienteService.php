<?php

namespace tecnica\service;

class ClienteService {


    public static function enviarDados(){
        global $connect;

        echo USER_NAME;
    } 

/*    public function dados($post)
    {
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
        }else{
            header("Location: ../../cadastrar_cliente.php?failed=true");
        }
        }

    }*/
}