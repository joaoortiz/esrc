<?php

class Curriculos{
  
    public $nomeInstituicao, $nomeCurso, $inicio, $fim, $conclusao;
    
    public function getNomeInstituicao() {
        return $this->nomeInstituicao;
    }

    public function getNomeCurso() {
        return $this->nomeCurso;
    }

    public function getInicio() {
        return $this->inicio;
    }

    public function getFim() {
        return $this->fim;
    }

    public function getConclusao() {
        return $this->conclusao;
    }

    public function setNomeInstituicao($nomeInstituicao) {
        $this->nomeInstituicao = $nomeInstituicao;
    }

    public function setNomeCurso($nomeCurso) {
        $this->nomeCurso = $nomeCurso;
    }

    public function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    public function setFim($fim) {
        $this->fim = $fim;
    }

    public function setConclusao($conclusao) {
        $this->conclusao = $conclusao;
    }


    
}
