<!DOCTYPE html>
<html lang="en">
<?php
include("./Control/VerificacionFisica.php");
include("./Control/numCedula.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestores Verificación</title>

    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <script src="./js/geo.js"></script>
    <script src="./js/geo2.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./app2.js"></script>
    <script src="app4.js"></script>
    <script src="app5.js"></script>
    <link rel="stylesheet" href="style3.css">
</head>

<body>
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

    <div div class="container p-5 my-5 border">
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
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Gestores</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Clientes Reservados</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Mostrar Verificaciones</button>
                <button class="nav-link" id="nav-casacobranza" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Revisar Verificaciones</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
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
                <div class="container p-4 my-2 border">

                    <div style="overflow-x:auto;" class="mt-1">
                        <input type="text" id="myInput1" onkeyup="buscar1()" placeholder="Buscar por cédula" title="Type in a name">
                        <br>
                        <br>

                        <table id="myTable1" class="table table-bordered table-hover">
                            <thead class="table-light" style="font-size: 8px;">
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
                            <tbody>
                            <?php
                            foreach ($data as $retornar) :
                                echo '
                      
                      <tr>
                      <td>' . $retornar["vf_cedula_cliente"] . '</td>
                      <td>' . $retornar["vf_nombre_cliente"] . '</td>
                      <td>' . $retornar["vf_lugar_a_verificar"] . '</td>
                      <td>' . $retornar["dndlD_ciudad_residencia"] . '</td>
                      <td>' . $retornar["dndlD_direccion_domiciliaria"] . '</td>
                      <td>' . $retornar["dndlN_direccion_trabajo"] . '</td>
                      <td>' . $retornar["vf_nombre_tienda"] . '</td>
                      <td>' . $retornar["dndlN_telefonocelular"] . '</td>
                      <td><button type="button" class="btn btn-primary" 
                                     data-bs-toggle="modal" data-bs-target="#exampleModal"
                                     data-bs-cedula3="' . $retornar["vf_cedula_cliente"] . '"
                                     data-bs-nombre3="' . $retornar["vf_nombre_cliente"] . '"
                                     data-bs-celular3="' . $retornar["dndlN_telefonocelular"] . '"
                                     data-bs-latitud3="' . $retornar["latitud"] . '"
                                     data-bs-longitud3="' . $retornar["longitud"] . '"
                                     >Verificar</button>
                                     </td>
                      </tr>';
                            endforeach;
                            ?>
                            </tbody>
                        </table>



                        <div class="modal" tabindex="-1" id="exampleModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Reservacion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="./Control/ReservacionGestor.php">
                                            <div class="form-group mt-1">
                                                <label id="variable" for="exampleInputEmail1">Cedula:</label>
                                                <!-- <input type="text" name="cedula" id="cedulaInsert33" value="" hidden> -->
                                                <input type="text" disabled value="" id="cedulaInsert3" />
                                                <input type="hidden" value="" name="cedulaInsert3" id="cedulaInsert4" />
                                            </div>
                                            <div class="form-group mt-2">
                                                <label id="nombre" for="exampleInputPassword1">Nombre: </label>
                                                <!-- <input type="text" name="nombre" id="nombreInsert3" value="" > -->
                                                <input type="text" disabled value="" id="nombreInsert3"/>
                                                <input type="hidden" value="" name="nombreInsert4" id="nombreInsert4" />
                                                <!-- <input type="hidden" name="nombreInsert3" id="nombreInsert4" /> -->
                                            </div>
                                            <div class="form-group mt-2">
                                                <label id="celular2" for="exampleInputPassword1">Celular: </label>
                                                <!-- <input type="text" name="nombre" id="celularInsert3" value="" > -->
                                                <input type="text" disabled value=""  id="celularInsert3" />
                                                <input type="hidden" name="celularInsert4" id="celularInsert4" />
                                                <!-- <input type="hidden" name="nombreInsert3" id="celularInsert4" /> -->
                                            </div>
                                            <div class="form-group mt-2">
                                                <label id="latitud2" for="exampleInputPassword1">Latitud: </label>
                                                <!-- <input type="text" name="nombre" id="latitudInsert3" value="" > -->
                                                <input type="text" disabled value=""  id="latitudInsert3" />
                                                <input type="hidden" name="latitudInsert4" id="latitudInsert4" />
                                                <!-- <input type="hidden" name="nombreInsert3" id="latitudInsert4" /> -->
                                                
                                            </div>
                                            <div class="form-group mt-2">
                                                <label id="longitud2" for="exampleInputPassword1">Longitud: </label>
                                                <!-- <input type="text" name="nombre" id="longitudInsert3" value="" > -->
                                                <input type="text" disabled value=""  id="longitudInsert3" />
                                                <input type="hidden" name="longitudInsert4" id="longitudInsert4" />
                                                <!-- <input type="hidden" name="nombreInsert3" id="longitudInsert4" /> -->
                                            </div>
                                            <div class="form-group mt-2" id="linkmapa">
                                                <!-- <label id="Ubicación" for="exampleInputLatitud">Mapa: </label> -->
                                                <!-- <a href="" type="buttom" target="_blank" id="linkmapa">Mapa</a> -->
                                            </div>
                                            <!-- <div class="form-group mt-2">
                                                <label id="celular" for="exampleInputPassword1">Celular: </label>
                                                <input type="text" name="celular" id="celularInsert" hidden>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input placeholder="Ingresa tu numero de celular" name="numClient" type="text" class="form-control" id="exampleCheck1" required maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                            </div> -->
                                            <!-- Obtener coordenadas -->
                                            <div class="row">


                                                <div class="col">
                                                    <label for="inputTienda" class="eform-text text-muted">Latitud: <strong id="latitud1" name="lati" value=""> </strong></label>
                                                    <input type="hidden" id="lat1" name="lat1" value="" required>
                                                </div>
                                                <div class="col">
                                                    <label for="inputTienda" class="form-text text-muted">Longitud: <strong id="longitud1" name="long" value=""></strong></label>
                                                    <input type="hidden" id="long1" name="long1" value="" required>
                                                </div>

                                                <i class="bi bi-geo-alt-fill mt-2" style="font-size: 15px; color:#3498DB;" type="button" onclick="getLocationLocation()">Obtener Cordenadas</i>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-2">Reservar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function editar(este) {
                                var ModalEdit = new bootstrap.Modal(EditModal, {}).show();
                                // var variable=document.getElementById("variable");
                                
                                console.log(este);
                                variable.innerHTML = "Cedula : " + este.id;
                                nombre.innerHTML = "Nombre : " + este.value;
                                celular2.innerHTML = "Celular : " + este.name;
                                latitud.innerHTML = "Latitud : " + este.latitud;
                                longitud.innerHTML = "Longitud : " + este.longitud;


                                // cedulaInsert.value = este.id;
                                // nombreInsert.value = este.value;
                                // celularInsert.value = este.name;
                                // latitud.value = este.latitud;
                                // longitud.value = este.longitud;
                            }

                            function buscar1() {
                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementById("myInput1");
                                filter = input.value.toUpperCase();
                                table = document.getElementById("myTable1");
                                tr = table.getElementsByTagName("tr");
                                for (i = 0; i < tr.length; i++) {
                                    td = tr[i].getElementsByTagName("td")[0];
                                    if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <form action="http://200.7.249.21:90/VerificacionesFisicas/PruebaVerificacion/formularioencuesta1.php" method="POST">
                    <div class="col-md-12">
                        <label for="inputTienda" class="form-text text-muted">Nombre Gestor: <u><em class="">
                                    <?php echo $_SESSION["USERNAME"] ?></em></u></label>
                        <input type="hidden" name="nombre" value="<?php echo $_SESSION["USERNAME"] ?>">
                        <!-- <input type="hidden" name="local" value="<?php echo $local["LOCALIZACION"] ?>"> -->
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
                                    <?php
                                    foreach ($data4 as $retornar) :
                                        echo '
                                    <tr>
                                    <td>' . $retornar["vf_cedula_cliente"] . '</td>
                                    <td>' . $retornar["vf_nombre_cliente"] . '</td>
                                    <input type="text" hidden name="nombre" value="' . $retornar["vf_nombre_cliente"] . '">
                                    <td>' . $retornar["vf_lugar_a_verificar"] . '</td>
                                    <td>' . $retornar["dndlD_ciudad_residencia"] . '</td>
                                    <td>' . $retornar["dndlD_direccion_domiciliaria"] . '</td>
                                    <input type="hidden" name="direccion" value="' . $retornar["dndlD_direccion_domiciliaria"] . '">
                                    <td>' . $retornar["vf_nombre_tienda"] . '</td>
                                    <td>' . $retornar["dndlN_telefonocelular"] . '</td>
                                    <td><button type="button" class="btn btn-primary" 
                                     data-bs-toggle="modal" data-bs-target="#exampleModal1"
                                     data-bs-cedula="' . $retornar["vf_cedula_cliente"] . '"
                                     data-bs-nombre="' . $retornar["vf_nombre_cliente"] . '"
                                     data-bs-direccion="' . $retornar["dndlD_direccion_domiciliaria"] . '"
                                     data-bs-codigo="' . $retornar["vf_codigo_verificacion"] . '"
                                     data-bs-tienda="' . $retornar["vf_nombre_tienda"] . '"
                                     >Verificar</button>
                                     </td>
                                     <td><button type="button" class="btn btn-success" 
                                     data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                     data-bs-cedula="' . $retornar["vf_cedula_cliente"] . '"
                                     data-bs-nombre="' . $retornar["vf_nombre_cliente"] . '"
                                     data-bs-direccion="' . $retornar["dndlD_direccion_domiciliaria"] . '"
                                     data-bs-codigo="' . $retornar["vf_codigo_verificacion"] . '"
                                     data-bs-tienda="' . $retornar["vf_nombre_tienda"] . '"
                                     data-bs-celular="' . $retornar["dndlN_telefonocelular"] . '"
                                     ><i class="bi bi-chat-fill"></i></button>
                                     </td>
                                    </tr>';
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                </form>
            </div>
            
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal1Label">CKECKT LIST VERIFICACIONES DOMICILIO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form name="datos" id="datos" method="POST" enctype="multipart/form-data" action="http://200.7.249.21:90/VerificacionesFisicas/PruebaVerificacion/contact3.php">
                                <!-- <div class="title">CKECKT LIST VERIFICACIONES DOMICILIO</div> -->
                                <div class="user-details">
                                    <div class="col-md-12">
                                        <label for="inputTienda" class="form-text text-muted">Nombre Gestor: <u><em class=""><?php echo $_SESSION["USERNAME"] ?></em></u></label>
                                        <input type="hidden" name="nombre" value="<?php echo $_SESSION["USERNAME"] ?>">
                                        <input type="hidden" name="local" value="<?php echo $local["LOCALIZACION"] ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputTienda" class="form-text text-muted">Fecha: <em class="">
                                                <?php echo $today ?></em>
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Tienda: <em class="">
                                                <input type="text" disabled value="" id="nombreTienda2" />
                                                <input type="hidden" name="nombreTienda" id="nombreTienda10" />
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Nombre: <em class="">
                                                <input type="text" disabled value="" id="nombreCliente2" />
                                                <input type="hidden" name="nombreCliente" id="nombreCliente10" />
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Cedula: <em class="">
                                                <input type="text" disabled value="" id="cedulaclienteInsert2" />
                                                <input type="hidden" name="cedulaCliente" id="cedulaCliente10" />
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Direccion: <em class="">
                                                <input type="text" disabled value="" id="direccionCliente2" />
                                                <input type="hidden" name="direccionDomiciliaria" value="" id="direccionCliente10" />
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Codigo: <em class="">
                                                <input type="text" disabled value="" id="codigoCliente2" />
                                                <input type="hidden" name="codigoCliente" value="" id="codigoCliente10" />
                                        </label>
                                    </div>
                                    <div class="col-md-12 mt-2 mb-4">
                                        <label for="inputdescripcion" class="form-label"><strong>Tipo de Usuario <font color="red">*</font></strong></label>
                                        <select name="tipoUsuario" required id="tipoUsuario" onchange="onChangeSelect2()" class="form-select">
                                            <option selected value="Seleccionar">Seleccionar</option>
                                            <option value="Dependiente">Usuario Dependiente</option>
                                            <option value="Independiente">Usuario Independiente</option>
                                            <option value="Informal">Usuario Informal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-2 mb-4" id="formularioViviendaArrendada">
                                        
                                    </div>

                                    <div class="col-md-12 mt-2 mb-4" id="formularioViviendaArrendada2">
                                        
                                    </div>
                                    <div class="col-md-12 mt-2 mb-4" id="formularioViviendaArrendada3">
                                        
                                    </div>
                                </div>
                                <!-- geolocalizacion -->
                                <!-- <div hidden="hidden" class="mb-3">
                                <label for="formFileSm" class="form-label"><strong>Datos Adjuntos(FOTO)</strong></label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                                <input class="form-control form-control-sm" name="imagen2" type="file" accept="image/*" capture="camera" />
                                 </div> -->
                                <div class="row">
                                    <div class="col">
                                        <label for="inputTienda" class="eform-text text-muted">Latitud: <strong id="latitud" name="lati" value=""> </strong></label>
                                        <input type="hidden" id="lat" name="lat" value="">
                                    </div>
                                    <div class="col">
                                        <label for="inputTienda" class="form-text text-muted">Longitud: <strong id="longitud" name="long" value=""></strong></label>
                                        <input type="hidden" id="long" name="long" value="">
                                    </div>
                                    <i class="bi bi-geo-alt-fill mt-2" style="font-size: 15px; color:#3498DB;" type="button" onclick="getLocation()">Obtener Cordenadas</i>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal1Label">Envio Mensaje de Texto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form name="datos" id="datos" method="POST" enctype="multipart/form-data" action="http://200.7.249.21:90/ApiTextMessage/contact.php">
                                <!-- <div class="title">CKECKT LIST VERIFICACIONES DOMICILIO</div> -->
                                <div class="user-details">
                                    <div class="col-md-12">
                                        <label for="inputTienda" class="form-text text-muted">Nombre Gestor: <u><em class=""><?php echo $_SESSION["USERNAME"] ?></em></u></label>
                                        <input type="hidden" name="nombre" value="<?php echo $_SESSION["USERNAME"] ?>">
                                        <input type="hidden" name="local" value="<?php echo $local["LOCALIZACION"] ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputTienda" class="form-text text-muted">Fecha: <em class="">
                                                <?php echo $today ?></em>
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Tienda: <em class="">
                                                <input type="text" disabled value="" id="nombreTienda" />
                                                <input type="hidden" name="nombreTienda" id="nombreTienda1" />
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Nombre: <em class="">
                                                <input type="text" disabled value="" id="nombreCliente" />
                                                <input type="hidden" name="nombreCliente" id="nombreCliente1" />
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Cedula: <em class="">
                                                <input type="text" disabled value="" id="cedulaclienteInsert" />
                                                <input type="hidden" name="cedulaCliente" id="cedulaCliente1" />
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Direccion: <em class="">
                                                <input type="text" disabled value="" id="direccionCliente" />
                                                <input type="hidden" name="direccionDomiciliaria" value="" id="direccionCliente1" />
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Codigo: <em class="">
                                                <input type="text" disabled value="" id="codigoCliente" />
                                                <input type="hidden" name="codigoCliente" value="" id="codigoCliente1" />
                                        </label>
                                        <label for="inputTienda" class="form-text text-muted">Celular: <em class="">
                                                <input type="text" disabled value="" id="celular" />
                                                <input type="hidden" name="celular" id="celular1" />
                                        </label>
                                    </div>
                                    <!-- <div class="col-md-12 mt-2 mb-4">
                                        <label for="inputdescripcion" class="form-label"><strong>Tipo de Vivienda <font color="red">*</font></strong></label>
                                        <select name="tipovivienda" required id="tipovivienda" class="form-select">
                                            <option selected value="Seleccionar">Seleccionar</option>
                                            <option value="Propia">Propia</option>
                                            <option value="Familiar">Familiar</option>
                                            <option value="Arrendada">Arrendada</option>
                                        </select>
                                    </div> -->


                                </div>
                                <!-- geolocalizacion -->
                                <!-- <div hidden="hidden" class="mb-3">
                                <label for="formFileSm" class="form-label"><strong>Datos Adjuntos(FOTO)</strong></label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                                <input class="form-control form-control-sm" name="imagen2" type="file" accept="image/*" capture="camera" />
                                 </div> -->
                                <!-- <div class="row">
                                    <div class="col">
                                        <label for="inputTienda" class="eform-text text-muted">Latitud: <strong id="latitud" name="lati" value=""> </strong></label>
                                        <input type="hidden" id="lat" name="lat" value="">
                                    </div>
                                    <div class="col">
                                        <label for="inputTienda" class="form-text text-muted">Longitud: <strong id="longitud" name="long" value=""></strong></label>
                                        <input type="hidden" id="long" name="long" value="">
                                    </div>
                                    <i class="bi bi-geo-alt-fill mt-2" style="font-size: 15px; color:#3498DB;" type="button" onclick="getLocation()">Obtener Cordenadas</i>
                                </div> -->

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-success">Enviar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                var exampleModal = document.getElementById('exampleModal')
                exampleModal.addEventListener('show.bs.modal', function(event) {
                    console.log(exampleModal);
                    
                    // Button that triggered the modal
                    var button = event.relatedTarget
                    // Extract info from data-bs-* attributes
                    var cedula3 = button.getAttribute('data-bs-cedula3')
                    console.log(cedula3);
                    // console.log(cedula);  
                    var nombre3 = button.getAttribute('data-bs-nombre3')
                    // console.log(nombre); 
                    console.log(nombre3);
                    var celular3 = button.getAttribute('data-bs-celular3')
                    // console.log(direccion);
                    console.log(celular3);
                    var latitud3 = button.getAttribute('data-bs-latitud3')
                    // console.log(codigo);
                    console.log(latitud3);
                    var longitud3 = button.getAttribute('data-bs-longitud3')
                    console.log(latitud3);
                    // console.log(tienda);
                    // If necessary, you could initiate an AJAX request here
                    // and then do the updating in a callback.
                    //
                    // Update the modal's content.
                    // var modalTitle = exampleModal3.querySelector('.modal-title')0
                    var cedulaInsert = exampleModal.querySelector('#cedulaInsert3');
                    var nombreInsert = exampleModal.querySelector('#nombreInsert3');
                    var celularInsert = exampleModal.querySelector('#celularInsert3');
                    var latitudInsert = exampleModal.querySelector('#latitudInsert3');
                    var longitudInsert = exampleModal.querySelector('#longitudInsert3');


                    var cedulaInsert1 = exampleModal.querySelector('#cedulaInsert4');
                    var nombreInsert1 = exampleModal.querySelector('#nombreInsert4');
                    var celularInsert1 = exampleModal.querySelector('#celularInsert4');
                    var latitudInsert1 = exampleModal.querySelector('#latitudInsert4');
                    var longitudInsert1 = exampleModal.querySelector('#longitudInsert4');




                    var mapa=exampleModal.querySelector('#linkmapa')
                    
                    mapa.innerHTML=`<a href=https://maps.google.com/?q=${latitud3},${longitud3} target="_blank">Consulta Ubicación</a>`;
                    // console.log(mapa);

                    // var nombreInsert1 = exampleModal.querySelector('#nombreCliente1');
                    // var cedulaInsert1 = exampleModal.querySelector('#cedulaCliente1');
                    // var direccionInsert1 = exampleModal.querySelector('#direccionCliente1');
                    // var codigoInsert1 = exampleModal.querySelector('#codigoCliente1');
                    // var tiendaInsert1 = exampleModal.querySelector('#nombreTienda1');
                    // var tiendaInsert1 = exampleModal3.querySelector('#codigoTienda1');
                    // var tiendaInsert2 = exampleModal3.querySelector('#codigoTienda2');

                    //         console.log(nombreInsert,'1',
                    // cedulaInsert,'1',
                    // direccionInsert,'1',
                    // codigoInsert,'1',
                    // tiendaInsert,'1',
                    // tiendaInsert);
                    cedulaInsert.value = cedula3;
                    nombreInsert.value = nombre3;
                    celularInsert.value = celular3;
                    latitudInsert.value = latitud3;
                    longitudInsert.value = longitud3;
                    ////
                    cedulaInsert1.value = cedula3;
                    nombreInsert1.value = nombre3;
                    celularInsert1.value = celular3;
                    latitudInsert1.value = latitud3;
                    longitudInsert1.value = longitud3;
                })





                    var exampleModal1 = document.getElementById('exampleModal1')
                    exampleModal1.addEventListener('show.bs.modal', function(event) {
                    console.log(exampleModal1);
                    // Button that triggered the modal
                    var button = event.relatedTarget
                    // Extract info from data-bs-* attributes
                    var cedula10 = button.getAttribute('data-bs-cedula')
                    console.log(cedula10);  
                    var nombre10 = button.getAttribute('data-bs-nombre')
                    console.log(nombre10); 
                    var direccion10 = button.getAttribute('data-bs-direccion')
                    console.log(direccion10);
                    var codigo10 = button.getAttribute('data-bs-codigo')
                    console.log(codigo10);
                    var tienda10 = button.getAttribute('data-bs-tienda')
                    console.log(tienda10);
                    // If necessary, you could initiate an AJAX request here
                    // and then do the updating in a callback.
                    //
                    // Update the modal's content.
                    // var modalTitle = exampleModal13.querySelector('.modal-title')0
                    var nombreInsert = exampleModal1.querySelector('#nombreCliente2');
                    var cedulaInsert = exampleModal1.querySelector('#cedulaclienteInsert2');
                    var direccionInsert = exampleModal1.querySelector('#direccionCliente2');
                    var codigoInsert = exampleModal1.querySelector('#codigoCliente2');
                    var tiendaInsert = exampleModal1.querySelector('#nombreTienda2');

                    var nombreInsert1 = exampleModal1.querySelector('#nombreCliente10');
                    var cedulaInsert1 = exampleModal1.querySelector('#cedulaCliente10');
                    var direccionInsert1 = exampleModal1.querySelector('#direccionCliente10');
                    var codigoInsert1 = exampleModal1.querySelector('#codigoCliente10');
                    var tiendaInsert1 = exampleModal1.querySelector('#nombreTienda10');
                    // var tiendaInsert1 = exampleModal3.querySelector('#codigoTienda1');
                    // var tiendaInsert2 = exampleModal3.querySelector('#codigoTienda2');

                    //         console.log(nombreInsert,'1',
                    // cedulaInsert,'1',
                    // direccionInsert,'1',
                    // codigoInsert,'1',
                    // tiendaInsert,'1',
                    // tiendaInsert);
                    nombreInsert.value = nombre10
                    cedulaInsert.value = cedula10
                    direccionInsert.value = direccion10
                    codigoInsert.value = codigo10
                    tiendaInsert.value = tienda10
                    ////
                    nombreInsert1.value = nombre10
                    cedulaInsert1.value = cedula10
                    direccionInsert1.value = direccion10
                    codigoInsert1.value = codigo10
                    tiendaInsert1.value = tienda10
                    // tiendaInsert2.value = tienda 
                })

                var exampleModal2 = document.getElementById('exampleModal2')
                // console.log(exampleModal2);
                exampleModal2.addEventListener('show.bs.modal', function(event) {
                    // Button that triggered the modal
                    var button = event.relatedTarget
                    // Extract info from data-bs-* attributes
                    var cedula = button.getAttribute('data-bs-cedula')
                    console.log(cedula);
                    // console.log(cedula);  
                    var nombre = button.getAttribute('data-bs-nombre')
                    // console.log(nombre);
                    var direccion = button.getAttribute('data-bs-direccion')
                    // console.log(direccion);
                    var codigo = button.getAttribute('data-bs-codigo')
                    // console.log(codigo);
                    var tienda = button.getAttribute('data-bs-tienda')

                    var celular = button.getAttribute('data-bs-celular')
                    // console.log(tienda);
                    // If necessary, you could initiate an AJAX request here
                    // and then do the updating in a callback.
                    //
                    // Update the modal's content.
                    // var modalTitle = exampleModal13.querySelector('.modal-title')0
                    var nombreInsert = exampleModal2.querySelector('#nombreCliente');
                    var cedulaInsert = exampleModal2.querySelector('#cedulaclienteInsert');
                    var direccionInsert = exampleModal2.querySelector('#direccionCliente');
                    var codigoInsert = exampleModal2.querySelector('#codigoCliente');
                    var tiendaInsert = exampleModal2.querySelector('#nombreTienda');
                    var telefonoInsert = exampleModal2.querySelector('#celular');

                    var nombreInsert2 = exampleModal2.querySelector('#nombreCliente1');
                    var cedulaInsert2 = exampleModal2.querySelector('#cedulaCliente1');
                    var direccionInsert2 = exampleModal2.querySelector('#direccionCliente1');
                    var codigoInsert2 = exampleModal2.querySelector('#codigoCliente1');
                    var tiendaInsert2 = exampleModal2.querySelector('#nombreTienda1');
                    var telefonoInsert2 = exampleModal2.querySelector('#celular1');
                    // var tiendaInsert2 = exampleModal3.querySelector('#codigoTienda1');
                    // var tiendaInsert2 = exampleModal3.querySelector('#codigoTienda2');

                    //         console.log(nombreInsert,'1',
                    // cedulaInsert,'1',
                    // direccionInsert,'1',
                    // codigoInsert,'1',
                    // tiendaInsert,'1',
                    // tiendaInsert);
                    nombreInsert.value = nombre
                    cedulaInsert.value = cedula
                    direccionInsert.value = direccion
                    codigoInsert.value = codigo
                    tiendaInsert.value = tienda
                    telefonoInsert.value = celular
                    ////
                    nombreInsert2.value = nombre
                    cedulaInsert2.value = cedula
                    direccionInsert2.value = direccion
                    codigoInsert2.value = codigo
                    tiendaInsert2.value = tienda
                    telefonoInsert2.value = celular
                    // tiendaInsert2.value = tienda 
                })

                function buscar2() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myInput2");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("myTable2");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>
        </div>

    </div>

    <!-- Hasta aquí -->
    
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-casacobranza" tabindex="0">
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
                        <?php
                        foreach ($proceso as $retornar) :
                        ?>

                            <tr>
                                <td><?php echo $retornar["cedulaCliente"]; ?></td>
                                <td><?php echo $retornar["nombreCliente"]; ?></td>
                                <td><?php echo $retornar["vf_nombre_tienda"]; ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-cedula="<?php echo $retornar["cedulaCliente"]; ?>" data-bs-nombre="<?php echo $retornar["nombreCliente"]; ?>" data-bs-direccion="<?php echo $retornar["direccionDomiciliaria"]; ?>" data-bs-codigo="<?php echo $retornar["codigoVerificacion"]; ?>" data-bs-tienda="<?php echo $retornar["vf_nombre_tienda"]; ?>" data-bs-viviendatipo="<?php echo $retornar["tipoVivienda"]; ?>" data-bs-personaverificacion="<?php echo $retornar["personaQuienRealizaLaVerificacion"]; ?>" data-bs-residencia3="<?php echo $retornar["residenciaMinimaTresMeses"]; ?>" data-bs-terrenopropio="<?php echo $retornar["localTerrenoPropio"]; ?>" data-bs-terrenoarrendado="<?php echo $retornar["localTerrenoArrendado"]; ?>" data-bs-planillabasica="<?php echo $retornar["planillaServicioBasico"]; ?>" data-bs-seguridadpv="<?php echo $retornar["seguridadPuertasVentanas"]; ?>" data-bs-muebleria="<?php echo $retornar["muebleriaBasica"]; ?>" data-bs-materialdecasa="<?php echo $retornar["materialCasa"]; ?>" data-bs-periodolaboral="<?php echo $retornar["periodicidadActividadesLaborales"]; ?>" data-bs-conformavecino="<?php echo $retornar["confirmacionInfoVecinos"]; ?>" data-bs-nombrevecino="<?php echo $retornar["nombreInfoVecino"]; ?>" data-bs-celularvecino="<?php echo $retornar["celularInfoVecino"]; ?>" data-bs-lati="<?php echo $retornar["latitud"]; ?>" data-bs-longi="<?php echo $retornar["longitud"]; ?>" data-bs-fechaverifica="<?php echo $retornar["fechaverificacion"]; ?>" data-bs-fotoplanilla="<?php echo $retornar["planillaServicioBasicoImagen"]; ?>" data-bs-fotoestabilidadLaboraSeisMesesImagen="<?php echo $retornar["estabilidadLaboraSeisMesesImagen"]; ?>" data-bs-fotofacturasProveedoresUltimosTresMesesImagen="<?php echo $retornar["facturasProveedoresUltimosTresMesesImagen"]; ?>" data-bs-fotofachadaDelNegocioImagen="<?php echo $retornar["fachadaDelNegocioImagen"]; ?>" data-bs-fotointeriorDelNegocioImagen="<?php echo $retornar["interiorDelNegocioImagen"]; ?>" data-bs-fotoclienteDentroDelNegocioImagen="<?php echo $retornar["clienteDentroDelNegocioImagen"]; ?>" data-bs-fotoclienteFueraDelNegocioImagen="<?php echo $retornar["clienteFueraDelNegocioImagen"]; ?>" data-bs-fototituloPropiedaGaranteOCodeudorImagen="<?php echo $retornar["tituloPropiedaGaranteOCodeudorImagen"]; ?>" data-bs-fotoimpuestoPredialImagen="<?php echo $retornar["impuestoPredialImagen"]; ?>" data-bs-fotorespaldoIngresosImagen="<?php echo $retornar["respaldoIngresosImagen"]; ?>" data-bs-fotocertificadoLaboralImagen="<?php echo $retornar["certificadoLaboralImagen"]; ?>" data-bs-fotointeriorDomicilioImagen="<?php echo $retornar["interiorDomicilioImagen"]; ?>">
                                        <i class="bi bi-cursor"></i></button>
                                </td>
                            </tr>

                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true" style="overflow-y: scroll;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal3Label">Detalles Cliente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="inputTienda" class="form-text text-muted"><b>Tienda: </b><em class="">
                                    <input type="text" disabled value="" id="nombreTienda" /></em>
                            </label>
                            <label for="inputTienda" class="form-text text-muted"><b>Fecha: </b><em class="">
                                    <?php echo $today ?></em>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label for="inputTienda" class="form-text text-muted"><b>Nombre: </b><em class="">
                                    <input type="text" disabled value="" id="nombreCliente" /></em>
                            </label>
                            <label for="inputTienda" class="form-text text-muted"><b>Cedula: </b><em class="">
                                    <input type="text" disabled value="" id="cedulaclienteInsert" /></em>
                            </label>
                            <label for="inputTienda" class="form-text text-muted"><b>Direccion: </b><em class="">
                                    <input type="text" disabled value="" id="direccionCliente" /></em>
                            </label>
                            <label for="inputTienda" class="form-text text-muted"><b>Codigo: </b><em class="">
                                    <input type="text" disabled value="" id="codigoCliente" /></em>
                            </label>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">DATOS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Tipo de vivienda:</b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="tipovivienda" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Persona con quien realizara la verificación: </b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="verificapersona" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Residencia minima de 3 meses: </b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="residencia3" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Local o terreno propio: </b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="terrenopropio" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Local o terreno arrendado: </b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="terrenoarrendado" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Planilla de servicio basico: </b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="planillabasica" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Seguridad en puertas y ventanas: </b>

                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="seguridadpv" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Muebleria basica: </b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="muebleria" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Material casa: </b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="materialdecasa" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Periodicidad de actividades laborales:</b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="periodolab" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Confirmación de información con vecinos:</b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="confirmavec" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Nombre vecino: </b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="nombrevec" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Celular vecino:</b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="celularvec" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Latitud</b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="lati" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Longitud</b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="longi" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Fecha de la verificación</b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled value="" id="fechaverifica" />
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-md-6">
                                                    <label for="inputTienda" class="text"><b>Mapa</b></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-dark"><a href='https://www.google.com/maps/place/-0.1462236,-78.4807915,17z/data=!3m1!4b1!4m5!3m4!1s0x91d58554aa18978b:0x7e026a44e17002a2!8m2!3d-0.1459147!4d-78.4815879?hl=es'>Boton</a></button>
                                                </div>
                                            </div> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <!-- Mapa -->
                        <!-- <div class="container p-4 my-2 border">
                            <div style="overflow-x:auto;" class="mt-1">
                                <div class="col-md-12">
                                    <table class="table table-bordered" style="text-align:centeri;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Ubicación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <iframe class="responsive-iframe" src='https://www.google.com/maps?q=<?php echo $retornar["latitud"]; ?>, <?php echo $retornar["longitud"]; ?>&hl=es;z=14&output=embed' width="500" height="500" frameborder="0"></iframe>
                                                    https://www.google.com/maps?q=-0.1280204,-78.477694&hl=es;z=14&output=embed
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->
                        <br>
                        <div class="container p-4 my-2 border">
                            <div style="overflow-x:auto;" class="mt-1">
                                <div class="col-md-12">
                                    <table class="table table-bordered" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Planilla Servicio Básico</th>
                                                <th scope="col">Certificado Laboral</th>
                                                <th scope="col">Fachada Negocio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotoplanilla"></td>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotocertificadoLaboralImagen"></td>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotofachadaDelNegocioImagen"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="container p-4 my-2 border">
                            <div style="overflow-x:auto;" class="mt-1">
                                <div class="col-md-12">
                                    <table class="table table-bordered" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Estabilidad 6 meses</th>
                                                <th scope="col">Facturas ultimos 3 meses</th>
                                                <th scope="col">Cliente dentro del Negocio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotoestabilidadLaboraSeisMesesImagen"></td>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotofacturasProveedoresUltimosTresMesesImagen"></td>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotoclienteDentroDelNegocioImagen"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="container p-4 my-2 border">
                            <div style="overflow-x:auto;" class="mt-1">
                                <div class="col-md-12">
                                    <table class="table table-bordered" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cliente fuera del Negocio</th>
                                                <th scope="col">Titulo de Propiedad Garante</th>
                                                <th scope="col">Impuesto predial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotoclienteFueraDelNegocioImagen"></td>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fototituloPropiedaGaranteOCodeudorImagen"></td>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotoimpuestoPredialImagen"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="container p-4 my-2 border">
                            <div style="overflow-x:auto;" class="mt-1">
                                <div class="col-md-12">
                                    <table class="table table-bordered" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Interior Domicilio</th>
                                                <th scope="col">Interior del Negocio</th>
                                                <th scope="col">Respaldo Ingresos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotointeriorDomicilioImagen"></td>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotointeriorDelNegocioImagen"></td>
                                                <td WIDTH="250" HEIGHT="250"><img height="220" width="240" src="" id="fotorespaldoIngresosImagen"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var exampleModal3 = document.getElementById('exampleModal3')
        exampleModal3.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var cedula = button.getAttribute('data-bs-cedula');
            var nombre = button.getAttribute('data-bs-nombre');
            var direccion = button.getAttribute('data-bs-direccion');
            var codigo = button.getAttribute('data-bs-codigo');
            var tienda = button.getAttribute('data-bs-tienda');
            var viviendatipo = button.getAttribute('data-bs-viviendatipo');
            var personaverificacion = button.getAttribute('data-bs-personaverificacion');
            var residencia3 = button.getAttribute('data-bs-residencia3');
            var terrenopropio = button.getAttribute('data-bs-terrenopropio');
            var terrenoarrendado = button.getAttribute('data-bs-terrenoarrendado');
            var planillabasica = button.getAttribute('data-bs-planillabasica');
            var seguridadpv = button.getAttribute('data-bs-seguridadpv');
            var muebleria = button.getAttribute('data-bs-muebleria');
            var materialdecasa = button.getAttribute('data-bs-materialdecasa');
            var periodolaboral = button.getAttribute('data-bs-periodolaboral');
            var conformavecino = button.getAttribute('data-bs-conformavecino');
            var nombrevecino = button.getAttribute('data-bs-nombrevecino');
            var celularvecino = button.getAttribute('data-bs-celularvecino');
            var lati = button.getAttribute('data-bs-lati');
            var longi = button.getAttribute('data-bs-longi');
            var fechaverifica = button.getAttribute('data-bs-fechaverifica');
            var fotoplanilla = button.getAttribute('data-bs-fotoplanilla');
            var fotoestabilidadLaboraSeisMesesImagen = button.getAttribute('data-bs-fotoestabilidadLaboraSeisMesesImagen');
            var fotofacturasProveedoresUltimosTresMesesImagen = button.getAttribute('data-bs-fotofacturasProveedoresUltimosTresMesesImagen');
            var fotofachadaDelNegocioImagen = button.getAttribute('data-bs-fotofachadaDelNegocioImagen');
            var fotointeriorDelNegocioImagen = button.getAttribute('data-bs-fotointeriorDelNegocioImagen');
            var fotoclienteDentroDelNegocioImagen = button.getAttribute('data-bs-fotoclienteDentroDelNegocioImagen');
            var fotoclienteFueraDelNegocioImagen = button.getAttribute('data-bs-fotoclienteFueraDelNegocioImagen');
            var fototituloPropiedaGaranteOCodeudorImagen = button.getAttribute('data-bs-fototituloPropiedaGaranteOCodeudorImagen');
            var fotoimpuestoPredialImagen = button.getAttribute('data-bs-fotoimpuestoPredialImagen');
            var fotorespaldoIngresosImagen = button.getAttribute('data-bs-fotorespaldoIngresosImagen');
            var fotocertificadoLaboralImagen = button.getAttribute('data-bs-fotocertificadoLaboralImagen');
            var fotointeriorDomicilioImagen = button.getAttribute('data-bs-fotointeriorDomicilioImagen');

            // Update the modal's content.

            var nombreInsert = exampleModal3.querySelector('#nombreCliente');
            var cedulaInsert = exampleModal3.querySelector('#cedulaclienteInsert');
            var direccionInsert = exampleModal3.querySelector('#direccionCliente');
            var codigoInsert = exampleModal3.querySelector('#codigoCliente');
            var tiendaInsert = exampleModal3.querySelector('#nombreTienda');
            var viviendatipoInsert = exampleModal3.querySelector('#tipovivienda');
            var personaverificacionInsert = exampleModal3.querySelector('#verificapersona');
            var residencia3Insert = exampleModal3.querySelector('#residencia3');
            var terrenopropioInsert = exampleModal3.querySelector('#terrenopropio');
            var terrenoarrendadoInsert = exampleModal3.querySelector('#terrenoarrendado');
            var planillabasicaInsert = exampleModal3.querySelector('#planillabasica');
            var seguridadpvInsert = exampleModal3.querySelector('#seguridadpv');
            var muebleriaInsert = exampleModal3.querySelector('#muebleria');
            var materialdecasaInsert = exampleModal3.querySelector('#materialdecasa');
            var periodolaboralInsert = exampleModal3.querySelector('#periodolab');
            var conformavecinoInsert = exampleModal3.querySelector('#confirmavec');
            var nombrevecinoInsert = exampleModal3.querySelector('#nombrevec');
            var celularvecinoInsert = exampleModal3.querySelector('#celularvec');
            var latiInsert = exampleModal3.querySelector('#lati');
            var longiInsert = exampleModal3.querySelector('#longi');
            var fechaverificaInser = exampleModal3.querySelector('#fechaverifica');
            var fotoplanillaInsert = exampleModal3.querySelector('#fotoplanilla');
            var fotoestabilidadLaboraSeisMesesImagenInsert = exampleModal3.querySelector('#fotoestabilidadLaboraSeisMesesImagen');
            var fotofacturasProveedoresUltimosTresMesesImagenInsert = exampleModal3.querySelector('#fotofacturasProveedoresUltimosTresMesesImagen');
            var fotofachadaDelNegocioImagenInsert = exampleModal3.querySelector('#fotofachadaDelNegocioImagen');
            var fotointeriorDelNegocioImagenInsert = exampleModal3.querySelector('#fotointeriorDelNegocioImagen');
            var fotoclienteDentroDelNegocioImagenInsert = exampleModal3.querySelector('#fotoclienteDentroDelNegocioImagen');
            var fotoclienteFueraDelNegocioImagenInsert = exampleModal3.querySelector('#fotoclienteFueraDelNegocioImagen');
            var fototituloPropiedaGaranteOCodeudorImagenInsert = exampleModal3.querySelector('#fototituloPropiedaGaranteOCodeudorImagen');
            var fotoimpuestoPredialImagenInsert = exampleModal3.querySelector('#fotoimpuestoPredialImagen');
            var fotorespaldoIngresosImagenInsert = exampleModal3.querySelector('#fotorespaldoIngresosImagen');
            var fotocertificadoLaboralImagenInsert = exampleModal3.querySelector('#fotocertificadoLaboralImagen');
            var fotointeriorDomicilioImagenInsert = exampleModal3.querySelector('#fotointeriorDomicilioImagen');




            nombreInsert.value = nombre
            cedulaInsert.value = cedula
            direccionInsert.value = direccion
            codigoInsert.value = codigo
            tiendaInsert.value = tienda
            viviendatipoInsert.value = viviendatipo
            personaverificacionInsert.value = personaverificacion
            residencia3Insert.value = residencia3
            terrenopropioInsert.value = terrenopropio
            terrenoarrendadoInsert.value = terrenoarrendado
            planillabasicaInsert.value = planillabasica
            seguridadpvInsert.value = seguridadpv
            muebleriaInsert.value = muebleria
            materialdecasaInsert.value = materialdecasa
            periodolaboralInsert.value = periodolaboral
            conformavecinoInsert.value = conformavecino
            nombrevecinoInsert.value = nombrevecino
            celularvecinoInsert.value = celularvecino
            latiInsert.value = lati
            longiInsert.value = longi
            fechaverificaInser.value = fechaverifica
            fotoplanillaInsert.src = fotoplanilla
            fotoestabilidadLaboraSeisMesesImagenInsert.src = fotoestabilidadLaboraSeisMesesImagen
            fotofacturasProveedoresUltimosTresMesesImagenInsert.src = fotofacturasProveedoresUltimosTresMesesImagen
            fotofachadaDelNegocioImagenInsert.src = fotofachadaDelNegocioImagen
            fotointeriorDelNegocioImagenInsert.src = fotointeriorDelNegocioImagen
            fotoclienteDentroDelNegocioImagenInsert.src = fotoclienteDentroDelNegocioImagen
            fotoclienteFueraDelNegocioImagenInsert.src = fotoclienteFueraDelNegocioImagen
            fototituloPropiedaGaranteOCodeudorImagenInsert.src = fototituloPropiedaGaranteOCodeudorImagen
            fotoimpuestoPredialImagenInsert.src = fotoimpuestoPredialImagen
            fotorespaldoIngresosImagenInsert.src = fotorespaldoIngresosImagen
            fotocertificadoLaboralImagenInsert.src = fotocertificadoLaboralImagen
            fotointeriorDomicilioImagenInsert.src = fotointeriorDomicilioImagen

            // console.log(fotoestabilidadLaboraSeisMesesImagenInsert);
        })

        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>





    