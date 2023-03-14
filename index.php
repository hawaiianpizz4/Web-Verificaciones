<?php
include('./Control/connection.php');
require_once '/var/www/html/ventaspdv/seguridad/rol-menu_agencia.php';
require('/var/www/html/ventaspdv/seguridad/urlactual.php');
include('/var/www/html/ventaspdv/formVivienda/Control/usuCarga.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style2.css">
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="app.js"></script>
  <script src="app2.js"></script>
  <script src="app3.js"></script>
  <!-- Mapa -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD79WG_XsriNcEow-JxBtrdGdfpY32UFgU"></script>

  <link rel="stylesheet" href="stylemapa.css">

  <!-- Favico -->
  <link rel="shortcut icon" href="#">
</head>
<!--  -->

<body>
  <?php
  if (isset($_GET['message'])) {
    if ($_GET['message'] == 'exito') {
      echo "<script> success(); </script>";
    } elseif ($_GET['message'] == 'select') {
      echo "<script> select() </script>";
    } else if($_GET['message'] == 'errorcedula'){
      echo "<script> errorcedula()() </script>";
    }
    else {
      echo "<script> fail(); </script>";
    }
  }
  ?>
  <div class="container">
    <div class="content">
      <form name="datos" id="datos" method="post" action="./Control/contact.php">
        <div class="title">Datos</div>
        <div class="user-details">
          <!-- <div class="input-box">
            <span class="details">Nombre del CLIENTE <font color="red">*</font></span>
            <input name="nombreCliente" type="text" placeholder="Ingrese nombre del Cliente" onkeypress="if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
            event.returnValue = false;" required>
          </div>
          <div class="input-box">
            <span class="details">Cédula Identidad del CLIENTE <font color="red">*</font></span>
            <input name="cedulaCliente" type="text" placeholder="Ingrese Cédula del Cliente" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                event.returnValue = false;" maxlength="10" required>
          </div> -->

          <div class="col-md-12 mt-2 mb-4">
            <label for="inputdescripcion" class="form-label"><strong>Flujo de Ingresos <font color="red">*</font></strong></label>
            <select name="flujoIngresos" required id="flujoIngresos" onchange="onChangeSelect()" name="flujoIngresos" class="form-select">
              <option selected value="Seleccionar">Seleccionar</option>
              <option value="Diario">Diario</option>
              <option value="Semanal">Semanal</option>
              <option value="Mensual">Mensual</option>
              <option value="Bi-Mensual">Bi-Mensual</option>
              <option value="Semestral">Semestral</option>
            </select>
          </div>

          <div class="input-box">
            <span class="details">Ingresos Mínimos <font color="red">*</font></span>
            <input name="text1" type="text" placeholder="Ingresos mínimos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                event.returnValue = false;" maxlength="10" onkeyup="pierdeFoco(this)" required />
          </div>
          <div class="input-box">
            <span class="details">Ingresos Máximos<font color="red">*</font></span>
            <input name="text2" type="text" placeholder="Ingresos máximos" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                event.returnValue = false;" maxlength="10" onkeyup="pierdeFoco(this)" required>
          </div>
          <div class="input-box">
            <span class="details">Promedio</span>
            <input name="resultado" id="resultado" type="text" size="10" value="0" maxlength="10" disabled>
            <input name="promedio" id="promedio" type="hidden" size="10" value="0" maxlength="10">
          </div>

          <!-- <div class="input-box">
            <span class="details">Nombre del CLIENTE <font color="red">*</font></span>
            <input name="nombreCliente" type="text" placeholder="Ingrese nombre del Cliente" onkeypress="if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
            event.returnValue = false;" required>
          </div>
          <div class="input-box">
            <span class="details">Cédula Identidad del CLIENTE <font color="red">*</font></span>
            <input name="cedulaCliente" type="text" placeholder="Ingrese Cédula del Cliente" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                event.returnValue = false;" maxlength="10" required>
          </div>
          <div class="input-box">
            <span class="details">Cédula Identidad del CLIENTE <font color="red">*</font></span>
            <input name="cedulaCliente" type="text" placeholder="Ingrese Cédula del Cliente" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                event.returnValue = false;" maxlength="10" required>
          </div>
          <div class="input-box">
            <span class="details">Cédula Identidad del CLIENTE <font color="red">*</font></span>
            <input name="cedulaCliente" type="text" placeholder="Ingrese Cédula del Cliente" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                                event.returnValue = false;" maxlength="10" required>
          </div> -->

          <!-- <div class="input-box">
                <span class="details">Lugar a verificar *</span>
                <input type="text" placeholder="Enter your password" required>
              </div> -->

        </div>

        <label for="inputdescripcion" class="form-label"><strong>Meses de mayor ingreso ecónomico<font color="red">*</font></strong></label>
        <div class="col-auto p-3" id="checkBoxes" name="checkboxDatos">
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Enero" id="check1" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Enero
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Febrero" id="check2" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Febrero
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Marzo" id="check3" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Marzo
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Abril" id="check3" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Abril
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Mayo" id="check3" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Mayo
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Junio" id="check3" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Junio
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Julio" id="check3" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Julio
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Agosto" id="check3" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Agosto
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Septiembre" id="check3" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Septiembre
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Octubre" id="check3" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Octubre
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Noviembre" id="check3" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Noviembre
            </label>
          </div>
          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Diciembre" id="check3" name="check_list[]">
            <label class="form-check-label" for="flexCheckDefault">
              Diciembre
            </label>
          </div>
        </div>








        <div class="title">Verificaciones Físicas </div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nombre de la tienda <font color="red">*</font></span>
            <input name="nombreTienda1" type="text" value="<?php echo $local ?>" disabled>
            <input name="nombreTienda" type="hidden" value="<?php echo $local ?>">
            <input name="codigoTienda" type="hidden" value="<?php echo $codlocal ?>">
          </div>
          <div class="input-box">
            <span class="details">Nombre del VENDEDOR <font color="red">*</font></span>
            <input type="text" name="nombreVendedor1" value="<?php echo $_SESSION["USERNAME"] ?>" disabled>
            <input type="hidden" name="nombreVendedor" value="<?php echo $_SESSION["USERNAME"] ?>">
          </div>
          <div class="input-box">
            <span class="details">Nombre del CLIENTE <font color="red">*</font></span>
            <input name="nombreCliente" type="text" placeholder="Ingrese nombre del Cliente" onkeypress="if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
            event.returnValue = false;"  onkeyup="mayus(this);" required>
          </div>
          <div class="input-box">
            <span class="details">Cédula Identidad del CLIENTE <font color="red">*</font></span>
            <input name="cedulaCliente" type="text" placeholder="Ingrese Cédula del Cliente" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                  event.returnValue = false;" minlength="10" maxlength="10" required>
          </div>
          <div class="input-box">
            <span class="details">Teléfono celular principal del cliente (09...) <font color="red">*</font> </span>
            <input name="numeroCelularCliente" type="text" placeholder="Número de celular del cliente" required minlength="10" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
          </div>

          <div class="input-box">
            <span class="details">Teléfono celular secundario del cliente (09...)</span>
            <input name="numeroCelularCliente2" type="text" placeholder="Número de celular del cliente" minlength="10" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
          </div>




        </div>


        <div class="col-md-12">
          <label for="inputdescripcion" class="form-label"><strong>Lugar a verificar <font color="red">*</font></strong></label>
          <select name="lugaraVerificar" id="tipoGestion" onchange="onChangeSelect()" name="tipoGestion" class="form-select">
            <option selected value="Seleccionar">Seleccionar</option>
            <option value="Domicilio">Domicilio</option>
            <option value="Negocio">Negocio</option>
            <option value="NegoDomiDiferente">Negocio-Domicilio (DIFERENTE LUGAR)</option>
            <option value="NegoDomiMismo">Negocio-Domicilio (MISMO LUGAR)</option>
          </select>
        </div>
        <div id="content-titulo2">

        </div>

        <div class="user-details" id="insertNewForm">
          <!-- <div class="input-box">
                  <span class="details">Nombre de la tienda <font color="red">*</font></span>
                  <input type="text" placeholder="Enter your name" required>
                </div>
                 
                <div class="input-box">
                  <span class="details">Nombre del VENDEDOR <font color="red">*</font></span>
                  <input type="text" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                  <span class="details">Nombre del CLIENTE <font color="red">*</font></span>
                  <input type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                  <span class="details">Cédula de Identidad del CLIENTE <font color="red">*</font></span>
                  <input type="text" placeholder="Enter your number" required>
                </div> -->

          <!-- <div class="input-box">
                  <span class="details">Lugar a verificar <font color="red">*</font></span>
                  <input type="text" placeholder="Enter your password" required>
                </div> -->
        </div>


        <div class="user-details" id="insertNewForm">
          <!-- <div class="input-box">
                  <span class="details">Nombre de la tienda <font color="red">*</font></span>
                  <input type="text" placeholder="Enter your name" required>
                </div>
                 
                <div class="input-box">
                  <span class="details">Nombre del VENDEDOR <font color="red">*</font></span>
                  <input type="text" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                  <span class="details">Nombre del CLIENTE <font color="red">*</font></span>
                  <input type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                  <span class="details">Cédula de Identidad del CLIENTE <font color="red">*</font></span>
                  <input type="text" placeholder="Enter your number" required>
                </div> -->

          <!-- <div class="input-box">
                  <span class="details">Lugar a verificar <font color="red">*</font></span>
                  <input type="text" placeholder="Enter your password" required>
                </div> -->
        </div>








        <div class="user-details" id="insertNewForm2">


        </div>





        <!-- <div class="gender-details">
              <input type="radio" name="gender" id="dot-1">
              <input type="radio" name="gender" id="dot-2">
              <input type="radio" name="gender" id="dot-3">
              <span class="gender-title">Gender</span>
              <div class="category">
                <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">Prefer not to say</span>
                </label>
              </div>
            </div> -->

        <div class="title">Mapa</div>

        <label for="inputdescripcion" class="form-label"><strong>Dirección Exacta <font color="red">*</font></strong></label>

        <div class="form-group input-group">
          <input type="text" id="search_location" class="form-control" placeholder="Calle - Ciudad" required>
          <div class="input-group-btn">
            <!-- <button class="btn btn-default get_map" type="submit">
              Locate
            </button> -->
          </div>
        </div>
        <br>
        <br>
        <!-- display google map -->
        <div id="geomap"></div>
        <div class="user-details">
          <!-- display selected location information -->
          <h4>Detalles de Información de Localización</h4>
          <div class="input-box">
            <span class="details">Dirección</span>
            <input name="referenciaDomiciliaria1" type="text" class="search_addr" size="45" disabled>
            <input name="referenciaDomiciliaria" type="hidden" class="search_addr" size="45">
          </div>
          <div class="input-box">
            <span class="details">Latitud</span>
            <input name="latitud1" type="text" class="search_latitude" size="50" disabled>
            <input name="latitud" type="hidden" class="search_latitude" size="50">
          </div>
          <div class="input-box">
            <span class="details">Longitud</span>
            <input name="longitud1" type="text" class="search_longitude" size="50" disabled>
            <input name="longitud" type="hidden" class="search_longitude" size="50">
          </div>

          <!-- <div class="input-box">
            <span class="details">Ciudad</span>
            <input name="ciudad" type="text" class="search_ciudad" size="50" disabled>
            <input name="ciudad" type="hidden" class="search_ciudad" size="50">
          </div> -->

          <div class="input-box">
            <span class="details">Referencia Domiciliaria <font color="red">*</font></span>
            <input name="referenciaDomicilio" type="text" placeholder="Referencia del domicilio del cliente" onkeyup="mayus(this);" equired>
          </div>
          <div class="input-box">
            <span class="details">Sector del domicilio del cliente <font color="red">*</font></span>
            <input name="sectorDomicilio" type="text" placeholder="Sector del domicilio del cliente" onkeypress="if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
                        event.returnValue = false;" onkeyup="mayus(this);" required>
          </div>
          <div class="input-box">
            <span class="details">Ciudad de residencia <font color="red">*</font></span>
            <input name="ciudadResidencia" type="text" placeholder="Ciudad de residencia del cliente" onkeypress="if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
                        event.returnValue = false;" onkeyup="mayus(this);" required>
          </div>
        </div>

        <div class="button">
          <input type="submit" name="submit" value="Guardar">
        </div>

      </form>
    </div>
  </div>
  <script>
    let form = document.forms.datos;

    form.text1.oninput = sumatoria;
    form.text2.oninput = sumatoria;

    function sumatoria() {
      let num1 = +form.text1.value;
      if (!num1) return;

      let num2 = +form.text2.value;
      if (!num2) return;

      let result = Math.round((num1 + num2) / 2);

      document.datos.resultado.value = result;
      document.datos.promedio.value = result;
    }
    // function pierdeFoco(e){
    //   var valor = e.value.replace(/^0*/, '');
    //   e.value = valor;
    // }
    // pierdeFoco();
    sumatoria();

    function mayus(e) {

      e.value = e.value.toUpperCase();

    }
  </script>
  <script src="mapa.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>