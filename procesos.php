<?php
include("/var/www/html/ventaspdv/formVivienda/Control/connection.php");
// $ruta_repocitorio="\\\\210.17.1.99\data_negocios\\imagenes_verificaciones_fisicas\\";
$ruta_repocitorio = "\\\\210.17.1.38\htdocs\\VerificacionesFisicas\\Fotos\\";
$imagen = '';
$imagen2 = '';
if (isset($_FILES["imagen1"])) {
    $file = $_FILES["imagen1"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = $ruta_repocitorio;
    if (
        $tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg'
        && $tipo != 'image/png' && $tipo != 'image/gif'
    ) {
        echo "error, el archivo no es una imagen";
    } elseif ($size > 3 * 1024 * 1024) {
        echo "error, el tamaño máximo permitido es de 3MB";
    } else {
        $src = $carpeta . $nombre;
        move_uploaded_file($ruta_provisional, $src);      
        $imagen = $ruta_repocitorio . $nombre;
    }
}
if (isset($_FILES["imagen2"])) {
    $file = $_FILES["imagen2"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = $ruta_repocitorio;
    if (
        $tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg'
        && $tipo != 'image/png' && $tipo != 'image/gif'
    ) {
        echo "error, el archivo no es una imagen";
    } elseif ($size > 3 * 1024 * 1024) {
        echo "error, el tamaño máximo permitido es de 3MB";
    } else {
        $src = $carpeta . $nombre;
        move_uploaded_file($ruta_provisional, $src);
        $imagen2 = $ruta_repocitorio . $nombre;
    }
}



$query5 = $dbconn->prepare("INSERT INTO images(imagen, imagen2) VALUES ('$imagen','$imagen2')");
$query5->execute();
if ($query5) {
    echo "<script>alert('Registro Insertado de forma correcta'); ";
    header("http://200.7.249.20/ventaspdv/formVivienda/cargaimagenes.php");
} else {
    echo "<script>alert('Registro no insertado'); ";
}
