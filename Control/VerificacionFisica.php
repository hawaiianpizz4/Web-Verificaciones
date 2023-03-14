<?php
    include("/var/www/html/ventaspdv/formVivienda/Control/connection.php");
    include("./Control/numCedula.php");
    include("./Control/usuCarga.php");
    $query2 = $dbconn->prepare("SELECT * FROM verificaciones_usuarios_tb WHERE estado ='0' 
    AND canal ='Web' ");
    $query2->execute();
    $data = $query2->fetchAll();

    $usuario=$_SESSION["USERNAME"];
    // $query3=$dbconn->prepare("SELECT *,b.vf_gestor  from verificaciones_usuarios_tb a
    // inner join verificaciones_fisicas b on 
    // a.vf_cedula_cliente =b.vf_cedula and DATE_FORMAT(a.fechaIngreso,'%Y-%m-%d')  = DATE_FORMAT(b.fechaIngreso,'%Y-%m-%d')  
    // WHERE estado ='1' and verificado ='0' and b.vf_gestor='$usuario'  group by  a.vf_cedula_cliente");
    $query3=$dbconn->prepare("SELECT * from ventaspdv_verificaciones.verificaciones_usuarios_tb a
    WHERE a.estado ='1' and a.verificado ='0' and a.nombre_gestor='$usuario'  group by  a.vf_cedula_cliente");
    $tGestores =$dbconn->prepare("SELECT *,b.vf_gestor  from verificaciones_usuarios_tb a
    inner join verificaciones_fisicas b on 
    a.vf_cedula_cliente =b.vf_cedula and DATE_FORMAT(a.fechaIngreso,'%Y-%m-%d')  = DATE_FORMAT(b.fechaIngreso,'%Y-%m-%d')  
    WHERE estado ='1' and verificado ='0' group by  a.vf_cedula_cliente");
    $query3->execute();
    $data4 = $query3->fetchAll();
    $tGestores->execute();
    $execuTgestores = $tGestores->fetchAll();

    $query7=$dbconn->prepare("SELECT * FROM verificaciones_datos_encuesta_tb");
    $query7->execute();
    $data7=$query7->fetchAll();

    $tienda=$local;
    $query4 = $dbconn->prepare("CALL ventaspdv_verificaciones.proc_usuariosadministrados_tb('$tienda')");
    $query4->execute();
    $data8 = $query4->fetchAll();

?>