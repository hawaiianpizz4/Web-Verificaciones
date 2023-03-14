function editar(este) {
  var ModalEdit = new bootstrap.Modal(EditModal, {}).show();
  console.log(este);
  variable.innerHTML = "Cedula : " + este.id;
  nombre.innerHTML = "Nombre : " + este.value;
  celular2.innerHTML = "Celular : " + este.name;
  latitud.innerHTML = "Latitud : " + este.latitud;
  longitud.innerHTML = "Longitud : " + este.longitud;
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
function buscar4() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable4");
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
function buscar5() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput5");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable5");
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
var exampleModal = document.getElementById("exampleModal");
exampleModal.addEventListener("show.bs.modal", function (event) {
  var button = event.relatedTarget;
  var cedula3 = button.getAttribute("data-bs-cedula3");
  var nombre3 = button.getAttribute("data-bs-nombre3");
  var celular3 = button.getAttribute("data-bs-celular3");
  var latitud3 = button.getAttribute("data-bs-latitud3");
  var longitud3 = button.getAttribute("data-bs-longitud3");
  var cedulaInsert = exampleModal.querySelector("#cedulaInsert3");
  var nombreInsert = exampleModal.querySelector("#nombreInsert3");
  var celularInsert = exampleModal.querySelector("#celularInsert3");
  var latitudInsert = exampleModal.querySelector("#latitudInsert3");
  var longitudInsert = exampleModal.querySelector("#longitudInsert3");
  var cedulaInsert1 = exampleModal.querySelector("#cedulaInsert4");
  var nombreInsert1 = exampleModal.querySelector("#nombreInsert4");
  var celularInsert1 = exampleModal.querySelector("#celularInsert4");
  var latitudInsert1 = exampleModal.querySelector("#latitudInsert4");
  var longitudInsert1 = exampleModal.querySelector("#longitudInsert4");
  
  var mapa = exampleModal.querySelector("#linkmapa2");
  mapa.innerHTML = `<a href='https://maps.google.com/?q=${latitud3.trim()},${longitud3.trim()}' target="_blank">Ubicación Google Maps</a>`;

  cedulaInsert.value = cedula3;
  nombreInsert.value = nombre3;
  celularInsert.value = celular3;
  // latitudInsert.value = latitud3;
  // longitudInsert.value = longitud3;
  cedulaInsert1.value = cedula3;
  nombreInsert1.value = nombre3;
  celularInsert1.value = celular3;
  latitudInsert1.value = latitud3;
  longitudInsert1.value = longitud3;
});


