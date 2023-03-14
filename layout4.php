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
    <title>Document</title>
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
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab2" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li>
            </ul>
        </nav>
        <div class="tab-content" id="myTabContent">
            <!-- Primer tab -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                <!-- Container para tabla -->
                <div class="container p-4 my-2 border">
                    <div style="overflow-x:auto;" class="mt-1">
                        <input type="text" id="myInput1" onkeyup="buscar1()" placeholder="Buscar por cédula" title="Type in a name">
                        <br>
                        <br>
                        <!-- Creación de tabla -->
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
                        <!-- End table -->






                    </div>
                </div>



            </div>
            <!-- End Primer tab -->
            
            <!--  -->
            <!-- Segundo tab -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
            <!-- End Segundo Tab -->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Tab Panel 2</div>
            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">Tab Panel 3</div>
        </div>
    </div>


    <!-- Modals y Scripts -->
    <!-- Inicio Modal1-->
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
                            <input type="text" disabled value="" id="nombreInsert3" />
                            <input type="hidden" value="" name="nombreInsert4" id="nombreInsert4" />
                            <!-- <input type="hidden" name="nombreInsert3" id="nombreInsert4" /> -->
                        </div>
                        <div class="form-group mt-2">
                            <label id="celular2" for="exampleInputPassword1">Celular: </label>
                            <!-- <input type="text" name="nombre" id="celularInsert3" value="" > -->
                            <input type="text" disabled value="" id="celularInsert3" />
                            <input type="hidden" name="celularInsert4" id="celularInsert4" />
                            <!-- <input type="hidden" name="nombreInsert3" id="celularInsert4" /> -->
                        </div>
                        <div class="form-group mt-2">
                            <label id="latitud2" for="exampleInputPassword1">Latitud: </label>
                            <!-- <input type="text" name="nombre" id="latitudInsert3" value="" > -->
                            <input type="text" disabled value="" id="latitudInsert3" />
                            <input type="hidden" name="latitudInsert4" id="latitudInsert4" />
                            <!-- <input type="hidden" name="nombreInsert3" id="latitudInsert4" /> -->

                        </div>
                        <div class="form-group mt-2">
                            <label id="longitud2" for="exampleInputPassword1">Longitud: </label>
                            <!-- <input type="text" name="nombre" id="longitudInsert3" value="" > -->
                            <input type="text" disabled value="" id="longitudInsert3" />
                            <input type="hidden" name="longitudInsert4" id="longitudInsert4" />
                            <!-- <input type="hidden" name="nombreInsert3" id="longitudInsert4" /> -->
                        </div>
                        <div class="form-group mt-2" id="linkmapa">
                            <label id="Ubicación" for="exampleInputLatitud">Mapa: </label>
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
    <!-- End Modal1 -->

    <!-- Script General donde se almacenan todos los modales a ser ocupados  -->
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
        // Modal1
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




            var mapa = exampleModal.querySelector('#linkmapa')

            mapa.innerHTML = `<a href=https://maps.google.com/?q=${latitud3},${longitud3} target="_blank">Consulta Ubicación</a>`;
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




        // ExampleModal1
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>