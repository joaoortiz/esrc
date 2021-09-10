<?php

class Vagas {

    public $id, $cargo, $descricao, $idTipo, $icone, $idEmpresa;
    public $data, $salario, $contrato, $periodo, $sistema, $beneficios, $status;

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

    public function getIdTipo() {
        return $this->idTipo;
    }

    public function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

        
    public function getIcone() {
        return $this->icone;
    }

    public function setIcone($icone) {
        $this->icone = $icone;
    }

    public function getData() {
        return $this->data;
    }

    public function getSalario() {
        return $this->salario;
    }

    public function getContrato() {
        return $this->contrato;
    }

    public function getPeriodo() {
        return $this->periodo;
    }

    public function getSistema() {
        return $this->sistema;
    }

    public function getBeneficios() {
        return $this->beneficios;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function setContrato($contrato) {
        $this->contrato = $contrato;
    }

    public function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    public function setSistema($sistema) {
        $this->sistema = $sistema;
    }

    public function setBeneficios($beneficios) {
        $this->beneficios = $beneficios;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
