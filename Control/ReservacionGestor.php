<?php
    include("./numCedula.php");
    include("./connection.php");

    $gestor = $_SESSION['USERNAME'];
    $usuario = $_POST["nombreInsert4"];
    $cedula = trim($_POST["cedulaInsert3"]);
    $DesdeLetra = "a";
    $HastaLetra = "z";
    $DesdeNumero = 1;
    $HastaNumero = 10000;
    $letraAleatoria = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
    $numeroAleatorio = rand($DesdeNumero, $HastaNumero);
    $cadenaCodigo=$letraAleatoria.$numeroAleatorio; 
    // Coordenadas
    $latitud_reserva_gestor = $_POST['lat1'];
    $longitud_reserva_gestor = $_POST['long1'];
    if($latitud_reserva_gestor=="" || $longitud_reserva_gestor==""){
        header("Location: http://200.7.249.20/ventaspdv/formVivienda/verificaciones" . "?message=failcoordenadas");
    }
    else{
        // $sql = $dbconn->prepare("call proc_insertar_reserva('$gestor','$usuario','$cedula','$cadenaCodigo','$latitud', '$longitud',  POINT($latitud,$longitud), ADDTIME(now(), '00:11:00'))");
        $sql = $dbconn->prepare("Update ventaspdv_verificaciones.verificaciones_usuarios_tb a set a.nombre_gestor= '$gestor', a.estado=1, a.codigo_verificacion = '$cadenaCodigo', 
        a.latitud_reserva_gestor='$latitud_reserva_gestor', a.longitud_reserva_gestor='$longitud_reserva_gestor' , a.coordenas_reserva_gestor=POINT($latitud_reserva_gestor,$longitud_reserva_gestor) ,
        a.fechaIngreso_reserva= ADDTIME(now(), '00:14:00')
        where a.vf_cedula_cliente ='$cedula'");
        if($sql->execute()){
            header("Location: http://200.7.249.20/ventaspdv/formVivienda/verificaciones" . "?message=exito");
        }else{
            header("Location: http://200.7.249.20/ventaspdvformVivienda/verificaciones" . "?message=error");    
        }
    }
?>