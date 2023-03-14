<!DOCTYPE html>
<html lang="en">
<?php
include("./Control/VerificacionFisica.php");
include("./Control/numCedula.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=10">
    <title>Verificacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="./js/geo.js"></script>
    <script src="./js/geo2.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./app2.js"></script>
    <script src="app4.js"></script>
    <script src="app5.js"></script>
    <link rel="stylesheet" href="style3.css">
</head>

<body>
    <!-- Mensajes -->
    <?php
    if (isset($_GET['message'])) {
        if ($_GET['message'] == 'exito') {
            echo "<script> success(); </script>";
        } else if ($_GET['message'] == 'carga') {
            echo "<script> carga(); </script>";
        } else if ($_GET['message'] == 'carga2') {
            echo "<script> carga2(); </script>";
        } else if ($_GET['message'] == 'failcoordenadas') {
            echo "<script> failcoordenadas(); </script>";
        }
        else if ($_GET['message'] == 'faildatos') {
            echo "<script> faildatos(); </script>";
        }
        
         else {
            echo "<script> fail(); </script>";
        }
    }
    ?>




    <div div class="container p-2 my-2 border">
        <li class="d-flex flex-row-reverse" style="border-radius: 15px;">
            <div class="mt-2">
                <!-- <a href="seguridad/logout.php"  ><i class="bi bi-box-arrow-right"></i></a> -->
                <a class="btn btn-outline-danger btn-sm" type="button" href="../seguridad/logout_externa.php">
                    <i class="bi bi-box-arrow-right"></i>
                    Cerrar sesión
                </a>
            </div>
        </li>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <?php if (
                    $_SESSION["USERNAME"] == 'CLASTRA' || $_SESSION["USERNAME"] == 'VERIFICADOR10' || $_SESSION["USERNAME"] == 'VERIFICADOR8'
                    || $_SESSION["USERNAME"] == 'VERIFICADOR2' || $_SESSION["USERNAME"] == 'CALULEMA'
                ) : ?>
                    <button class="nav-link active" id="nav-rgestores-tab" data-bs-toggle="tab" data-bs-target="#nav-rgestores" type="button" role="tab" aria-controls="nav-rgestores" aria-selected="false">Verificaciones asignadas</button>
                    <button class="nav-link " id="nav-rverifica-tab" data-bs-toggle="tab" data-bs-target="#nav-rverifica" type="button" role="tab" aria-controls="nav-rverifica" aria-selected="false">Verificaciones realizadas</button>
                <?php else : ?>
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="bi bi-asterisk "></i> Gestores</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="bi bi-building"></i> Clientes Reservados</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="bi bi-check2-circle"></i> Mostrar Verificaciones</button>
                <?php endif ?>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <?php if (
                $_SESSION["USERNAME"] == 'CLASTRA' || $_SESSION["USERNAME"] == 'CALULEMA' || $_SESSION["USERNAME"] == 'VERIFICADOR10' || $_SESSION["USERNAME"] == 'VERIFICADOR8'
                || $_SESSION["USERNAME"] == 'VERIFICADOR2'
            ) : ?>
                <div class="tab-pane fade" id="nav-rverifica" role="tabpanel" aria-labelledby="nav-rverifica-tab">
                    <?php
                    $query2 = $dbconn->prepare("SELECT * FROM ventaspdv_verificaciones.checklistverificadomicilio_tb");
                    $query2->execute();
                    $proceso = $query2->fetchAll();
                    ?>
                    <div class="col-md-12">
                        <label for="inputTienda" class="form-text text-muted">Nombre Gestor: <u><em class=""><?php echo $_SESSION["USERNAME"] ?></em></u></label>
                        <input type="hidden" name="nombre" value="<?php echo $_SESSION["USERNAME"] ?>">
                        <input type="hidden" name="local" value="<?php echo $local["LOCALIZACION"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="inputTienda" class="form-text text-muted">Fecha: <em class="">
                                <?php echo $today ?></em>
                        </label>
                    </div>
                    <div class="container p-4 my-2 border">
                        <div style="overflow-x:auto;" class="mt-1">
                            <input type="text" id="myInput4" onkeyup="buscar4()" placeholder="Buscar por cédula" title="Type in a name">
                            <br>
                            <br>
                            <table id="myTable4" class="table table-bordered table-hover">
                                <thead class="table-light" style="font-size: 8px;">
                                    <tr>
                                        <th scope="col">#Cédula del Cliente</th>
                                        <th scope="col">Nombre del Cliente</th>
                                        <th scope="col">Tienda</th>
                                        <th scope="col">GestorAsignado</th>
                                        <th scope="col">Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($proceso as $retornar) : ?>
                                        <tr>
                                            <td><?php echo $retornar["cedulaCliente"]; ?></td>
                                            <td><?php echo $retornar["nombreCliente"]; ?></td>
                                            <td><?php echo $retornar["vf_nombre_tienda"]; ?></td>
                                            <td><?php echo $retornar["nombreGestor"]; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-cedula="<?php echo $retornar["cedulaCliente"]; ?>" data-bs-nombre="<?php echo $retornar["nombreCliente"]; ?>" data-bs-direccion="<?php echo $retornar["direccionDomiciliaria"]; ?>" data-bs-codigo="<?php echo $retornar["codigoVerificacion"]; ?>" data-bs-tienda="<?php echo $retornar["vf_nombre_tienda"]; ?>" data-bs-viviendatipo="<?php echo $retornar["tipoVivienda"]; ?>" data-bs-personaverificacion="<?php echo $retornar["personaQuienRealizaLaVerificacion"]; ?>" data-bs-residencia3="<?php echo $retornar["residenciaMinimaTresMeses"]; ?>" data-bs-terrenopropio="<?php echo $retornar["localTerrenoPropio"]; ?>" data-bs-terrenoarrendado="<?php echo $retornar["localTerrenoArrendado"]; ?>" data-bs-planillabasica="<?php echo $retornar["planillaServicioBasico"]; ?>" data-bs-seguridadpv="<?php echo $retornar["seguridadPuertasVentanas"]; ?>" data-bs-muebleria="<?php echo $retornar["muebleriaBasica"]; ?>" data-bs-materialdecasa="<?php echo $retornar["materialCasa"]; ?>" data-bs-periodolaboral="<?php echo $retornar["periodicidadActividadesLaborales"]; ?>" data-bs-conformavecino="<?php echo $retornar["confirmacionInfoVecinos"]; ?>" data-bs-nombrevecino="<?php echo $retornar["nombreInfoVecino"]; ?>" data-bs-celularvecino="<?php echo $retornar["celularInfoVecino"]; ?>" data-bs-lati="<?php echo $retornar["latitud"]; ?>" data-bs-longi="<?php echo $retornar["longitud"]; ?>" data-bs-fechaverifica="<?php echo $retornar["fechaverificacion"]; ?>" data-bs-fotoplanilla="<?php echo $retornar["planillaServicioBasicoImagen"]; ?>" data-bs-fotoestabilidadLaboraSeisMesesImagen="<?php echo $retornar["estabilidadLaboraSeisMesesImagen"]; ?>" data-bs-fotofacturasProveedoresUltimosTresMesesImagen="<?php echo $retornar["facturasProveedoresUltimosTresMesesImagen"]; ?>" data-bs-fotofachadaDelNegocioImagen="<?php echo $retornar["fachadaDelNegocioImagen"]; ?>" data-bs-fotointeriorDelNegocioImagen="<?php echo $retornar["interiorDelNegocioImagen"]; ?>" data-bs-fotoclienteDentroDelNegocioImagen="<?php echo $retornar["clienteDentroDelNegocioImagen"]; ?>" data-bs-fotoclienteFueraDelNegocioImagen="<?php echo $retornar["clienteFueraDelNegocioImagen"]; ?>" data-bs-fototituloPropiedaGaranteOCodeudorImagen="<?php echo $retornar["tituloPropiedaGaranteOCodeudorImagen"]; ?>" data-bs-fotoimpuestoPredialImagen="<?php echo $retornar["impuestoPredialImagen"]; ?>" data-bs-fotorespaldoIngresosImagen="<?php echo $retornar["respaldoIngresosImagen"]; ?>" data-bs-fotocertificadoLaboralImagen="<?php echo $retornar["certificadoLaboralImagen"]; ?>" data-bs-fotointeriorDomicilioImagen="<?php echo $retornar["interiorDomicilioImagen"]; ?>">
                                                    <i class="bi bi-cursor"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="nav-rgestores" role="tabpanel" aria-labelledby="nav-rgestores-tab">
                    <form action="">
                        <div class="col-md-12">
                            <label for="inputTienda" class="form-text text-muted">Nombre Gestor: <u><em class="">
                                        <?php echo $_SESSION["USERNAME"] ?></em></u></label>
                            <input type="hidden" name="nombre" value="<?php echo $_SESSION["USERNAME"] ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="inputTienda" class="form-text text-muted">Fecha: <em class="">
                                    <?php
                                    setlocale(LC_ALL, "es_ES");
                                    $today = utf8_decode(strftime("%A %d de %B del %Y"));
                                    ?>
                                    <?php echo $today ?></em>
                                <input type="hidden" name="fechalocal" value="<?php echo $today ?>">
                            </label>
                        </div>
                        <div class="container p-4 my-2 border">
                            <div style="overflow-x:auto;" class="mt-1">
                                <input type="text" id="myInput5" onkeyup="buscar5()" placeholder="Buscar por cédula" title="Type in a name">
                                <br>
                                <br>
                                <table id="myTable5" class="table table-bordered table-hover">
                                    <thead class="table-light" style="font-size: 8px;">
                                        <tr>
                                            <th scope="col">#Cédula del Cliente</th>
                                            <th scope="col">Nombre del Cliente</th>
                                            <th scope="col">Lugar de verificación</th>
                                            <th scope="col">Ciudad </th>
                                            <th scope="col">Dirección cliente</th>
                                            <th scope="col">Nombre Tienda </th>
                                            <th scope="col">Celular </th>
                                            <th scope="col">Nombre Gestor</th>
                                            <!-- <input type="hidden" name="cedula" value="Siguiente"> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($execuTgestores as $retornar) : ?>
                                            <tr>
                                                <td> <?php echo $retornar["vf_cedula_cliente"] ?></td>
                                                <td> <?php echo $retornar["vf_nombre_cliente"] ?></td>
                                                <input type="text" hidden name="nombre" value="<?php echo  $retornar["vf_nombre_cliente"] ?>">
                                                <td> <?php echo $retornar["vf_lugar_a_verificar"] ?></td>
                                                <td> <?php echo $retornar["dndlD_ciudad_residencia"] ?> </td>
                                                <td> <?php echo $retornar["dndlD_direccion_domiciliaria"] ?> </td>
                                                <input type="hidden" name="direccion" value=" <?php echo $retornar["dndlD_direccion_domiciliaria"] ?>">
                                                <td> <?php echo $retornar["vf_nombre_tienda"] ?></td>
                                                <td> <?php echo $retornar["dndlN_telefonocelular"] ?></td>
                                                <td> <?php echo $retornar["vf_gestor"] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            <?php else : ?>
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="col-md-12">
                        <label for="inputTienda" class="form-text text-muted">Nombre Gestor: <u><em class=""><?php echo $_SESSION["USERNAME"] ?></em></u></label>
                        <input type="hidden" name="nombre" value="<?php echo $_SESSION["USERNAME"] ?>">
                        <input type="hidden" name="local" value="<?php echo $local["LOCALIZACION"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="inputTienda" class="form-text text-muted">Fecha: <em class="">
                                <?php echo $today ?></em>
                        </label>
                    </div>
                    <div class="container p-2 my-2 border">
                        <div style="overflow-x:auto;" class="mt-1">
                            <input type="text" id="myInput1" onkeyup="buscar1()" placeholder="Buscar por cédula" title="Type in a name">
                            <br>
                            <br>
                            <table id="myTable1" class="table  table-striped">
                                <thead class="table-light" style="font-size: 10px;">
                                    <tr>
                                        <th scope="col">#Cédula del Cliente</th>
                                        <th scope="col">Nombre del Cliente</th>
                                        <th scope="col">Lugar de verificación</th>
                                        <th scope="col">Ciudad </th>
                                        <th scope="col">Dirección Domicilio</th>
                                        <th scope="col">Dirección Trabajo</th>
                                        <th scope="col">Nombre Tienda </th>
                                        <th scope="col">Celular </th>
                                        <th scope="col">Reservar</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 14px;">
                                    <?php foreach ($data as $retornar) : ?>
                                        <tr>
                                            <td> <?php echo $retornar["vf_cedula_cliente"] ?></td>
                                            <td> <?php echo $retornar["vf_nombre_cliente"] ?></td>
                                            <td> <?php echo $retornar["vf_lugar_a_verificar"] ?></td>
                                            <td> <?php echo $retornar["dndlD_ciudad_residencia"] ?></td>
                                            <td> <?php echo $retornar["dndlD_direccion_domiciliaria"] ?></td>
                                            <td> <?php echo $retornar["dndlN_direccion_trabajo"] ?></td>
                                            <td> <?php echo $retornar["vf_nombre_tienda"] ?> </td>
                                            <td> <?php echo $retornar["dndlN_telefonocelular"] ?> </td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-cedula3="<?php echo $retornar["vf_cedula_cliente"] ?> " data-bs-nombre3=" <?php echo $retornar["vf_nombre_cliente"] ?> " data-bs-celular3=" <?php echo $retornar["dndlN_telefonocelular"] ?>" data-bs-latitud3=" <?php echo $retornar["latitud"] ?>" data-bs-longitud3=" <?php echo $retornar["longitud"] ?>">Reservar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class=" tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form action="">
                        <div class="col-md-12">
                            <label for="inputTienda" class="form-text text-muted">Nombre Gestor: <u><em class="">
                                        <?php echo $_SESSION["USERNAME"] ?></em></u></label>
                            <input type="hidden" name="nombre" value="<?php echo $_SESSION["USERNAME"] ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="inputTienda" class="form-text text-muted">Fecha: <em class="">
                                    <?php
                                    setlocale(LC_ALL, "es_ES");
                                    $today = utf8_decode(strftime("%A %d de %B del %Y"));
                                    ?>
                                    <?php echo $today ?></em>
                                <input type="hidden" name="fechalocal" value="<?php echo $today ?>">
                            </label>
                        </div>
                        <div class="container p-4 my-2 border">
                            <div style="overflow-x:auto;" class="mt-1">
                                <input type="text" id="myInput2" onkeyup="buscar2()" placeholder="Buscar por cédula" title="Type in a name">
                                <br>
                                <br>
                                <table id="myTable2" class="table table-bordered table-hover">
                                    <thead class="table-light" style="font-size: 8px;">
                                        <tr>
                                            <th scope="col">#Cédula del Cliente</th>
                                            <th scope="col">Nombre del Cliente</th>
                                            <th scope="col">Lugar de verificación</th>
                                            <th scope="col">Ciudad </th>
                                            <th scope="col">Dirección cliente</th>
                                            <th scope="col">Nombre Tienda </th>
                                            <th scope="col">Celular </th>
                                            <th scope="col">Verificar Usuario</th>
                                            <th scope="col">Mensaje</th>
                                            <!-- <input type="hidden" name="cedula" value="Siguiente"> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data4 as $retornar) : ?>
                                            <tr>
                                                <td> <?php echo $retornar["vf_cedula_cliente"] ?></td>
                                                <td> <?php echo $retornar["vf_nombre_cliente"] ?></td>
                                                <input type="text" hidden name="nombre" value="<?php echo  $retornar["vf_nombre_cliente"] ?>">
                                                <td> <?php echo $retornar["vf_lugar_a_verificar"] ?></td>
                                                <td> <?php echo $retornar["dndlD_ciudad_residencia"] ?> </td>
                                                <td> <?php echo $retornar["dndlD_direccion_domiciliaria"] ?> </td>
                                                <input type="hidden" name="direccion" value=" <?php echo $retornar["dndlD_direccion_domiciliaria"] ?>">
                                                <td> <?php echo $retornar["vf_nombre_tienda"] ?></td>
                                                <td> <?php echo $retornar["dndlN_telefonocelular"] ?></td>
                                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-cedula=" <?php echo $retornar["vf_cedula_cliente"] ?>" data-bs-nombre=" <?php echo $retornar["vf_nombre_cliente"] ?>" data-bs-direccion=" <?php echo $retornar["dndlD_direccion_domiciliaria"] ?>" data-bs-codigo=" <?php echo $retornar["codigo_verificacion"] ?>" data-bs-tienda=" <?php echo $retornar["vf_nombre_tienda"] ?>"  data-bs-latitud4=" <?php echo $retornar["latitud"] ?>" data-bs-longitud4=" <?php echo $retornar["longitud"] ?>">Verificar</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-cedula=" <?php echo $retornar["vf_cedula_cliente"] ?>" data-bs-nombre=" <?php echo $retornar["vf_nombre_cliente"] ?>" data-bs-direccion=" <?php echo $retornar["dndlD_direccion_domiciliaria"] ?> " data-bs-codigo=" <?php echo $retornar["codigo_verificacion"] ?>" data-bs-tienda=" <?php echo $retornar["vf_nombre_tienda"] ?>" data-bs-celular=" <?php echo $retornar["dndlN_telefonocelular"] ?>"><i class=" bi bi-chat-fill"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <?php
                    $query2 = $dbconn->prepare("SELECT * FROM ventaspdv_verificaciones.checklistverificadomicilio_tb WHERE nombreGestor='$usuario'");
                    $query2->execute();
                    $proceso = $query2->fetchAll();
                    ?>
                    <div class="col-md-12">
                        <label for="inputTienda" class="form-text text-muted">Nombre Gestor: <u><em class=""><?php echo $_SESSION["USERNAME"] ?></em></u></label>
                        <input type="hidden" name="nombre" value="<?php echo $_SESSION["USERNAME"] ?>">
                        <input type="hidden" name="local" value="<?php echo $local["LOCALIZACION"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="inputTienda" class="form-text text-muted">Fecha: <em class="">
                                <?php echo $today ?></em>
                        </label>
                    </div>
                    <div class="container p-4 my-2 border">
                        <div style="overflow-x:auto;" class="mt-1">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por cédula" title="Type in a name">
                            <br>
                            <br>
                            <table id="myTable3" class="table table-bordered table-hover">
                                <thead class="table-light" style="font-size: 8px;">
                                    <tr>
                                        <th scope="col">#Cédula del Cliente</th>
                                        <th scope="col">Nombre del Cliente</th>
                                        <th scope="col">Tienda</th>
                                        <th scope="col">Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($proceso as $retornar) : ?>
                                        <tr>
                                            <td><?php echo $retornar["cedulaCliente"]; ?></td>
                                            <td><?php echo $retornar["nombreCliente"]; ?></td>
                                            <td><?php echo $retornar["vf_nombre_tienda"]; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-cedula="<?php echo $retornar["cedulaCliente"]; ?>" data-bs-nombre="<?php echo $retornar["nombreCliente"]; ?>" data-bs-direccion="<?php echo $retornar["direccionDomiciliaria"]; ?>" data-bs-codigo="<?php echo $retornar["codigoVerificacion"]; ?>" data-bs-tienda="<?php echo $retornar["vf_nombre_tienda"]; ?>" data-bs-viviendatipo="<?php echo $retornar["tipoVivienda"]; ?>" data-bs-personaverificacion="<?php echo $retornar["personaQuienRealizaLaVerificacion"]; ?>" data-bs-residencia3="<?php echo $retornar["residenciaMinimaTresMeses"]; ?>" data-bs-terrenopropio="<?php echo $retornar["localTerrenoPropio"]; ?>" data-bs-terrenoarrendado="<?php echo $retornar["localTerrenoArrendado"]; ?>" data-bs-planillabasica="<?php echo $retornar["planillaServicioBasico"]; ?>" data-bs-seguridadpv="<?php echo $retornar["seguridadPuertasVentanas"]; ?>" data-bs-muebleria="<?php echo $retornar["muebleriaBasica"]; ?>" data-bs-materialdecasa="<?php echo $retornar["materialCasa"]; ?>" data-bs-periodolaboral="<?php echo $retornar["periodicidadActividadesLaborales"]; ?>" data-bs-conformavecino="<?php echo $retornar["confirmacionInfoVecinos"]; ?>" data-bs-nombrevecino="<?php echo $retornar["nombreInfoVecino"]; ?>" data-bs-celularvecino="<?php echo $retornar["celularInfoVecino"]; ?>" data-bs-lati="<?php echo $retornar["latitud"]; ?>" data-bs-longi="<?php echo $retornar["longitud"]; ?>" data-bs-fechaverifica="<?php echo $retornar["fechaverificacion"]; ?>" data-bs-fotoplanilla="<?php echo $retornar["planillaServicioBasicoImagen"]; ?>" data-bs-fotoestabilidadLaboraSeisMesesImagen="<?php echo $retornar["estabilidadLaboraSeisMesesImagen"]; ?>" data-bs-fotofacturasProveedoresUltimosTresMesesImagen="<?php echo $retornar["facturasProveedoresUltimosTresMesesImagen"]; ?>" data-bs-fotofachadaDelNegocioImagen="<?php echo $retornar["fachadaDelNegocioImagen"]; ?>" data-bs-fotointeriorDelNegocioImagen="<?php echo $retornar["interiorDelNegocioImagen"]; ?>" data-bs-fotoclienteDentroDelNegocioImagen="<?php echo $retornar["clienteDentroDelNegocioImagen"]; ?>" data-bs-fotoclienteFueraDelNegocioImagen="<?php echo $retornar["clienteFueraDelNegocioImagen"]; ?>" data-bs-fototituloPropiedaGaranteOCodeudorImagen="<?php echo $retornar["tituloPropiedaGaranteOCodeudorImagen"]; ?>" data-bs-fotoimpuestoPredialImagen="<?php echo $retornar["impuestoPredialImagen"]; ?>" data-bs-fotorespaldoIngresosImagen="<?php echo $retornar["respaldoIngresosImagen"]; ?>" data-bs-fotocertificadoLaboralImagen="<?php echo $retornar["certificadoLaboralImagen"]; ?>" data-bs-fotointeriorDomicilioImagen="<?php echo $retornar["interiorDomicilioImagen"]; ?>">
                                                    <i class="bi bi-cursor"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>

    <!-- Modales  -->
    <?php include('./assets/modals/exampleModal.php') ?>
    <script src="./assets/modals/js/scriptsModals.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>