var exampleModal1 = document.getElementById("exampleModal1");
exampleModal1.addEventListener("show.bs.modal", function (event) {
  var button = event.relatedTarget;
  var cedula10 = button.getAttribute("data-bs-cedula");
  var nombre10 = button.getAttribute("data-bs-nombre");
  var direccion10 = button.getAttribute("data-bs-direccion");
  var codigo10 = button.getAttribute("data-bs-codigo");
  var tienda10 = button.getAttribute("data-bs-tienda");
  var latitud4 = button.getAttribute("data-bs-latitud4");
  var longitud4 = button.getAttribute("data-bs-longitud4");
  var nombreInsert = exampleModal1.querySelector("#nombreCliente2");
  var cedulaInsert = exampleModal1.querySelector("#cedulaclienteInsert2");
  var direccionInsert = exampleModal1.querySelector("#direccionCliente2");
  var codigoInsert = exampleModal1.querySelector("#codigoCliente2");
  var tiendaInsert = exampleModal1.querySelector("#nombreTienda2");
  var nombreInsert1 = exampleModal1.querySelector("#nombreCliente10");
  var cedulaInsert1 = exampleModal1.querySelector("#cedulaCliente10");
  var direccionInsert1 = exampleModal1.querySelector("#direccionCliente10");
  var codigoInsert1 = exampleModal1.querySelector("#codigoCliente10");
  var tiendaInsert1 = exampleModal1.querySelector("#nombreTienda10");
  // var latitudInsert2 = exampleModal1.querySelector("#latitudInsert5");
  // var longitudInsert2 = exampleModal1.querySelector("#longitudInsert5");


  var mapa = exampleModal1.querySelector("#linkmapa3");
  mapa.innerHTML = `<a href='https://maps.google.com/?q=${latitud4.trim()},${longitud4.trim()}' target="_blank">Ubicación Google Maps</a>`;


  nombreInsert.value = nombre10;
  cedulaInsert.value = cedula10;
  direccionInsert.value = direccion10;
  codigoInsert.value = codigo10;
  tiendaInsert.value = tienda10;
  nombreInsert1.value = nombre10;
  cedulaInsert1.value = cedula10;
  direccionInsert1.value = direccion10;
  codigoInsert1.value = codigo10;
  tiendaInsert1.value = tienda10;

  // latitudInsert2.value = latitud4;
  // longitudInsert2.value = longitud4;
});
var exampleModal2 = document.getElementById("exampleModal2");
exampleModal2.addEventListener("show.bs.modal", function (event) {
  var button = event.relatedTarget;
  var cedula = button.getAttribute("data-bs-cedula");
  var nombre = button.getAttribute("data-bs-nombre");
  var direccion = button.getAttribute("data-bs-direccion");
  var codigo = button.getAttribute("data-bs-codigo");
  var tienda = button.getAttribute("data-bs-tienda");
  var celular = button.getAttribute("data-bs-celular");
  var nombreInsert = exampleModal2.querySelector("#nombreCliente");
  var cedulaInsert = exampleModal2.querySelector("#cedulaclienteInsert");
  var direccionInsert = exampleModal2.querySelector("#direccionCliente");
  var codigoInsert = exampleModal2.querySelector("#codigoCliente");
  var tiendaInsert = exampleModal2.querySelector("#nombreTienda");
  var telefonoInsert = exampleModal2.querySelector("#celular");
  var nombreInsert2 = exampleModal2.querySelector("#nombreCliente1");
  var cedulaInsert2 = exampleModal2.querySelector("#cedulaCliente1");
  var direccionInsert2 = exampleModal2.querySelector("#direccionCliente1");
  var codigoInsert2 = exampleModal2.querySelector("#codigoCliente1");
  var tiendaInsert2 = exampleModal2.querySelector("#nombreTienda1");
  var telefonoInsert2 = exampleModal2.querySelector("#celular1");
  nombreInsert.value = nombre;
  cedulaInsert.value = cedula;
  direccionInsert.value = direccion;
  codigoInsert.value = codigo;
  tiendaInsert.value = tienda;
  telefonoInsert.value = celular;
  nombreInsert2.value = nombre;
  cedulaInsert2.value = cedula;
  direccionInsert2.value = direccion;
  codigoInsert2.value = codigo;
  tiendaInsert2.value = tienda;
  telefonoInsert2.value = celular;
});

