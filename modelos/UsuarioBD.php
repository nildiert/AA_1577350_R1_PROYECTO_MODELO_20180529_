<?php

class UsuarioBD {

    private $loginBd;
    private $password;

    public function __construct($u, $p) {
        $this->loginBd = $u;
        $this->password = $p;
        
    }

    public function getLoginBd() {
        return $this->loginBd;
    }

    public function getPassword() {
        return $this->password;
    }

    function setLoginBd($loginBd) {
        $this->loginBd = $loginBd;
    }

    function setPassword($password) {
        $this->password = $password;
    }

}
