<?php 
include('../models/editSolicitudes.php');

$nombre = $_POST["Nombre"];
$Lugar = $_POST["Lugar"];
$Ciudad = $_POST["Ciudad"];
$Domicilio = $_POST["Domicilio"];
$Direccion = $_POST["Direccion"];
$Referencia = $_POST["Referencia"];
$Empresa = $_POST["Empresa"];
$Actividad = $_POST["Actividad"];
$Telefono = $_POST["Telefono"];
$Flujo_ingresos = $_POST["Flujo_ingresos"];
$cedula = $_POST["Cedula"];


$sql = editarSolicitud::edit($nombre,
$Lugar ,
$Ciudad,
$Domicilio,
$Direccion,
$Referencia,
$Empresa,
$Actividad,
$Telefono,
$Flujo_ingresos,
$cedula);
if($sql == 'exito'){
    header('Location: ./useradministration' . "?message=exito");
}else{
    header('Location: ./useradministration' . "?message=exito");
}
