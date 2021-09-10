<?php

class Candidatos extends Usuarios {
   
    public $id, $email, $nomeCompleto, $dataNascimento, $sexo, $bio;
    public $cep, $endereco, $numero, $complemento, $bairro, $cidade, $telefone;
    public $imagem;
    public $linkedin, $website;
    
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getBio() {
        return $this->bio;
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


    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setBio($bio) {
        $this->bio = $bio;
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
    
     public function setTelefone($complemento) {
        $this->telefone = $complemento;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }   
    
    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    public function getLinkedin() {
        return $this->linkedin;
    }

    public function getWebsite() {
        return $this->website;
    }

    public function setLinkedin($linkedin) {
        $this->linkedin = $linkedin;
    }

    public function setWebsite($website) {
        $this->website = $website;
    }



}

?>