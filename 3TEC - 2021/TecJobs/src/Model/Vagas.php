<?php

class Vagas {

    public $id, $cargo, $descricao, $idEmpresa;

    public function getId() {
        return $this->id;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getIdEmpresa() {
        return $this->idEmpresa;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }


    
}
