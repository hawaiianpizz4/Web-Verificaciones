console.log("hola");
function onChangeSelect() {
    var option_value0 = document.getElementById("confirmacion").value;
    var option_value1 = document.getElementById("confirmacionveci");
    
    
    
    

    switch(option_value0){
        case "Si": 
        option_value1.innerHTML = `
        <span class="details"><strong>Confirmación de Información con los vecinos<font color="red">*</font></strong></span>
                <label for="inputTienda" class="form-text text-muted">Nombre: <em class="">
                    <input type="text" name="nombreVecino" value="" id="nombreVecino1" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" required/>
                </label>
                <label for="inputTienda" class="form-text text-muted">Celular: <em class="">
                    <input type="text" name="celularVecino" value="" onkeyup="mayus(this);" id="celularVecino1" onKeypress="if (event.keyCode < 45 || event.keyCode > 57)
                    event.returnValue = false;" maxlength="10" required>
                </label>`;
            break;
        case "No": 
        option_value1.innerHTML=``;
            break;

        default:
                // select_value.innerHTML='';
                option_value1.innerHTML= "";
                break;

    }
}





function mayus(e) {

    e.value = e.value.toUpperCase();

  }

  function soloLetras(e) {
    var key = e.keyCode || e.which,
      tecla = String.fromCharCode(key).toLowerCase(),
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
      especiales = [8, 37, 39, 46],
      tecla_especial = false;

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }



