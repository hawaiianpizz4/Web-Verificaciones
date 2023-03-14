<!DOCTYPE html>
<html lang="en">
<?php
include("./Control/VerificacionFisica.php");
include("./Control/numCedula.php"); ?>


<head>
    <title>Gestor Verificación</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- LIBRERIAS BOOTSTRAP-->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="styles.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="fav.ico" type="image/x-icon" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/c1c040ceb6.js" crossorigin="anonymous"></script>
</head>

<body>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Gestores</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Clientes reservados</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
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
            <div style="overflow-x:auto;" class="mt-1">
                <table class="table table-bordered table-hover">
                    <thead class="table-light" style="font-size: 8px;">
                        <tr>
                            <th scope="col">#Cédula del Cliente</th>
                            <th scope="col">Nombre del Cliente</th>
                            <th scope="col">Lugar de verificación</th>
                            <th scope="col">Ciudad </th>
                            <th scope="col">Dirección cliente</th>
                            <th scope="col">Nombre Tienda </th>
                            <th scope="col">Celular </th>
                            <th scope="col">Reservar</th>
                        </tr>
                    </thead>
                    <?php

                    foreach ($data as $retornar) :
                        echo '<tbody>
                                                    <tr>
                                                    <td>' . $retornar["vf_cedula_cliente"] . '</td>
                                                    <td>' . $retornar["vf_nombre_cliente"] . '</td>
                                                    <td>' . $retornar["vf_lugar_a_verificar"] . '</td>
                                                    <td>' . $retornar["dndlD_ciudad_residencia"] . '</td>
                                                    <td>' . $retornar["dndlD_direccion_domiciliaria"] . '</td>
                                                    <td>' . $retornar["vf_nombre_tienda"] . '</td>
                                                    <td>' . $retornar["dndlN_telefonocelular"] . '</td>
                                                    <td><button type="button" class="btn btn-primary" onclick="editar(this)" 
                                                    id="' . $retornar["vf_cedula_cliente"] . '" 
                                                    value="' . $retornar["vf_nombre_cliente"] . '"
                                                    name = "' . $retornar["dndlN_telefonocelular"] . '"
                                                    >Reservar</button></td>
                                                    </tr>
                                        </tbody>
                                        
                                        ';
                    endforeach;
                    ?>
                </table>



                <div class="modal" tabindex="-1" id="EditModal">
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
                                        <input type="text" name="cedula" id="cedulaInsert" hidden>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label id="nombre" for="exampleInputPassword1">Nombre: </label>
                                        <input type="text" name="nombre" id="nombreInsert" hidden>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label id="celular" for="exampleInputPassword1">Celular: </label>
                                        <input type="text" name="celular" id="celularInsert" hidden>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input placeholder="Ingresa tu numero de celular" name="numClient" type="number" class="form-control" id="exampleCheck1">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function editar(este) {
                        var ModalEdit = new bootstrap.Modal(EditModal, {}).show();
                        variable.innerHTML = "Cedula : " + este.id;
                        nombre.innerHTML = "Nombre : " + este.value;
                        celular.innerHTML = "Celular : " + este.name;
                        cedulaInsert.value = este.id;
                        nombreInsert.value = este.value;
                        celularInsert.value = este.name;
                    }
                </script>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <form action="gestores.php" method="POST">
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
            <div style="overflow-x:auto;" class="mt-1">
                <table class="table table-bordered table-hover">
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
                                <input type="hidden" name="cedula" value="Siguiente">
                        </tr>
                    </thead>
                    <?php

                    foreach ($data4 as $retornar) :
                        var_dump($retornar["vf_nombre_cliente"]);
                        echo '<tbody>
                                    <tr>
                                    <td>' . $retornar["vf_cedula_cliente"] . '</td>
                                    <td>' . $retornar["vf_nombre_cliente"] . '</td>
                                    <input type="text" hidden name="nombre" value="'.$retornar["vf_nombre_cliente"].'">
                                    <td>' . $retornar["vf_lugar_a_verificar"] . '</td>
                                    <td>' . $retornar["dndlD_ciudad_residencia"] . '</td>
                                    <td>' . $retornar["dndlD_direccion_domiciliaria"] . '</td>
                                    <input type="hidden" name="direccion" value="'.$retornar["dndlD_direccion_domiciliaria"].'">
                                    <td>' . $retornar["vf_nombre_tienda"] . '</td>
                                    <td>' . $retornar["dndlN_telefonocelular"] . '</td>
                                    <td><a class="button" href="gestores.php?vf_cedula_cliente=<?= '.$valor["vf_cedula_cliente"].' ?>">Modificar</a></td>
                                    </tr>
                        </tbody>';
                    endforeach;
                    ?>
                </table>
                </form>
            </div>  
        </div>
</body>

</html>