var exampleModal3 = document.getElementById("exampleModal3");
exampleModal3.addEventListener("show.bs.modal", function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  // Extract info from data-bs-* attributes
  var cedula = button.getAttribute("data-bs-cedula");
  var nombre = button.getAttribute("data-bs-nombre");
  var direccion = button.getAttribute("data-bs-direccion");
  var codigo = button.getAttribute("data-bs-codigo");
  var tienda = button.getAttribute("data-bs-tienda");
  var viviendatipo = button.getAttribute("data-bs-viviendatipo");
  var personaverificacion = button.getAttribute("data-bs-personaverificacion");
  var residencia3 = button.getAttribute("data-bs-residencia3");
  var terrenopropio = button.getAttribute("data-bs-terrenopropio");
  var terrenoarrendado = button.getAttribute("data-bs-terrenoarrendado");
  var planillabasica = button.getAttribute("data-bs-planillabasica");
  var seguridadpv = button.getAttribute("data-bs-seguridadpv");
  var muebleria = button.getAttribute("data-bs-muebleria");
  var materialdecasa = button.getAttribute("data-bs-materialdecasa");
  var periodolaboral = button.getAttribute("data-bs-periodolaboral");
  var conformavecino = button.getAttribute("data-bs-conformavecino");
  var nombrevecino = button.getAttribute("data-bs-nombrevecino");
  var celularvecino = button.getAttribute("data-bs-celularvecino");
  var lati = button.getAttribute("data-bs-lati");
  var longi = button.getAttribute("data-bs-longi");
  var fechaverifica = button.getAttribute("data-bs-fechaverifica");
  var fotoplanilla = button.getAttribute("data-bs-fotoplanilla");
  var fotoestabilidadLaboraSeisMesesImagen = button.getAttribute(
    "data-bs-fotoestabilidadLaboraSeisMesesImagen"
  );
  var fotofacturasProveedoresUltimosTresMesesImagen = button.getAttribute(
    "data-bs-fotofacturasProveedoresUltimosTresMesesImagen"
  );
  var fotofachadaDelNegocioImagen = button.getAttribute(
    "data-bs-fotofachadaDelNegocioImagen"
  );
  var fotointeriorDelNegocioImagen = button.getAttribute(
    "data-bs-fotointeriorDelNegocioImagen"
  );
  var fotoclienteDentroDelNegocioImagen = button.getAttribute(
    "data-bs-fotoclienteDentroDelNegocioImagen"
  );
  var fotoclienteFueraDelNegocioImagen = button.getAttribute(
    "data-bs-fotoclienteFueraDelNegocioImagen"
  );
  var fototituloPropiedaGaranteOCodeudorImagen = button.getAttribute(
    "data-bs-fototituloPropiedaGaranteOCodeudorImagen"
  );
  var fotoimpuestoPredialImagen = button.getAttribute(
    "data-bs-fotoimpuestoPredialImagen"
  );
  var fotorespaldoIngresosImagen = button.getAttribute(
    "data-bs-fotorespaldoIngresosImagen"
  );
  var fotocertificadoLaboralImagen = button.getAttribute(
    "data-bs-fotocertificadoLaboralImagen"
  );
  var fotointeriorDomicilioImagen = button.getAttribute(
    "data-bs-fotointeriorDomicilioImagen"
  );

  // Update the modal's content.

  var nombreInsert = exampleModal3.querySelector("#nombreCliente");
  var cedulaInsert = exampleModal3.querySelector("#cedulaclienteInsert");
  var direccionInsert = exampleModal3.querySelector("#direccionCliente");
  var codigoInsert = exampleModal3.querySelector("#codigoCliente");
  var tiendaInsert = exampleModal3.querySelector("#nombreTienda");
  var viviendatipoInsert = exampleModal3.querySelector("#tipovivienda");
  var personaverificacionInsert =
    exampleModal3.querySelector("#verificapersona");
  var residencia3Insert = exampleModal3.querySelector("#residencia3");
  var terrenopropioInsert = exampleModal3.querySelector("#terrenopropio");
  var terrenoarrendadoInsert = exampleModal3.querySelector("#terrenoarrendado");
  var planillabasicaInsert = exampleModal3.querySelector("#planillabasica");
  var seguridadpvInsert = exampleModal3.querySelector("#seguridadpv");
  var muebleriaInsert = exampleModal3.querySelector("#muebleria");
  var materialdecasaInsert = exampleModal3.querySelector("#materialdecasa");
  var periodolaboralInsert = exampleModal3.querySelector("#periodolab");
  var conformavecinoInsert = exampleModal3.querySelector("#confirmavec");
  var nombrevecinoInsert = exampleModal3.querySelector("#nombrevec");
  var celularvecinoInsert = exampleModal3.querySelector("#celularvec");
  var latiInsert = exampleModal3.querySelector("#lati");
  var longiInsert = exampleModal3.querySelector("#longi");
  var fechaverificaInser = exampleModal3.querySelector("#fechaverifica");
  var fotoplanillaInsert = exampleModal3.querySelector("#fotoplanilla");
  var fotoestabilidadLaboraSeisMesesImagenInsert = exampleModal3.querySelector(
    "#fotoestabilidadLaboraSeisMesesImagen"
  );
  var fotofacturasProveedoresUltimosTresMesesImagenInsert =
    exampleModal3.querySelector(
      "#fotofacturasProveedoresUltimosTresMesesImagen"
    );
  var fotofachadaDelNegocioImagenInsert = exampleModal3.querySelector(
    "#fotofachadaDelNegocioImagen"
  );
  var fotointeriorDelNegocioImagenInsert = exampleModal3.querySelector(
    "#fotointeriorDelNegocioImagen"
  );
  var fotoclienteDentroDelNegocioImagenInsert = exampleModal3.querySelector(
    "#fotoclienteDentroDelNegocioImagen"
  );
  var fotoclienteFueraDelNegocioImagenInsert = exampleModal3.querySelector(
    "#fotoclienteFueraDelNegocioImagen"
  );
  var fototituloPropiedaGaranteOCodeudorImagenInsert =
    exampleModal3.querySelector("#fototituloPropiedaGaranteOCodeudorImagen");
  var fotoimpuestoPredialImagenInsert = exampleModal3.querySelector(
    "#fotoimpuestoPredialImagen"
  );
  var fotorespaldoIngresosImagenInsert = exampleModal3.querySelector(
    "#fotorespaldoIngresosImagen"
  );
  var fotocertificadoLaboralImagenInsert = exampleModal3.querySelector(
    "#fotocertificadoLaboralImagen"
  );
  var fotointeriorDomicilioImagenInsert = exampleModal3.querySelector(
    "#fotointeriorDomicilioImagen"
  );

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
  fotoplanillaInsert.src = fotoplanilla;
  fotoestabilidadLaboraSeisMesesImagenInsert.src =
    fotoestabilidadLaboraSeisMesesImagen;
  fotofacturasProveedoresUltimosTresMesesImagenInsert.src =
    fotofacturasProveedoresUltimosTresMesesImagen;
  fotofachadaDelNegocioImagenInsert.src = fotofachadaDelNegocioImagen;
  fotointeriorDelNegocioImagenInsert.src = fotointeriorDelNegocioImagen;
  fotoclienteDentroDelNegocioImagenInsert.src =
    fotoclienteDentroDelNegocioImagen;
  fotoclienteFueraDelNegocioImagenInsert.src = fotoclienteFueraDelNegocioImagen;
  fototituloPropiedaGaranteOCodeudorImagenInsert.src =
    fototituloPropiedaGaranteOCodeudorImagen;
  fotoimpuestoPredialImagenInsert.src = fotoimpuestoPredialImagen;
  fotorespaldoIngresosImagenInsert.src = fotorespaldoIngresosImagen;
  fotocertificadoLaboralImagenInsert.src = fotocertificadoLaboralImagen;
  fotointeriorDomicilioImagenInsert.src = fotointeriorDomicilioImagen;

  // console.log(fotoestabilidadLaboraSeisMesesImagenInsert);
});

