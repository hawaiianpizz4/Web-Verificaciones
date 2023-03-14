<?php
include("./Control/VerificacionFisica.php");
include("./Control/numCedula.php");
include("./Control/usuCarga.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="./js/geo.js"></script>
    <title>Muestra Verificación</title>
    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script> -->
    <!-- <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script> -->
    <link rel="stylesheet" href="style3.css">
</head>
<?php
$nombreusuario = $_SESSION["USERNAME"];
$codigolocal = $codlocal;
$tienda = $local;
$query2 = $dbconn->prepare("CALL ventaspdv_verificaciones.proc_usuariosadministrados_tb('$tienda')");
// var_dump($query2);
$query2->execute();
$data = $query2->fetchAll();
// var_dump($data);
?>

<body>
    <div div class="container p-5 my-5 border">
        <div>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por cédula" title="Type in a name">
            <table id="myTable" data-toggle="table" data-search="true" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#Cédula del Cliente</th>
                        <th scope="col">Nombre del Cliente</th>
                        <th scope="col">Tienda</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>
                <?php
                foreach ($data as $retornar) :
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $retornar["cedulaCliente"]; ?></td>
                            <td><?php echo $retornar["nombreCliente"]; ?></td>
                            <td><?php echo $retornar["vf_nombre_tienda"]; ?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-cedula="<?php echo $retornar["cedulaCliente"]; ?>" data-bs-nombre="<?php echo $retornar["nombreCliente"]; ?>" data-bs-direccion="<?php echo $retornar["direccionDomiciliaria"]; ?>" data-bs-codigo="<?php echo $retornar["codigoVerificacion"]; ?>" data-bs-tienda="<?php echo $retornar["vf_nombre_tienda"]; ?>"><i class="bi bi-cursor"></i></button>
                            </td>
                        </tr>
                    </tbody>
                <?php
                endforeach;
                ?>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles Cliente</h1>
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
                                    <th scope="col">Ubicación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b> Tipo de vivienda: </b>
                                                <span class="details"><?php echo $retornar["tipoVivienda"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Persona con quien realizara la verificación: </b>
                                                <span class="details"><?php echo $retornar["personaQuienRealizaLaVerificacion"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Residencia minima de 3 meses: </b>
                                                <span class="details"><?php echo $retornar["residenciaMinimaTresMeses"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Local o terreno propio: </b>
                                                <span class="details"><?php echo $retornar["localTerrenoPropio"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Local o terreno arrendado: </b>
                                                <span class="details"><?php echo $retornar["localTerrenoArrendado"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Planilla de servicio basico: </b>
                                                <span class="details"><?php echo $retornar["planillaServicioBasico"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Seguridad en puertas y ventanas: </b>
                                                <span class="details"><?php echo $retornar["seguridadPuertasVentanas"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Muebleria basica: </b>
                                                <span class="details"><?php echo $retornar["muebleriaBasica"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Material casa: </b>
                                                <span class="details"><?php echo $retornar["materialCasa"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Periodicidad de actividades laborales:</b>
                                                <span class="details"><?php echo $retornar["periodicidadActividadesLaborales"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Confirmación de información con vecinos:</b>
                                                <span class="details"><?php echo $retornar["confirmacionInfoVecinos"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Nombre vecino: </b>
                                                <span class="details"><?php echo $retornar["nombreInfoVecino"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Celular vecino:</b>
                                                <span class="details"><?php echo $retornar["celularInfoVecino"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Latitud</b>
                                                <span class="details"><?php echo $retornar["latitud"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Longitud</b>
                                                <span class="details"><?php echo $retornar["longitud"]; ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Fecha de la verificación</b>
                                                <span class="details"><?php echo $retornar["fechaverificacion"]; ?></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td><iframe class="responsive-iframe" src='https://www.google.com/maps?q=<?php echo $retornar["latitud"]; ?>, <?php echo $retornar["longitud"]; ?>&hl=es;z=14&output=embed' width="500" height="500" frameborder="0"></iframe></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
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
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["planillaServicioBasicoImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["certificadoLaboralImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["fachadaDelNegocioImagen"]); ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["estabilidadLaboraSeisMesesImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["facturasProveedoresUltimosTresMesesImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["clienteDentroDelNegocioImagen"]); ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["clienteFueraDelNegocioImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["tituloPropiedaGaranteOCodeudorImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["impuestoPredialImagen"]); ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["interiorDomicilioImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["interiorDelNegocioImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["respaldoIngresosImagen"]); ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var cedula = button.getAttribute('data-bs-cedula')
            // console.log(cedula);  
            var nombre = button.getAttribute('data-bs-nombre')
            // console.log(nombre);
            var direccion = button.getAttribute('data-bs-direccion')
            // console.log(direccion);
            var codigo = button.getAttribute('data-bs-codigo')
            // console.log(codigo);
            var tienda = button.getAttribute('data-bs-tienda')
            // console.log(tienda);
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            // var modalTitle = exampleModal.querySelector('.modal-title')0
            var nombreInsert = exampleModal.querySelector('#nombreCliente');
            var cedulaInsert = exampleModal.querySelector('#cedulaclienteInsert');
            var direccionInsert = exampleModal.querySelector('#direccionCliente');
            var codigoInsert = exampleModal.querySelector('#codigoCliente');
            var tiendaInsert = exampleModal.querySelector('#nombreTienda');

            // var nombreInsert1 = exampleModal.querySelector('#nombreCliente1');
            // var cedulaInsert1 = exampleModal.querySelector('#cedulaCliente1');
            // var direccionInsert1 = exampleModal.querySelector('#direccionCliente1');
            // var codigoInsert1 = exampleModal.querySelector('#codigoCliente1');
            // var tiendaInsert1 = exampleModal.querySelector('#codigoTienda1');
            // var tiendaInsert2 = exampleModal.querySelector('#codigoTienda2');

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
            ////
            // nombreInsert1.value = nombre
            // cedulaInsert1.value = cedula
            // direccionInsert1.value = direccion
            // codigoInsert1.value = codigo
            // tiendaInsert1.value = tienda
            // tiendaInsert2.value = tienda 
        })
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>