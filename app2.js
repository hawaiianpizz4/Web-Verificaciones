function success() {
  Swal.fire("Completado!", "Registro ingresado", "success");
}

function select() {
  Swal.fire("¡No se pudo ingresar los datos!", "Ingresar los datos de la dirección correctamente", "info");
}

function select2() {
  Swal.fire("¡Fallo!", "Seleccionar lugar a verificar", "error");
}

function errorcedula(){
  Swal.fire("¡Fallo!", "¡Usuario con esa cédula ya ingresado!", "info");
}

function fail() {
  Swal.fire("Fallo!", "Registro no ingresado correctamente!", "error");
}
function failcoordenadas(){
  Swal.fire("No se pudo ingresar el dato!", "Ingresar coordenadas, por favor", "info");
}
function faildatos(){
  Swal.fire("No se pudieron ingresar los datos!", "Ingresar todos los datos, por favor", "info");
}

function carga() {
  let timerInterval;
  Swal.fire({
    title: "Enviando Mensaje",
    html: "Cargando <b></b>....",
    timer: 5000,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
      const b = Swal.getHtmlContainer().querySelector("b");
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft();
      }, 100);
    },
    willClose: () => {
      clearInterval(timerInterval);
      Swal.fire("Completado!", "Mensaje Enviado", "success");

    },
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log("No se pudo cargar");
    }
  });
}

function carga2() {
   let timerInterval;
   Swal.fire({
     title: "Enviando Datos",
     html: "Cargando <b></b>....",
     timer: 10000,
     timerProgressBar: true,
     didOpen: () => {
       Swal.showLoading();
       const b = Swal.getHtmlContainer().querySelector("b");
       timerInterval = setInterval(() => {
         b.textContent = Swal.getTimerLeft();
       }, 100);
     },
     willClose: () => {
       clearInterval(timerInterval);
       Swal.fire("Completado!", "Datos ingresados correctamente", "success");
 
     },
   }).then((result) => {
     /* Read more about handling dismissals below */
     if (result.dismiss === Swal.DismissReason.timer) {
       console.log("No se pudo cargar");
     }
   });
 }
