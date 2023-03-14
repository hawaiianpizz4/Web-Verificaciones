<?php
include('../Control/connection.php');

error_reporting(0);

if (isset($_POST["submit"])) {
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $planillaServicioBasicoImagen = addslashes(file_get_contents($image));
        $image2 = $_FILES['image2']['tmp_name'];
        $estabilidadLaboraSeisMesesImagen = addslashes(file_get_contents($image2));
        $image3 = $_FILES['image3']['tmp_name'];
        $facturasProveedoresUltimosTresMesesImagen = addslashes(file_get_contents($image3));
        $image4 = $_FILES['image4']['tmp_name'];
        $fachadaDelNegocioImagen = addslashes(file_get_contents($image4));
        $image5 = $_FILES['image5']['tmp_name'];
        $interiorDelNegocioImagen = addslashes(file_get_contents($image5));
        $image6 = $_FILES['image6']['tmp_name'];
        $clienteDentroDelNegocioImagen = addslashes(file_get_contents($image6));
        $image7 = $_FILES['image7']['tmp_name'];
        $clienteFueraDelNegocioImagen = addslashes(file_get_contents($image7));
        $image8 = $_FILES['image8']['tmp_name'];
        $tituloPropiedaGaranteOCodeudorImagen = addslashes(file_get_contents($image8));
        $image9 = $_FILES['image9']['tmp_name'];
        $impuestoPredialImagen = addslashes(file_get_contents($image9));
        $image10 = $_FILES['image10']['tmp_name'];
        $respaldoIngresosImagen = addslashes(file_get_contents($image10));
        $image11 = $_FILES['image11']['tmp_name'];
        $certificadoLaboralImagen = addslashes(file_get_contents($image11));
        $image12 = $_FILES['image12']['tmp_name'];
        $interiorDomicilioImagen = addslashes(file_get_contents($image12));

        $cedulaCliente = $_POST['cedulaCliente'];
        $nombreGestor= $_POST['nombre'];
        $nombreCliente = $_POST['nombreCliente'];
        $direccionDomiciliaria = $_POST['direccionDomiciliaria'];
        $codigoVerificacion = $_POST['codigoCliente'];
        $tipoVivienda = $_POST['tipovivienda'];
        $personaQuienRealizaLaVerificacion = $_POST['persona'];
        $residenciaMinimatresmeses = $_POST['residenciaminimo'];
        $localTerrenoPropio=$_POST['localterrenop'];
        $localTerrenoArrendado=$_POST['localterrearrendado'];
        $planillaServicioBasico = $_POST['serviciobasico'];
        $seguridadPuertasVentanas = $_POST['seguridad'];
        $muebleriaBasica = $_POST['muebleria'];
        $materialCasa = $_POST['material'];
        $periodicidadActividadesLaborales=$_POST['periodicidad'];
        $confirmacionInfoVecinos = $_POST['confirmacionInfoVecinos'];
        $nombreInfoVecino = $_POST['nombreVecino'];
        $celularInfoVecino = $_POST['celularVecino'];
        $latitud = $_POST['lat'];
        $longitud = $_POST['long'];
        $gestor = $_POST["nombre"];
        $tienda = $_POST['nombreTienda'];
        
        var_dump($tienda);
        var_dump($cedulaCliente);

        $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            if($tipoVivienda == "Propia"){
                if($confirmacionInfoVecinos  == "Si"){
                
                    $query = $dbconn->prepare ("CALL ventaspdv_verificaciones.procInsertChecklist('$cedulaCliente', '$nombreCliente', '$codigoVerificacion',
                    '$direccionDomiciliaria', '$tipoVivienda', '$personaQuienRealizaLaVerificacion', '$residenciaMinimatresmeses', '$localTerrenoPropio',
                    '$localTerrenoArrendado', '$planillaServicioBasico', '$planillaServicioBasicoImagen', '$seguridadPuertasVentanas', '$muebleriaBasica', '$materialCasa',
                    '$periodicidadActividadesLaborales',
                    '$confirmacionInfoVecinos',  '$nombreInfoVecino', '$celularInfoVecino', '$estabilidadLaboraSeisMesesImagen', '$facturasProveedoresUltimosTresMesesImagen', '$fachadaDelNegocioImagen', '$interiorDelNegocioImagen', 
                    '$clienteDentroDelNegocioImagen', '$clienteFueraDelNegocioImagen', '$tituloPropiedaGaranteOCodeudorImagen', '$impuestoPredialImagen', '$respaldoIngresosImagen', '$certificadoLaboralImagen', 
                    '$interiorDomicilioImagen', '$latitud', '$longitud', POINT($latitud,$longitud),'$tienda', '$nombreGestor' , ADDTIME(now(), '00:11:00'))");
                    var_dump($query);
                    $query->execute();
                    header("Location:http://200.7.249.20/ventaspdv/formVivienda/layout3" . "?message=exito");
                }
                elseif ($confirmacionInfoVecinos  == "No") {
                    $query = $dbconn->prepare ("CALL ventaspdv_verificaciones.procInsertChecklist('$cedulaCliente', '$nombreCliente', '$codigoVerificacion',
                    '$direccionDomiciliaria', '$tipoVivienda', '$personaQuienRealizaLaVerificacion', '$residenciaMinimatresmeses', '$localTerrenoPropio',
                    '$localTerrenoArrendado', '$planillaServicioBasico', '$planillaServicioBasicoImagen', '$seguridadPuertasVentanas', '$muebleriaBasica', '$materialCasa',
                    '$periodicidadActividadesLaborales',
                    '$confirmacionInfoVecinos',  '', '', '$estabilidadLaboraSeisMesesImagen', '$facturasProveedoresUltimosTresMesesImagen', '$fachadaDelNegocioImagen', '$interiorDelNegocioImagen', 
                    '$clienteDentroDelNegocioImagen', '$clienteFueraDelNegocioImagen', '$tituloPropiedaGaranteOCodeudorImagen', '$impuestoPredialImagen', '$respaldoIngresosImagen', '$certificadoLaboralImagen', 
                    '$interiorDomicilioImagen', '$latitud', '$longitud', POINT($latitud,$longitud),'$tienda', '$nombreGestor' ,ADDTIME(now(), '00:11:00'))");
                    var_dump($query);
                    $query->execute();
                    header("Location:http://200.7.249.20/ventaspdv/formVivienda/layout3" . "?message=exito");
                }
                else {
                    header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=error");
                }
            }
            elseif($tipoVivienda == "Familiar"){
                if($confirmacionInfoVecinos  == "Si"){
                
                    $query = $dbconn->prepare ("CALL ventaspdv_verificaciones.procInsertChecklist('$cedulaCliente', '$nombreCliente', '$codigoVerificacion',
                    '$direccionDomiciliaria', '$tipoVivienda', '$personaQuienRealizaLaVerificacion', '$residenciaMinimatresmeses', '$localTerrenoPropio',
                    '$localTerrenoArrendado', '$planillaServicioBasico', '$planillaServicioBasicoImagen', '$seguridadPuertasVentanas', '$muebleriaBasica', '$materialCasa',
                    '$periodicidadActividadesLaborales',
                    '$confirmacionInfoVecinos',  '$nombreInfoVecino', '$celularInfoVecino', '$estabilidadLaboraSeisMesesImagen', '$facturasProveedoresUltimosTresMesesImagen', '$fachadaDelNegocioImagen', '$interiorDelNegocioImagen', 
                    '$clienteDentroDelNegocioImagen', '$clienteFueraDelNegocioImagen', '$tituloPropiedaGaranteOCodeudorImagen', '$impuestoPredialImagen', '$respaldoIngresosImagen', '$certificadoLaboralImagen', 
                    '$interiorDomicilioImagen', '$latitud', '$longitud', POINT($latitud,$longitud),'$tienda', '$nombreGestor' , ADDTIME(now(), '00:11:00'))");
                    // var_dump($query);
                    $query->execute();
                    header("Location:http://200.7.249.20/ventaspdv/formVivienda/layout3" . "?message=exito");
                }
                elseif ($confirmacionInfoVecinos  == "No") {
                    $query = $dbconn->prepare ("CALL ventaspdv_verificaciones.procInsertChecklist('$cedulaCliente', '$nombreCliente', '$codigoVerificacion',
                    '$direccionDomiciliaria', '$tipoVivienda', '$personaQuienRealizaLaVerificacion', '$residenciaMinimatresmeses', '$localTerrenoPropio',
                    '$localTerrenoArrendado', '$planillaServicioBasico', '$planillaServicioBasicoImagen', '$seguridadPuertasVentanas', '$muebleriaBasica', '$materialCasa',
                    '$periodicidadActividadesLaborales',
                    '$confirmacionInfoVecinos',  '', '', '$estabilidadLaboraSeisMesesImagen', '$facturasProveedoresUltimosTresMesesImagen', '$fachadaDelNegocioImagen', '$interiorDelNegocioImagen', 
                    '$clienteDentroDelNegocioImagen', '$clienteFueraDelNegocioImagen', '$tituloPropiedaGaranteOCodeudorImagen', '$impuestoPredialImagen', '$respaldoIngresosImagen', '$certificadoLaboralImagen', 
                    '$interiorDomicilioImagen', '$latitud', '$longitud', POINT($latitud,$longitud),'$tienda', '$nombreGestor' ,ADDTIME(now(), '00:11:00'))");
                    // var_dump($query);
                    $query->execute();
                    header("Location:http://200.7.249.20/ventaspdv/formVivienda/layout3" . "?message=exito");
                }
                else {
                    header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=error");
                }
            }
            elseif($tipoVivienda == "Arrendada"){
                if($confirmacionInfoVecinos  == "Si"){
                
                    $query = $dbconn->prepare ("CALL ventaspdv_verificaciones.procInsertChecklist('$cedulaCliente', '$nombreCliente', '$codigoVerificacion',
                    '$direccionDomiciliaria', '$tipoVivienda', '$personaQuienRealizaLaVerificacion', '$residenciaMinimatresmeses', '$localTerrenoPropio',
                    '$localTerrenoArrendado', '$planillaServicioBasico', '$planillaServicioBasicoImagen', '$seguridadPuertasVentanas', '$muebleriaBasica', '$materialCasa',
                    '$periodicidadActividadesLaborales',
                    '$confirmacionInfoVecinos',  '$nombreInfoVecino', '$celularInfoVecino', '$estabilidadLaboraSeisMesesImagen', '$facturasProveedoresUltimosTresMesesImagen', '$fachadaDelNegocioImagen', '$interiorDelNegocioImagen', 
                    '$clienteDentroDelNegocioImagen', '$clienteFueraDelNegocioImagen', '', '', '$respaldoIngresosImagen', '$certificadoLaboralImagen', 
                    '$interiorDomicilioImagen', '$latitud', '$longitud', POINT($latitud,$longitud),'$tienda', '$nombreGestor' , ADDTIME(now(), '00:11:00'))");
                    var_dump($query);
                    $query->execute();
                    header("Location:http://200.7.249.20/ventaspdv/formVivienda/layout3" . "?message=exito");
                }
                elseif ($confirmacionInfoVecinos  == "No") {
                    $query = $dbconn->prepare ("CALL ventaspdv_verificaciones.procInsertChecklist('$cedulaCliente', '$nombreCliente', '$codigoVerificacion',
                    '$direccionDomiciliaria', '$tipoVivienda', '$personaQuienRealizaLaVerificacion', '$residenciaMinimatresmeses', '$localTerrenoPropio',
                    '$localTerrenoArrendado', '$planillaServicioBasico', '$planillaServicioBasicoImagen', '$seguridadPuertasVentanas', '$muebleriaBasica', '$materialCasa',
                    '$periodicidadActividadesLaborales',
                    '$confirmacionInfoVecinos',  '', '', '$estabilidadLaboraSeisMesesImagen', '$facturasProveedoresUltimosTresMesesImagen', '$fachadaDelNegocioImagen', '$interiorDelNegocioImagen', 
                    '$clienteDentroDelNegocioImagen', '$clienteFueraDelNegocioImagen', '$tituloPropiedaGaranteOCodeudorImagen', '$impuestoPredialImagen', '$respaldoIngresosImagen', '$certificadoLaboralImagen', 
                    '$interiorDomicilioImagen', '$latitud', '$longitud', POINT($latitud,$longitud),'$tienda', '$nombreGestor' ,ADDTIME(now(), '00:11:00'))");
                    var_dump($query);
                    $query->execute();
                    header("Location:http://200.7.249.20/ventaspdv/formVivienda/layout3" . "?message=exito");
                }
                else {
                    header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=error");
                }
            }
            else{
                header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=error");
            }
            
            

            
            
        } catch (PDOException  $e) {
            header("Location:http://iceuioappweb/ventaspdv/formVivienda/index" . "?message=error");
        }

        
        //var_dump($query);

        $querySelect = $dbconn->prepare("update verificaciones_usuarios_tb 
        set verificado = 1 where vf_cedula_cliente = '$cedulaCliente'");
        //var_dump($querySelect);
        $querySelect->execute();
        
        // if ($query->execute()) {
        //     header("Location: http://iceuioappweb/ventaspdv/formVivienda/layout" . "?message=exito");
        // } else {
        //     header("Location: http://iceuioappweb/ventaspdv/formVivienda/layout" . "?message=error");
        // }
        //         $query = $dbconn->prepare("CALL ventaspdv_verificaciones.proc_isnert_verifica_datos('$cedulaCliente', '$nombreCliente' ,
        // '$codigoCliente','$direccionCliente', '$personaVerificacion', '$residenciatresmeses', '$serviciosbasicos', '$seguridad','$muebleria', '$material',
        // '$confirmacion', '$servicioBasico','$imgContent','$gestor','$imgContent2','$imgContent3', '$latitud', '$longitud', POINT($latitud,$longitud))");

        

        
    }
}

    