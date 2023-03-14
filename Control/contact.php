<?php
require "connection.php";
// include('./Control/connection.php');
error_reporting(0);
// Checkbox
// date_default_timezone_set('America/Bogota');    
// $DateAndTime2 = date('Y-m-d h:i:s', time());  

$dato=" "; 
if(isset($_POST['submit'])){//Para ejecutar PHP script en Submit
if(!empty($_POST['check_list'])){
// Bucle para almacenar y mostrar los valores de la casilla de verificación comprobación individual.
foreach($_POST['check_list'] as $selected){
$dato=$dato." ".$selected;
}
}
// echo $dato;
}

//nuevos requerimientos 
$nr_flujo_ingresos = $_POST['flujoIngresos'];
$nr_promedio= $_POST['promedio'];

$nr_checkbox= $dato;



$vf_nombre_tienda = $_POST['nombreTienda'];
$dndlN_codtienda = $_POST['codigoTienda'];
$vf_nombre_vendedor = $_POST['nombreVendedor'];
$vf_nombre_cliente = $_POST['nombreCliente'];
$vf_cedula_cliente = $_POST['cedulaCliente'];
$vf_lugar_a_verificar = $_POST['lugaraVerificar'];
$dndlD_ciudad_residencia = $_POST['ciudadResidencia'];
$dndlD_sector_de_domicilio = $_POST['sectorDomicilio'];
$dndlD_direccion_domiciliaria = $_POST['referenciaDomiciliaria'];
$dndlD_referencia_domiciliaria = $_POST['referenciaDomicilio'];
$dndlN_nombre_empresa_trabaja = $_POST['nombreNegocio'];
// 
$latitud = $_POST['latitud'];
$longitud=$_POST['longitud'];
// 
$dndlN_actividad_laboral = $_POST['actividadOTipoNegocio'];
$dndlN_direccion_trabajo = $_POST['direccionTrabajo'];
$dndlN_telefonofijo = $_POST['numeroFijo'];
$dndlN_telefonocelular = $_POST['numeroCelularCliente'];
$dndlN_telefonocelular2= $_POST['numeroCelularCliente2'];
$cel=substr($dndlN_telefonocelular,1);
$celular="+593".$cel;
$sendmensaje="prueba 1";

$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    if($nr_flujo_ingresos == "Seleccionar" || $latitud=="" || $longitud==""){
        header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=select");
    }
    else{
        if ($vf_lugar_a_verificar == 'Domicilio') {
            $query = $dbconn->prepare("CALL ventaspdv_verificaciones.proc_verificacion_usuarios_tb('$vf_nombre_tienda', 
                    '$vf_nombre_vendedor', '$vf_nombre_cliente','$vf_cedula_cliente','$vf_lugar_a_verificar', '$dndlD_ciudad_residencia', 
                    '$dndlD_sector_de_domicilio','$dndlD_direccion_domiciliaria', '$dndlD_referencia_domiciliaria', NULL, NULL,
                    NULL, NULL, '$dndlN_telefonocelular', '$dndlN_codtienda', ADDTIME(now(), '00:11:00'), '$nr_checkbox','$latitud','$longitud','0','0', 
                    '$dndlN_telefonocelular2', '$nr_flujo_ingresos', '$nr_promedio')");
            $query->execute();
            
            header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=exito");
        } elseif ($vf_lugar_a_verificar == 'Negocio') {
            $query = $dbconn->prepare("CALL ventaspdv_verificaciones.proc_verificacion_usuarios_tb('$vf_nombre_tienda', 
                    '$vf_nombre_vendedor', '$vf_nombre_cliente','$vf_cedula_cliente','$vf_lugar_a_verificar', NULL, 
                    NULL,NULL, NULL, '$dndlN_nombre_empresa_trabaja', ' $dndlN_actividad_laboral',
                    '$dndlN_direccion_trabajo', '$dndlN_telefonofijo',  '$dndlN_telefonocelular', '$dndlN_codtienda', ADDTIME(now(), '00:11:00'), '$nr_checkbox','$latitud','$longitud','0','0', 
                    '$dndlN_telefonocelular2', '$nr_flujo_ingresos', '$nr_promedio')");
            $query->execute();
            
            header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=exito");
        } elseif ($vf_lugar_a_verificar == 'NegoDomiDiferente') {
            $query = $dbconn->prepare("CALL ventaspdv_verificaciones.proc_verificacion_usuarios_tb('$vf_nombre_tienda', 
                    '$vf_nombre_vendedor', '$vf_nombre_cliente','$vf_cedula_cliente','$vf_lugar_a_verificar', '$dndlD_ciudad_residencia', 
                    '$dndlD_sector_de_domicilio','$dndlD_direccion_domiciliaria', '$dndlD_referencia_domiciliaria', '$dndlN_nombre_empresa_trabaja', ' $dndlN_actividad_laboral',
                    '$dndlN_direccion_trabajo', '$dndlN_telefonofijo',  '$dndlN_telefonocelular', '$dndlN_codtienda', ADDTIME(now(), '00:11:00'), '$nr_checkbox','$latitud','$longitud','0','0', 
                    '$dndlN_telefonocelular2', '$nr_flujo_ingresos', '$nr_promedio')");
            $query->execute();
            
            header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=exito");
        } elseif ($vf_lugar_a_verificar == 'NegoDomiMismo') {
            $query = $dbconn->prepare("CALL ventaspdv_verificaciones.proc_verificacion_usuarios_tb('$vf_nombre_tienda', 
                    '$vf_nombre_vendedor', '$vf_nombre_cliente','$vf_cedula_cliente','$vf_lugar_a_verificar', '$dndlD_ciudad_residencia', 
                    '$dndlD_sector_de_domicilio','$dndlD_direccion_domiciliaria', '$dndlD_referencia_domiciliaria', '$dndlN_nombre_empresa_trabaja', ' $dndlN_actividad_laboral',
                    '$dndlN_direccion_trabajo', '$dndlN_telefonofijo',  '$dndlN_telefonocelular', '$dndlN_codtienda', ADDTIME(now(), '00:11:00'), '$nr_checkbox','$latitud','$longitud','0','0', 
                    '$dndlN_telefonocelular2', '$nr_flujo_ingresos', '$nr_promedio')");
            $query->execute();
            header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=exito");
        } elseif ($vf_lugar_a_verificar == "Seleccionar") {
            header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=select2");
        }
        else {
            header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=error");
        }
    }
    
} catch (PDOException  $e) {
    header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=errorcedula");
}

