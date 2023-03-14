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
                                <button type="button" class="btn btn-primary" style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                data-bs-cedula="<?php echo $retornar["cedulaCliente"]; ?>" 
                                data-bs-nombre="<?php echo $retornar["nombreCliente"]; ?>" 
                                data-bs-direccion="<?php echo $retornar["direccionDomiciliaria"]; ?>" 
                                data-bs-codigo="<?php echo $retornar["codigoVerificacion"]; ?>" 
                                data-bs-tienda="<?php echo $retornar["vf_nombre_tienda"]; ?>" 
                                data-bs-viviendatipo="<?php echo $retornar["tipoVivienda"]; ?>" 
                                data-bs-personaverificacion="<?php echo $retornar["personaQuienRealizaLaVerificacion"]; ?>"
                                data-bs-residencia3="<?php echo $retornar["residenciaMinimaTresMeses"]; ?>" 
                                data-bs-terrenopropio="<?php echo $retornar["localTerrenoPropio"]; ?>" 
                                data-bs-terrenoarrendado="<?php echo $retornar["localTerrenoArrendado"]; ?>" 
                                data-bs-planillabasica="<?php echo $retornar["planillaServicioBasico"]; ?>" 
                                data-bs-seguridadpv="<?php echo $retornar["seguridadPuertasVentanas"]; ?>" 
                                data-bs-muebleria="<?php echo $retornar["muebleriaBasica"]; ?>" 
                                data-bs-materialdecasa="<?php echo $retornar["materialCasa"]; ?>" 
                                data-bs-periodolaboral="<?php echo $retornar["periodicidadActividadesLaborales"]; ?>" 
                                data-bs-conformavecino="<?php echo $retornar["confirmacionInfoVecinos"]; ?>" 
                                data-bs-nombrevecino="<?php echo $retornar["nombreInfoVecino"]; ?>" 
                                data-bs-celularvecino="<?php echo $retornar["celularInfoVecino"]; ?>" 
                                data-bs-lati="<?php echo $retornar["latitud"]; ?>" 
                                data-bs-longi="<?php echo $retornar["longitud"]; ?>" 
                                data-bs-fechaverifica="<?php echo $retornar["fechaverificacion"]; ?>" 
                                data-bs-fotoplanilla="<?php echo base64_encode($retornar["planillaServicioBasicoImagen"]);; ?>">
                                    <i class="bi bi-cursor"></i></button>
                            </td>
                            
                            <?php

                            $fotocertificado = base64_encode($retornar["certificadoLaboralImagen"]);
                            $fotofachada = base64_encode($retornar["fachadaDelNegocioImagen"]);
                            $fotoestabilidad = base64_encode($retornar["estabilidadLaboraSeisMesesImagen"]);
                            $fotoprovetresmeses = base64_encode($retornar["facturasProveedoresUltimosTresMesesImagen"]);
                            $fotodentrodelnegocio = base64_encode($retornar["clienteDentroDelNegocioImagen"]);
                            $fotofueranegocio = base64_encode($retornar["clienteFueraDelNegocioImagen"]);
                            $fototitulopropiedad = base64_encode($retornar["tituloPropiedaGaranteOCodeudorImagen"]);
                            $fotoimpuestopredial = base64_encode($retornar["impuestoPredialImagen"]);
                            $fotointeriordomicilio = base64_encode($retornar["interiorDomicilioImagen"]);
                            $fotointeriornegocio = base64_encode($retornar["interiorDelNegocioImagen"]);
                            $fotorespaldoingresos = base64_encode($retornar["respaldoIngresosImagen"]);
                            ?>

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
                                            <label for="inputTienda" class="text"><b> Tipo de vivienda: </b><em class="">
                                                    <input type="text" disabled value="" id="tipovivienda" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Persona con quien realizara la verificación: </b><em class="">
                                                    <input type="text" disabled value="" id="verificapersona" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Residencia minima de 3 meses: </b><em class="">
                                                    <input type="text" disabled value="" id="residencia3" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Local o terreno propio: </b><em class="">
                                                    <input type="text" disabled value="" id="terrenopropio" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Local o terreno arrendado: </b><em class="">
                                                    <input type="text" disabled value="" id="terrenoarrendado" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Planilla de servicio basico: </b><em class="">
                                                    <input type="text" disabled value="" id="planillabasica" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Seguridad en puertas y ventanas: </b><em class="">
                                                    <input type="text" disabled value="" id="seguridadpv" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Muebleria basica: </b><em class="">
                                                    <input type="text" disabled value="" id="muebleria" /></em>

                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Material casa: </b><em class="">
                                                    <input type="text" disabled value="" id="materialdecasa" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Periodicidad de actividades laborales:</b><em class="">
                                                    <input type="text" disabled value="" id="periodolab" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Confirmación de información con vecinos:</b><em class="">
                                                    <input type="text" disabled value="" id="confirmavec" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Nombre vecino: </b><em class="">
                                                    <input type="text" disabled value="" id="nombrevec" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Celular vecino:</b><em class="">
                                                    <input type="text" disabled value="" id="celularvec" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Latitud</b><em class="">
                                                    <input type="text" disabled value="" id="lati" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Longitud</b><em class="">
                                                    <input type="text" disabled value="" id="longi" /></em>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputTienda" class="text"><b>Fecha de la verificación</b><em class="">
                                                    <input type="text" disabled value="" id="fechaverifica" /></em>
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
                                    <!-- <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["planillaServicioBasicoImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["certificadoLaboralImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["fachadaDelNegocioImagen"]); ?>"></td> -->
                                    <input type="image" name="fotoplanilla" value="" id="fotoplanilla">
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
                                    <!-- <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["estabilidadLaboraSeisMesesImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["facturasProveedoresUltimosTresMesesImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["clienteDentroDelNegocioImagen"]); ?>"></td> -->
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
                                    <!-- <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["clienteFueraDelNegocioImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["tituloPropiedaGaranteOCodeudorImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["impuestoPredialImagen"]); ?>"></td> -->
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
                                    <!-- <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["interiorDomicilioImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["interiorDelNegocioImagen"]); ?>"></td>
                                    <td WIDTH="50" HEIGHT="50"><img height="100" width="120" src="data:image/jpg;base64,<?php echo base64_encode($retornar["respaldoIngresosImagen"]); ?>"></td> -->
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
            var nombre = button.getAttribute('data-bs-nombre')
            var direccion = button.getAttribute('data-bs-direccion')
            var codigo = button.getAttribute('data-bs-codigo')
            var tienda = button.getAttribute('data-bs-tienda')
            var viviendatipo = button.getAttribute('data-bs-viviendatipo')
            var personaverificacion = button.getAttribute('data-bs-personaverificacion')
            var residencia3 = button.getAttribute('data-bs-residencia3')
            var terrenopropio = button.getAttribute('data-bs-terrenopropio')
            var terrenoarrendado = button.getAttribute('data-bs-terrenoarrendado')
            var planillabasica = button.getAttribute('data-bs-planillabasica')
            var seguridadpv = button.getAttribute('data-bs-seguridadpv')
            var muebleria = button.getAttribute('data-bs-muebleria')
            var materialdecasa = button.getAttribute('data-bs-materialdecasa')
            var periodolaboral = button.getAttribute('data-bs-periodolaboral')
            var conformavecino = button.getAttribute('data-bs-conformavecino')
            var nombrevecino = button.getAttribute('data-bs-nombrevecino')
            var celularvecino = button.getAttribute('data-bs-celularvecino')
            var lati = button.getAttribute('data-bs-lati')
            var longi = button.getAttribute('data-bs-longi')
            var fechaverifica = button.getAttribute('data-bs-fechaverifica')
            var fotoplanilla = button.getAttribute('data-bs-fotoplanilla')

            // Update the modal's content.

            var nombreInsert = exampleModal.querySelector('#nombreCliente');
            var cedulaInsert = exampleModal.querySelector('#cedulaclienteInsert');
            var direccionInsert = exampleModal.querySelector('#direccionCliente');
            var codigoInsert = exampleModal.querySelector('#codigoCliente');
            var tiendaInsert = exampleModal.querySelector('#nombreTienda');
            var viviendatipoInsert = exampleModal.querySelector('#tipovivienda');
            var personaverificacionInsert = exampleModal.querySelector('#verificapersona');
            var residencia3Insert = exampleModal.querySelector('#residencia3');
            var terrenopropioInsert = exampleModal.querySelector('#terrenopropio');
            var terrenoarrendadoInsert = exampleModal.querySelector('#terrenoarrendado');
            var planillabasicaInsert = exampleModal.querySelector('#planillabasica');
            var seguridadpvInsert = exampleModal.querySelector('#seguridadpv');
            var muebleriaInsert = exampleModal.querySelector('#muebleria');
            var materialdecasaInsert = exampleModal.querySelector('#materialdecasa');
            var periodolaboralInsert = exampleModal.querySelector('#periodolab');
            var conformavecinoInsert = exampleModal.querySelector('#confirmavec');
            var nombrevecinoInsert = exampleModal.querySelector('#nombrevec');
            var celularvecinoInsert = exampleModal.querySelector('#celularvec');
            var latiInsert = exampleModal.querySelector('#lati');
            var longiInsert = exampleModal.querySelector('#longi');
            var fechaverificaInser = exampleModal.querySelector('#fechaverifica');
            var fotoplanillaInsert = exampleModal.querySelector('#fotoplanilla');


            nombreInsert.value = nombre;
            cedulaInsert.value = cedula;
            direccionInsert.value = direccion;
            codigoInsert.value = codigo;
            tiendaInsert.value = tienda;
            viviendatipoInsert.value = viviendatipo;
            personaverificacionInsert.value = personaverificacion;
            residencia3Insert.value = residencia3;
            terrenopropioInsert.value = terrenopropio;
            terrenoarrendadoInsert.value = terrenoarrendado;
            planillabasicaInsert.value = planillabasica;
            seguridadpvInsert.value = seguridadpv;
            muebleriaInsert.value = muebleria;
            materialdecasaInsert.value = materialdecasa;
            periodolaboralInsert.value = periodolaboral;
            conformavecinoInsert.value = conformavecino;
            nombrevecinoInsert.value = nombrevecino;
            celularvecinoInsert.value = celularvecino;
            latiInsert.value = lati;
            longiInsert.value = longi;
            fechaverificaInser.value = fechaverifica;
            fotoplanillaInsert.value = fotoplanilla;

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