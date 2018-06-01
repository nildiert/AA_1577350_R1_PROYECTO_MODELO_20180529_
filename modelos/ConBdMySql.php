<?php

abstract class ConBdMySql {

    private $servidor;
    private $base;
    protected $conexion;

    public function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        $this->base = $base;
        $this->servidor = $servidor;

        try {
            $this->conexion = new PDO("mysql:dbname=" . $this->base . ";host=" . $this->servidor, $usuarioBd->getLoginBd(), $usuarioBd->getPassword(),array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
//            $this->conexion->exec("set names utf8");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexion: " . $e->getMessage();
            exit(1);
        }
    }

    public function cierreBd() {
        $this->conexion = null;
    }

}

//NOTA: Para problemas con codificación:
//$pdo = new PDO('mysql:host= servidor; dbname=bd', $usuario, $clave, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''))
//OTRA OPCION:z


