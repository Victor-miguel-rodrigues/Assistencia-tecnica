<?php

namespace tecnica\models;

class ClientesModel{

    
    private string $nomeCliente;
    private string $cpfCliente;
    private  $endereco = [];
    private string $telefone;
    private string $email;

    public function __tostring(){
        return "Cliente :" . $this->getNomeCliente(). ", Email :". $this->getEmail(). ", CPF :" . $this->getCpfcliente();
    }

    public function setNomeCliente(string $nomeCliente){
        $this->nomeCliente = $nomeCliente;
    }

    public function getNomeCliente(){
        return $this->nomeCliente;
    }

    public function setCpfCliente(String $cpfCliente){
        $this->cpfCliente = $cpfCliente;
    }

    public function getCpfcliente(){
        return $this->cpfCliente;
    }

    public function setEndereço(string $rua,string $numero,string $bairro){
        $this->endereco =  [$rua,$numero,$bairro];
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setTelefon(string $telefone){
        $this->telefone = $telefone;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setEmail(String $Email){
        $this->email = $Email;
    }

    public function getEmail(){
        return $this->email;
    }


}