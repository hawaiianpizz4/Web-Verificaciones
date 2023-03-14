<!doctype html>
<html lang="en">
<?php
include("./Control/VerificacionFisica.php");
include("./Control/numCedula.php");
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verificacion Gestores</title>
    <link href="https://cdnjsdelivrnet/npm/bootstrap@530-alpha1/dist/css/bootstrapmincss" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div div class="container p-3 my-5 border">
        <li class="d-flex flex-row-reverse" style="border-radius: 15px;">
            <div class="mt-2">
                <!-- <a href="seguridad/logoutphp"  ><i class="bi bi-box-arrow-right"></i></a> -->
                <a class="btn btn-outline-danger btn-sm" type="button" href="/seguridad/logout_externaphp">
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
                <button class="nav-link" id="nav-rferifica-tab" data-bs-toggle="tab" data-bs-target="#nav-rferifica" type="button" role="tab" aria-controls="nav-rferifica" aria-selected="false">Revisar Verificaciones</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                <?php foreach ($data as $retornar) : ?>
                                    <tr>
                                        <td> <?php $retornar["vf_nombre_cliente"] ?></td>
                                        <td> <?php $retornar["vf_cedula_cliente"] ?></td>
                                        <td> <?php $retornar["vf_lugar_a_verificar"] ?></td>
                                        <td> <?php $retornar["dndlD_ciudad_residencia"] ?></td>
                                        <td> <?php $retornar["dndlD_direccion_domiciliaria"] ?> </td>
                                        <td> <?php $retornar["dndlN_direccion_trabajo"] ?></td>
                                        <td> <?php $retornar["vf_nombre_tienda"] ?></td>
                                        <td> <?php $retornar["dndlN_telefonocelular"] ?></td>
                                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-cedula3=" $retornar[" vf_cedula_cliente"] data-bs-nombre3=" $retornar[" vf_nombre_cliente"] data-bs-celular3=" $retornar[" dndlN_telefonocelular"] data-bs-latitud3=" $retornar[" latitud"] data-bs-longitud3=" $retornar[" longitud"]>Verificar</button>
                                        </td>
                                    </tr>;
                                <?php endforeach ?>
                            </tbody>
                        </table>       
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"></div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"></div>
            <div class="tab-pane fade" id="nav-rferifica" role="tabpanel" aria-labelledby="nav-rferifica-tab"></div>
        </div>
    </div>
    <!-- Modales  -->
    <!-- Scripts -->
    <script src="https://cdnjsdelivrnet/npm/bootstrap@530-alpha1/dist/js/bootstrapbundleminjs" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>