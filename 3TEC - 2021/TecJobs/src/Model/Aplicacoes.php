<?php


class Aplicacoes {
 public $idCandidato, $idVaga, $data, $introducao, $arquivo;
 
 public function getIdCandidato() {
     return $this->idCandidato;
 }

 public function getIdVaga() {
     return $this->idVaga;
 }

 public function getData() {
     return $this->data;
 }

 public function getIntroducao() {
     return $this->introducao;
 }

 public function getArquivo() {
     return $this->arquivo;
 }

 public function setIdCandidato($idCandidato) {
     $this->idCandidato = $idCandidato;
 }

 public function setIdVaga($idVaga) {
     $this->idVaga = $idVaga;
 }

 public function setData($data) {
     $this->data = $data;
 }

 public function setIntroducao($introducao) {
     $this->introducao = $introducao;
 }

 public function setArquivo($arquivo) {
     $this->arquivo = $arquivo;
 }


 
}

?>
