<?php

class ConexionBD{
    static public function conectarBD(){
        $BaseDatos = new PDO("mysql:host=localhost;dbname=clinica", "root", "");
        $BaseDatos -> exec("set names utf8");
        return $BaseDatos;
    }
}