function mayus(e) {
  e.value = e.value.toUpperCase();
}

var editarModal = document.getElementById("CambioModal");
  editarModal.addEventListener("show.bs.modal", function (event) {
  var button = event.relatedTarget;
  var  cedula = button.getAttribute("data-bs-cedula");
  var  nombre = button.getAttribute("data-bs-nombre");
  var  lugar = button.getAttribute("data-bs-lugar");
  var  ciudad = button.getAttribute("data-bs-ciudad");
  var  domicilio = button.getAttribute("data-bs-domicilio");
  var  direccion = button.getAttribute("data-bs-direccion");
  var  referencia = button.getAttribute("data-bs-referencia");
  var  empresa = button.getAttribute("data-bs-empresa");
  var  actividad = button.getAttribute("data-bs-actividad");
  var  direccionTrabajo = button.getAttribute("data-bs-direccionTrabajo");
  var  telfijo = button.getAttribute("data-bs-telfijo");
  var  flujo_ingresos = button.getAttribute("data-bs-flujo_ingresos");
  var  promedio = button.getAttribute("data-bs-promedio");
  var  telefono = button.getAttribute("data-bs-telefono");
  // vista
  var cedulaEdit = editarModal.querySelector("#cedulaEdit");
  var nombreEdit = editarModal.querySelector("#nombreEdit");
  var lugarEdit = editarModal.querySelector("#lugarEdit");
  var ciudadEdit = editarModal.querySelector("#ciudadEdit");
  var domicilioEdit = editarModal.querySelector("#domicilioEdit");
  var direccionEdit = editarModal.querySelector("#direccionEdit");
  var referenciaEdit = editarModal.querySelector("#referenciaEdit");
  var empresaEdit = editarModal.querySelector("#empresaEdit");
  var actividadEdit = editarModal.querySelector("#actividadEdit");
  var direccionTrabajoEdit = editarModal.querySelector("#direccionTrabajoeDIT");
  var telfijoEdit = editarModal.querySelector("#telfijoEdit");
  var flujo_ingresosEdit = editarModal.querySelector("#flujo_ingresosEdit");
  var promedioEdit = editarModal.querySelector("#promedioEdit");
  var telefonoEdit = editarModal.querySelector("#telefonoEdit");
  // 
  cedulaEdit.value = cedula;
  nombreEdit.value = nombre;
  lugarEdit.value = lugar;
  ciudadEdit.value = ciudad;
  domicilioEdit.value = domicilio;
  direccionEdit.value = direccion;
  referenciaEdit.value = referencia;
  empresaEdit.value = empresa;
  actividadEdit.value = actividad;
  direccionTrabajoEdit.value = direccionTrabajo;
  telfijoEdit.value = telfijo;
  flujo_ingresosEdit.value = flujo_ingresos;
  promedioEdit.value = promedio;
  telefonoEdit.value = telefono;

});