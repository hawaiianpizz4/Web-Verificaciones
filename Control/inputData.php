<?php
// include('/ventaspdv/includes/config-mysql_dbm');
$dbhost = '210.17.1.36:3317';
$dbname = 'gestion_terreno';
$dbuser = 'cargaBI';
$dbpass = '%@3*ay4U';
$dbconn = new PDO('mysql:host=210.17.1.36:3317;dbname=gestion_terreno', $dbuser, $dbpass);

var_dump($_POST);
$ci = $_POST["ci"];
if ($_POST["credito"] = !'undefined') {
    $credito = $_POST["credito"];
} else if (strlen($_POST["operacion"]) < 15 ) {
    header("Location: http://200.7.249.20/ventaspdv/formVivienda/gestores" . "?message=operacion");
} else {
    $credito = $_POST["operacion"];
    $tipoG = $_POST["tipoGestion"];
    $gCobranza = $_POST["gestionCobranza"];
    $obsDetalle = $_POST["observacion"];
    $tipoCont = $_POST["tipoContacto"];
    $img = $_POST["imagen2"];
    $lat = $_POST["lat"];
    if(isset($_POST["plazoNuevo"])){
        $plazoNuevo = $_POST["plazoNuevo"];
    }else{
        $plazoNuevo = null;
    }
    if(isset($_POST["valorRenegociar"])){
        $valorRenegociar = $_POST["valorRenegociar"];
    }else{
        $valorRenegociar = null;
    }
    var_dump($_POST);
    if (strlen($longi = $_POST["long"]) == 0) {
        header("Location: http://200.7.249.20/ventaspdv/GestoresApp/gestores" . "?message=coor");
    } else {
        $useIn = $_POST["nombre"];
        $locali = $_POST["local"];
        $sql = $dbconn->prepare("call gestion_terreno.proc_insert_gestion_cobros('$ci','$credito','$tipoG','$gCobranza','$tipoCont','$lat','$longi','$useIn','$locali',POINT($lat,$longi),'$obsDetalle','$plazoNuevo','$valorRenegociar')");
        if ($sql->execute()) {
            header("Location: http://200.7.249.20/ventaspdv/GestoresApp/gestores" . "?message=exito");
        } else {
            header("Location: http://200.7.249.20/ventaspdv/GestoresApp/gestores" . "?message=error");
        }
    }
}

// if($conocer != 10580600 || $conocer != 80580600){
//     header("Location: http://200.7.249.20/ventaspdv/GestoresApp/gestores" . "?message=operacion");
// }else
