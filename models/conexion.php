<?php
class Conexion{
    static public function conectar(){
        $link= new PDO("mysql:host=210.17.1.100:3306;dbaname=vivewow","admin","fdL2EU");
        $link->exec("set names utf8mb4");
        return $link;
    }
}
?>