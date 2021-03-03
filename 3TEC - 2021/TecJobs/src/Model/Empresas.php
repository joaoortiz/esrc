<?php

require_once "Usuarios.php";

class Empresas extends Usuarios {
    
     public $id, $email, $nomeFantasia, $info;
    public $cep, $endereco, $numero, $complemento, $telefone ;
    public $imagem, $idCategoria;
    
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    public function getInfo() {
        return $this->info;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setNomeFantasia($nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function setInfo($info) {
        $this->info = $info;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }


    
}
?>