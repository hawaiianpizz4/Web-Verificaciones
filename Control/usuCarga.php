<?php
require_once '/var/www/html/ventaspdv/formVivienda/Control/config-mysql_dbm.php';
//require_once '/var/www/html/ventaspdv/ControlClientes/Control/config-mysql_dbm.php';
include('/var/www/html/ventaspdv/includes/config-cartera.php');

$stid = oci_parse($conn, "SELECT
	u.AGENCIA AGENCIA,
	LCN_DESCRIPCION
FROM
	NEXSYS.GNL_USUARIOS_TB_NX u,
	NEXSYS.INV_LOCALIZACION_TB_NX l
WHERE
	u.USU_EMPRESA = 'ICESA'
	AND u.STATUS = 'A'
	AND u.AGENCIA = l.LCN_AGENCIA_MR
	AND u.USERNAME = '$_SESSION[USERNAME]'");
oci_execute($stid);
$row = oci_fetch_assoc($stid);
$usuario = $_SESSION["USERNAME"];
$local = $row["LCN_DESCRIPCION"];
$codlocal = $row["AGENCIA"];
setlocale(LC_ALL,"es_ES");
$today=utf8_decode(strftime("%A %d de %B del %Y"));
// //carga de cedulas
// $sql = "call pdv_conversion.proc_select_trafico_CRM('$usuario')";
// $ced = mysqli_query($mysqli,$sql);
// $numCedula  = array();
// while ($row = mysqli_fetch_array($ced)) {
//     $numCedula[] = $row;
// }   
?>
