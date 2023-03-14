<style>
    label {
        display: inline-block;
        width: 140px;
    }
</style>
<div class="modal" tabindex="-1" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Reservación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./Control/ReservacionGestor.php">
                    <!--  -->
                    <div class="col-md-12">
                        <label for="inputTienda" class="form-text text-muted">Fecha: <em class="">
                                <?php echo $today ?></em>
                        </label>
                        <br>
                        <!--  -->
                        <div class="form-group">
                            <!-- Cédula -->
                            <label id="variable" for="exampleInputEmail1">Cédula:</label>
                            <input type="text" class="form-control text-success" disabled value="" id="cedulaInsert3" />
                            <input type="hidden" value="" name="cedulaInsert3" id="cedulaInsert4" />
                            <!-- Nombre -->

                            <label id="nombre" for="exampleInputPassword1">Nombre: </label>
                            <input type="text" class="form-control text-success" disabled value="" id="nombreInsert3" />
                            <input type="hidden" value="" name="nombreInsert4" id="nombreInsert4" />

                            <!-- Celular -->
                            <label id="celular2" for="exampleInputPassword1">Celular: </label>
                            <input type="text" class="form-control text-success" disabled value="" id="celularInsert3" />
                            <input type="hidden" name="celularInsert4" id="celularInsert4" />

                            <!-- Latitud -->
                            <!-- <label id="latitud2" for="exampleInputPassword1">Latitud: </label> -->
                            <!-- <input type="text" class="form-control text-success" disabled value="" id="latitudInsert3" /> -->
                            <input type="hidden" name="latitudInsert4" id="latitudInsert4" />

                            <!-- Longitud -->
                            <!-- <label id="longitud2" for="exampleInputPassword1">Longitud: </label> -->
                            <!-- <input type="text" class="form-control text-success" disabled value="" id="longitudInsert3" /> -->
                            <input type="hidden" name="longitudInsert4" id="longitudInsert4" />

                        </div>
                        <!-- end div form-group-->
                    </div>
                    <!-- end div col-md-12-->
                    <div class="form-group mt-2" id="linkmapa2">
                        <!-- <label id="Ubicación" for="exampleInputLatitud">Mapa: </label> -->
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="inputTienda" class="eform-text text-muted">Latitud: <strong id="latitud1" name="lati" value=""> </strong></label>
                            <input type="hidden" id="lat1" name="lat1" value="" required>
                        </div>
                        <div class="col">
                            <label for="inputTienda" class="form-text text-muted">Longitud: <strong id="longitud1" name="long" value=""></strong></label>
                            <input type="hidden" id="long1" name="long1" value="" required>
                        </div>

                        <i class="bi bi-geo-alt-fi ll mt-2" style="font-size: 15px; color:#3498DB;" type="button" onclick="getLocationLocation()">Obtener Cordenadas</i>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Reservar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="CambioModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar informacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-default">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="./Control/editVerificaciones.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label id="variable" for="exampleInputEmail1">Cedula : </label>
                                        <input value="" type="hidden" name="Cedula" id="cedulaEdit" required />
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label id="celular2" for="exampleInputPassword1">Nombre : </label>
                                        <input type="text" value="" name="Nombre" id="nombreEdit" required />
                                    </div>
                                    <div class="form-group">
                                        <label id="celular2" for="exampleInputPassword1">Lugar : </label>
                                        <input type="text" value="" name="Lugar" id="lugarEdit" required />
                                    </div>
                                    <div class="form-group">
                                        <label id="celular2" for="exampleInputPassword1">Ciudad : </label>
                                        <input type="text" value="" name="Ciudad" id="ciudadEdit" required />
                                    </div>
                                    <div class="form-group">
                                        <label id="celular2" for="exampleInputPassword1">Domicilio : </label>
                                        <input type="text" value="" name="Domicilio" id="domicilioEdit" required />
                                    </div>
                                    <div class="form-group">
                                        <label id="celular2" for="exampleInputPassword1">Direccion : </label>
                                        <input type="text" value="" name="Direccion" id="direccionEdit" required />
                                    </div>
                                    <div class="form-group">
                                        <label id="celular2" for="exampleInputPassword1">Referencia : </label>
                                        <input type="text" value="" name="Referencia" id="referenciaEdit" required />
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label id="nombre" for="exampleInputPassword1">Empresa: </label>
                                        <input type="text" class="text-end" value="" id="empresaEdit" required name="Empresa" />
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label id="latitud2" for="exampleInputPassword1">Actividad: </label>
                                        <input type="text" value="" id="actividadEdit" required name="Actividad" />
                                    </div>
                                    <div class="form-group">
                                        <label id="latitud2" for="exampleInputPassword1">Direccion Trabajo: </label>
                                        <input type="text" value="" id="direccionTrabajoeDIT" required name="Direccion" />
                                    </div>
                                    <div class="form-group">
                                        <label id="latitud2" for="exampleInputPassword1">Telefono fijo: </label>
                                        <input type="text" value="" id="telfijoEdit" required name="Telefono" />
                                    </div>
                                    <div class="form-group">
                                        <label id="latitud2" for="exampleInputPassword1">Flujo_ingresos: </label>
                                        <input type="text" value="" id="flujo_ingresosEdit" required name="Flujo_ingresos" />
                                    </div>
                                    <div class="form-group">
                                        <label id="latitud2" for="exampleInputPassword1">Promedio: </label>
                                        <input type="text" value="" id="promedioEdit" - disabled required name="Promedio" />
                                    </div>
                                    <div class="form-group">
                                        <label id="latitud2" for="exampleInputPassword1">Telefono Adicional: </label>
                                        <input type="text" value="" id="telefonoEdit" required name="Telefono" />
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <button type="submit" class="btn btn-primary mt-2">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModal1Label">CHECK LIST VERIFICACIONES DOMICILIO</h5>
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
                            <br>
                            <div class="form-group">
                                <!-- Tienda -->
                                <label for="inputTienda">Tienda</label>
                                <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
                                <input type="text" class="form-control text-success" disabled value="" id="nombreTienda2" />
                                <input type="hidden" name="nombreTienda" id="nombreTienda10" />
                                <!-- Nombre -->
                                <label for="inputTienda">Nombre</label>
                                <input type="text" class="form-control text-success" disabled value="" id="nombreCliente2" />
                                <input type="hidden" name="nombreCliente" id="nombreCliente10" />
                                <!-- Cedula -->
                                <label for="inputTienda">Cédula</label>
                                <input type="text" class="form-control text-success" disabled value="" id="cedulaclienteInsert2" />
                                <input type="hidden" name="cedulaCliente" id="cedulaCliente10" />
                                <!-- Dirección -->
                                <label for="inputTienda">Dirección</label>
                                <input type="text" class="form-control text-success" disabled value="" id="direccionCliente2" />
                                <input type="hidden" name="direccionDomiciliaria" value="" id="direccionCliente10" />
                                <!-- Código -->
                                <label for="inputTienda">Código</label>
                                <input type="text" class="form-control text-success" disabled value="" id="codigoCliente2" />
                                <input type="hidden" name="codigoCliente" value="" id="codigoCliente10" />

                                <!-- Latitud -->
                                <!-- <label id="latitud5" for="exampleInputPassword1">Latitud: </label>
                                <input type="text" class="form-control text-success" disabled value="" id="latitudInsert5" /> -->
                                <input type="hidden" name="latitudInsert6" id="latitudInsert6" />

                                <!-- Longitud -->
                                <!-- <label id="longitud5" for="exampleInputPassword1">Longitud: </label>
                                <input type="text" class="form-control text-success" disabled value="" id="longitudInsert5" /> -->
                                <input type="hidden" name="longitudInsert6" id="longitudInsert6" />



                            </div>
                            <div class="form-group mt-2" id="linkmapa3">
                                <!-- <label id="Ubicación" for="exampleInputLatitud">Mapa: </label> -->
                            </div>

                            <!-- <label for="inputTienda" class="form-text text-muted">Tienda: <em class="">
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
                            </label> -->
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
                <h5 class="modal-title text-danger" id="exampleModal1Label">Envio Mensaje de Texto</h5>
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
                            <!--  -->
                            <div class="form-group" style="padding-left: 15px;">
                                <!-- Tienda -->
                                <label for="inputTienda" class="form-text text-muted">Tienda: <em class="">
                                        <input type="text" class="form-control text-success" disabled value="" id="nombreTienda" />
                                        <input type="hidden" name="nombreTienda" id="nombreTienda1" />
                                </label>
                                <!-- Nombre -->
                                <label for="inputTienda" class="form-text text-muted">Nombre: <em class="">
                                        <input type="text" class="form-control text-success" disabled value="" id="nombreCliente" />
                                        <input type="hidden" name="nombreCliente" id="nombreCliente1" />
                                </label>
                                <!-- Cédula -->
                                <label for="inputTienda" class="form-text text-muted">Cédula: <em class="">
                                        <input type="text" class="form-control text-success" disabled value="" id="cedulaclienteInsert" />
                                        <input type="hidden" name="cedulaCliente" id="cedulaCliente1" />
                                </label>
                                <!-- Dirección -->
                                <label for="inputTienda" class="form-text text-muted">Dirección: <em class="">
                                        <input type="text" class="form-control text-success" disabled value="" id="direccionCliente" />
                                        <input type="hidden" name="direccionDomiciliaria" value="" id="direccionCliente1" />
                                </label>
                                <!-- Código -->
                                <label for="inputTienda" class="form-text text-muted">Código: <em class="">
                                        <input type="text" class="form-control text-success" disabled value="" id="codigoCliente" />
                                        <input type="hidden" name="codigoCliente" value="" id="codigoCliente1" />
                                </label>
                                <!-- Celular -->
                                <label for="inputTienda" class="form-text text-muted">Celular: <em class="">
                                        <input type="text" class="form-control text-success" disabled value="" id="celular" />
                                        <input type="hidden" name="celular" id="celular1" />
                                </label>
                            </div>
                            <!--  -->
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-success">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true" style="overflow-y: scroll;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="exampleModal3Label">Detalles Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <!-- <label for="inputTienda" class="form-text text-muted"><b>Tienda: </b><em class="">
                            <input type="text" disabled value="" id="nombreTienda" /></em>
                    </label> -->
                    <label for="inputTienda" class="form-text text-muted">Tienda: <em class="">
                            <input type="text" class="form-control text-success" disabled value="" id="nombreTienda" />
                    </label>
                    <label for="inputTienda" class="form-text text-muted"><b>Fecha: </b><em class="">
                            <?php echo $today ?></em>
                    </label>
                </div>
                <div class="col-md-12">
                    <label for="inputTienda" class="form-text text-muted"><b>Nombre: </b><em class="">
                            <input type="text" class="form-control text-success" disabled value="" id="nombreCliente" /></em>
                    </label>
                    <label for="inputTienda" class="form-text text-muted"><b>Cedula: </b><em class="">
                            <input type="text" class="form-control text-success" disabled value="" id="cedulaclienteInsert" /></em>
                    </label>
                    <label for="inputTienda" class="form-text text-muted"><b>Direccion: </b><em class="">
                            <input type="text" class="form-control text-success" disabled value="" id="direccionCliente" /></em>
                    </label>
                    <label for="inputTienda" class="form-text text-muted"><b>Codigo: </b><em class="">
                            <input type="text" class="form-control text-success" disabled value="" id="codigoCliente" /></em>
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
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="tipovivienda" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Persona de la verificación: </b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="verificapersona" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Residencia minima de 3 meses: </b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="residencia3" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Local o terreno propio: </b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="terrenopropio" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Local o terreno arrendado: </b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="terrenoarrendado" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Planilla de servicio basico: </b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="planillabasica" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Seguridad en puertas y ventanas: </b>

                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="seguridadpv" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Muebleria basica: </b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="muebleria" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Material casa: </b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="materialdecasa" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Periodicidad de actividades laborales:</b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="periodolab" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Confirmación de información con vecinos:</b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="confirmavec" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Nombre vecino: </b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="nombrevec" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Celular vecino:</b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="celularvec" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Latitud:</b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="lati" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Longitud:</b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="longi" style="width:25rem;" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputTienda" class="text"><b>Fecha de la verificación:</b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control text-success text-center" disabled value="" id="fechaverifica" style="width:25rem;" />
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