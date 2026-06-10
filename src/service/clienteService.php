<?php

namespace tecnica\service;

use tecnica\repository\ClienteRepository as repository;
use tecnica\models\Clientes as cliente;

class ClienteService {

    public $bancoDados;
    public $clientes;

    public function __construct()
    {
        $this->bancoDados = new repository();
        $this->clientes = new cliente();
    }

    public function verificarsenha(string $senha)
    {
        if(mb_strlen($senha) <= 6){
          echo "Senha menor que 6 digito";        
        }else if(mb_strlen($senha) == 0){
            echo "Senha não pode ser nula";
        }

        $senha = preg_match("/[0-9a-z-A-Z]+/", $senha);
        return $senha;
    }

    /**
     * @param - função para limpeza de string, para proteger de tentativas de sql injection - xss
     *  e outro tipos de tentativas
     */
    public function limparString(string $string)
    {
        
        if(!preg_match("/^[0-9a-z\s@+_\.]+$/i", $string)){
           return "caractere ou codigo invalido inserido dentro da string";
           
        }

        $string = filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        return $string;
    }


    public function validarNumero(string $numero)
    {

        if(str_contains($numero, "-")){
           return $numero = str_replace("-","",$numero);
        }

        if(mb_strlen($numero) != 11 or !preg_match("/[^0-9]/", $numero)){
            return "Error";
        }

        $string = filter_var($numero, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        return $string;

    }

    public function  cadastrarCLiente($post)
    {

        if(!empty($post['NomeCliente']) and !empty($post['cpf']) and !empty($post['rua']) and !empty($post['bairro']) and !empty($post['numero']) and !empty($post['telefone']) and !empty($post['email']))
        {

            $this->clientes->setNomeCliente($this->limparString($post['NomeCliente']));
            $this->clientes->setCpfCliente($this->limparString($post['cpf']));
            $this->clientes->setEndereço($this->limparString($post['rua']), $post['numero'], $this->limparString($post['bairro']));
            $this->clientes->setEmail($this->limparString($post['email']));
            $this->clientes->setTelefon( $this->validarNumero($post['telefone']));

            $this->bancoDados->send($this->clientes->getNomeCliente(),$this->clientes->getCpfcliente(),$this->clientes->getEmail(),$this->clientes->getTelefone(),$this->clientes->getEndereco());       
            //echo $this->exibir($nome,$cpf,$rua,$bairro,$numero,$email,$telefone);
        }else
        {
            header("Location: ../../cadastrar_cliente.php?error=characterInvalid");
        }
        
      
    }

    public function buscar($cpf){
        if(!empty($cpf)){
            $this->bancoDados->obter($this->limparString($cpf));
        }else{
             header("Location: ../../login.php?error=dados");
        }
    }

    public function exibir($nome,$a,$b,$c,$r,$t,$y)
    {
            return "{$nome} <br> - {$a} <br> - {$b} <br> - {$c} <br> - {$r} <br>- {$t} <br>- {$y}";
    }

}