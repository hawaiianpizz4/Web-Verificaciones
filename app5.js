console.log("app5.js");


function onChangeSelect2() {
    var option_value0 = document.getElementById("tipoUsuario").value;
    var option_value1 = document.getElementById("formularioViviendaArrendada");
    var option_value2 = document.getElementById("formularioViviendaArrendada2");
    var option_value3 = document.getElementById("formularioViviendaArrendada3");
    switch(option_value0){
        case "Seleccionar":
        option_value1.innerHTML = ``;
        break;
        case "Dependiente":
            option_value1.innerHTML = `
            <div class="col-md-12 mt-2 mb-4">
                <label for="inputdescripcion" class="form-label"><strong>Tipo de Vivienda <font color="red">*</font></strong></label>
                <select name="tipovivienda" required id="tipovivienda" onchange="onChangeSelect3()" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Propia">Propia</option>
                    <option value="Familiar">Familiar</option>
                    <option value="Arrendada">Arrendada</option>
                </select>
            </div>
            
            <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Persona con quien realizara la verificación <font color="red">*</font></strong></span>
            <select name="persona" required id="persona" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="titular">Titular</option>
                <option value="Familiar">Familiar</option>
            </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Residencia minima de 3 meses <font color="red">*</font></strong></span>
                <select name="residenciaminimo" required id="residenciaminimo" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Local o terreno propio <font color="red">*</font></strong></span>
                <select name="localterrenop" required id="residenciaminimo" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Local o terreno arrendado <font color="red">*</font></strong></span>
                <select name="localterrearrendado" required id="residenciaminimo" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Planilla de servicio basico<font color="red">*</font></strong></span>
                <select name="serviciobasico" required id="serviciobasico" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4" id="imagenplanillaserviciobasico">
                <span class="details"><strong>Foto planilla servicio basico<font color="red">*</font></strong></span>
                <br>
                <input type="file" name="imagen1" accept="image/*" /></p>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Seguridad en puertas y ventanas<font color="red">*</font></strong></span>
                <select name="seguridad" required id="seguridad" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Muebleria basica<font color="red">*</font></strong></span>
                <select name="muebleria" required id="muebleria" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Material casa<font color="red">*</font></strong></span>
                <select name="material" required id="material" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Cemento">Cemento</option>
                    <option value="Madera">Madera</option>
                    <option value="Caña">Caña</option>
                </select>
            </div>

            <div class="col-md-12 mt-2 mb-4">
                <label for="inputdescripcion" class="form-label"><strong>Periodicidad de actividades laborales<font color="red">*</font></strong></label>
                <select name="periodicidad" required id="periodicidad" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Diaria">Diaria</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Mensual">Mensual</option>
                    <option value="Quincenal">Quincenal</option>
                    <option value="Fin de semana">Fin de semana</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Confirmación de información con vecinos<font color="red">*</font></strong></span>
                <select name="confirmacionInfoVecinos" required id="confirmacion" onchange="onChangeSelect()" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4" id="confirmacionveci">

            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Estabilidad laboral mayor 6 meses(Subir documento)<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen2" accept="image/*" /></p>
                <!-- </form> -->
            </div>

            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Facturas de proveedores últimos 3 meses(Subir Foto)<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen3" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto de la fachada de la empresa o del domicilio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen4" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto del interior de la empresa o del domicilio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen5" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto cliente dentro de la empresa o dentro del domicilio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen6" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto cliente fuera de la empresa o fuera del domicilio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen7" accept="image/*" /></p>
                <!-- </form> -->
            </div> `;
            
            option_value2.innerHTML=`
            <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Título de propiedad garante o codeudor(Foto)<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen8" accept="image/*" /></p>
            <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto del Impuesto predial<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen9" accept="image/*" /></p>
            <!-- </form> -->
            </div>`;

            option_value3.innerHTML=`<div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto del respaldo de ingresos(Solo transferencias bancarias o cheques)<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen10" accept="image/*" /></p>
            <!-- </form> -->
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto del certificado laboral<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST"> -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen11" accept="image/*" /></p>
            <!-- </form> -->
        </div>`;
        break;
        case "Independiente":
            option_value1.innerHTML = ` 
            <div class="col-md-12 mt-2 mb-4">
                <label for="inputdescripcion" class="form-label"><strong>Tipo de Vivienda <font color="red">*</font></strong></label>
                <select name="tipovivienda" required id="tipovivienda" onchange="onChangeSelect3()" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Propia">Propia</option>
                    <option value="Familiar">Familiar</option>
                    <option value="Arrendada">Arrendada</option>
                </select>
            </div>

            <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Persona con quien realizara la verificación <font color="red">*</font></strong></span>
            <select name="persona" required id="persona" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="titular">Titular</option>
                <option value="Familiar">Familiar</option>
            </select>
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Residencia minima de 3 meses <font color="red">*</font></strong></span>
            <select name="residenciaminimo" required id="residenciaminimo" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Local o terreno propio <font color="red">*</font></strong></span>
            <select name="localterrenop" required id="residenciaminimo" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Local o terreno arrendado <font color="red">*</font></strong></span>
            <select name="localterrearrendado" required id="residenciaminimo" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Planilla de servicio basico<font color="red">*</font></strong></span>
            <select name="serviciobasico" required id="serviciobasico" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-12 mt-2 mb-4" id="imagenplanillaserviciobasico">
            <span class="details"><strong>Foto planilla servicio basico<font color="red">*</font></strong></span>
            <br>
            <input type="file" name="imagen1" accept="image/*" /></p>
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Seguridad en puertas y ventanas<font color="red">*</font></strong></span>
            <select name="seguridad" required id="seguridad" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Muebleria basica<font color="red">*</font></strong></span>
            <select name="muebleria" required id="muebleria" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Material casa<font color="red">*</font></strong></span>
            <select name="material" required id="material" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="Cemento">Cemento</option>
                <option value="Madera">Madera</option>
                <option value="Caña">Caña</option>
            </select>
        </div>

        <div class="col-md-12 mt-2 mb-4">
            <label for="inputdescripcion" class="form-label"><strong>Periodicidad de actividades laborales<font color="red">*</font></strong></label>
            <select name="periodicidad" required id="periodicidad" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="Propia">Diario</option>
                <option value="Familiar">Semanal</option>
                <option value="Arrendada">Quincenal</option>
                <option value="Fin de semana">Fin de semana</option>
            </select>
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Confirmación de información con vecinos<font color="red">*</font></strong></span>
            <select name="confirmacionInfoVecinos" required id="confirmacion" onchange="onChangeSelect()" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-12 mt-2 mb-4" id="confirmacionveci">

        </div>

        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Facturas de proveedores últimos 3 meses(Subir Foto)<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen3" accept="image/*" /></p>
            <!-- </form> -->
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto de la fachada del negocio<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen4" accept="image/*" /></p>
            <!-- </form> -->
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto del interior del negocio<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen5" accept="image/*" /></p>
            <!-- </form> -->
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto cliente dentro del negocio<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen6" accept="image/*" /></p>
            <!-- </form> -->
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto cliente fuera del negocio<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen7" accept="image/*" /></p>
            <!-- </form> -->
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Respaldo de ingresos(Solo transferencias bancarias o cheques)<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen10" accept="image/*" /></p>
            <!-- </form> -->
        </div>
        <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto del interior del domicilio(Subir Foto)<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen12" accept="image/*" /></p>
            <!-- </form> -->
        </div>`;
        break;
        case "Informal": 
            option_value1.innerHTML = `
            <div class="col-md-12 mt-2 mb-4">
                <label for="inputdescripcion" class="form-label"><strong>Tipo de Vivienda <font color="red">*</font></strong></label>
                <select name="tipovivienda" required id="tipovivienda" onchange="onChangeSelect3()" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Propia">Propia</option>
                    <option value="Familiar">Familiar</option>
                    <option value="Arrendada">Arrendada</option>
                </select>
            </div>
            
            <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Persona con quien realizara la verificación <font color="red">*</font></strong></span>
            <select name="persona" required id="persona" class="form-select">
                <option selected value="Seleccionar">Seleccionar</option>
                <option value="titular">Titular</option>
                <option value="Familiar">Familiar</option>
            </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Residencia minima de 3 meses <font color="red">*</font></strong></span>
                <select name="residenciaminimo" required id="residenciaminimo" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Local o terreno propio <font color="red">*</font></strong></span>
                <select name="localterrenop" required id="residenciaminimo" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Local o terreno arrendado <font color="red">*</font></strong></span>
                <select name="localterrearrendado" required id="residenciaminimo" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Planilla de servicio basico<font color="red">*</font></strong></span>
                <select name="serviciobasico" required id="serviciobasico" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4" id="imagenplanillaserviciobasico">
                <span class="details"><strong>Foto planilla servicio basico<font color="red">*</font></strong></span>
                <br>
                <input type="file" name="imagen1" accept="image/*" /></p>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Seguridad en puertas y ventanas<font color="red">*</font></strong></span>
                <select name="seguridad" required id="seguridad" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Muebleria basica<font color="red">*</font></strong></span>
                <select name="muebleria" required id="muebleria" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Material casa<font color="red">*</font></strong></span>
                <select name="material" required id="material" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Cemento">Cemento</option>
                    <option value="Madera">Madera</option>
                    <option value="Caña">Caña</option>
                </select>
            </div>

            <div class="col-md-12 mt-2 mb-4">
                <label for="inputdescripcion" class="form-label"><strong>Periodicidad de actividades laborales<font color="red">*</font></strong></label>
                <select name="periodicidad" required id="periodicidad" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Diaria">Diaria</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Mensual">Mensual</option>
                    <option value="Quincenal">Quincenal</option>
                    <option value="Fin de semana">Fin de semana</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Confirmación de información con vecinos<font color="red">*</font></strong></span>
                <select name="confirmacionInfoVecinos" required id="confirmacion" onchange="onChangeSelect()" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4" id="confirmacionveci">

            </div>

            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Facturas de proveedores últimos 3 meses(Subir Foto)<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen3" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto de la fachada de la empresa o del domicilio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen4" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto del interior de la empresa o del domicilio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen5" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto cliente dentro de la empresa o dentro del domicilio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen6" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto cliente fuera de la empresa o fuera del domicilio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen7" accept="image/*" /></p>
                <!-- </form> -->
            </div>`;

            option_value2.innerHTML=`<div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Título de propiedad garante o codeudor(Foto)<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen8" accept="image/*" /></p>
            <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto del Impuesto predial<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen9" accept="image/*" /></p>
            <!-- </form> -->
            </div>`;
            option_value3.innerHTML=`
            <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto del respaldo de ingresos(Solo transferencias bancarias o cheques)<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen10" accept="image/*" /></p>
            <!-- </form> -->
            </div>`;
        break;
        // case "No": 
        // option_value1.innerHTML=``;
        //     break;
        default:
                // select_value.innerHTML='';
                option_value1.innerHTML=`<div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Persona con quien realizara la verificación <font color="red">*</font></strong></span>
                <select name="persona" required id="persona" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="titular">Titular</option>
                    <option value="Familiar">Familiar</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Residencia minima de 3 meses <font color="red">*</font></strong></span>
                <select name="residenciaminimo" required id="residenciaminimo" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Local o terreno propio <font color="red">*</font></strong></span>
                <select name="localterrenop" required id="residenciaminimo" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Local o terreno arrendado <font color="red">*</font></strong></span>
                <select name="localterrearrendado" required id="residenciaminimo" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Planilla de servicio basico<font color="red">*</font></strong></span>
                <select name="serviciobasico" required id="serviciobasico" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4" id="imagenplanillaserviciobasico">
                <span class="details"><strong>Foto planilla servicio basico<font color="red">*</font></strong></span>
                <br>
                <input type="file" name="imagen1" accept="image/*" /></p>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Seguridad en puertas y ventanas<font color="red">*</font></strong></span>
                <select name="seguridad" required id="seguridad" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Muebleria basica<font color="red">*</font></strong></span>
                <select name="muebleria" required id="muebleria" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Material casa<font color="red">*</font></strong></span>
                <select name="material" required id="material" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Cemento">Cemento</option>
                    <option value="Madera">Madera</option>
                    <option value="Caña">Caña</option>
                </select>
            </div>

            <div class="col-md-12 mt-2 mb-4">
                <label for="inputdescripcion" class="form-label"><strong>Periodicidad de actividades laborales<font color="red">*</font></strong></label>
                <select name="periodicidad" required id="periodicidad" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Propia">Diario</option>
                    <option value="Familiar">Semanal</option>
                    <option value="Arrendada">Quincenal</option>
                    <option value="Fin de semana">Fin de semana</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Confirmación de información con vecinos<font color="red">*</font></strong></span>
                <select name="confirmacionInfoVecinos" required id="confirmacion" onchange="onChangeSelect()" class="form-select">
                    <option selected value="Seleccionar">Seleccionar</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-12 mt-2 mb-4" id="confirmacionveci">

            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Estabilidad laboral mayor 6 meses(Subir documento)<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen2" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto de la fachada del negocio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen4" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto del interior del negocio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen5" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto cliente dentro del negocio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen6" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto cliente fuera del negocio<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen7" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Título de propiedad garante o codeudor(Foto)<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen8" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Impuesto predial<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen9" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Respaldo de ingresos(Solo transferencias bancarias o cheques)<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen10" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Certificado laboral(Subir documento)<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST"> -->
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen11" accept="image/*" /></p>
                <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
                <span class="details"><strong>Foto del interior del domicilio(Subir Foto)<font color="red">*</font></strong></span>
                <br>
                <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
                <input type="file" name="imagen12" accept="image/*" /></p>
                <!-- </form> -->
            </div>`;
        break;

    }
}




function onChangeSelect3() {
    var option_value01 = document.getElementById("tipovivienda").value;
    var option_value2 = document.getElementById("formularioViviendaArrendada2");
    switch(option_value01){
        case "Propia":
            option_value2.innerHTML=`<div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Título de propiedad garante o codeudor(Foto)<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen8" accept="image/*" /></p>
            <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto del Impuesto predial<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen9" accept="image/*" /></p>
            <!-- </form> -->
            </div>`;
        break;
        case "Familiar":
            option_value2.innerHTML=`<div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Título de propiedad garante o codeudor(Foto)<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen8" accept="image/*" /></p>
            <!-- </form> -->
            </div>
            <div class="col-md-12 mt-2 mb-4">
            <span class="details"><strong>Foto del Impuesto predial<font color="red">*</font></strong></span>
            <br>
            <!-- <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" /> -->
            <input type="file" name="imagen9" accept="image/*" /></p>
            <!-- </form> -->
            </div>`;
        break;
        case "Arrendada":
            option_value2.innerHTML=``;
        break;
    }
}

