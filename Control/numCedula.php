<?php
require_once '/var/www/html/ventaspdv/seguridad/rol-menu_agencia.php';
include("/var/www/html/ventaspdv/includes/configGestores.php");

$stid = oci_parse($conn, "SELECT
	u.AGENCIA AGENCIA,
        l.LCN_LOCALIZACION LOCALIZACION
FROM
	NEXSYS.GNL_USUARIOS_TB_NX u,
	NEXSYS.INV_LOCALIZACION_TB_NX l
WHERE
	u.USU_EMPRESA = 'ICESA'
	AND u.STATUS = 'A'
	AND u.AGENCIA = l.LCN_AGENCIA_MR
	AND u.USERNAME = '$_SESSION[USERNAME]'");
oci_execute($stid);
$local = oci_fetch_assoc($stid);

setlocale(LC_ALL, "es_ES");
$today = utf8_decode(strftime("%A %d de %B del %Y"));
$usuario = $_SESSION['USERNAME'];

