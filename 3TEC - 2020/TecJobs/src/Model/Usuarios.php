<?php

class Usuarios {
    public $login, $senha , $permissao;
    
    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getPermissao() {
        return $this->permissao;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setPermissao($permissao) {
        $this->permissao = $permissao;
    }


}



?>
