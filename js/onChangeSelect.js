function onChangeSelect() {
  var option_value = document.getElementById("tipoGestion").value;
  var select_value = document.getElementById("cobranza");
  var newRenegocia = document.getElementById("newRenego");


  switch (option_value) {
    case "Renegociación":
      select_value.innerHTML = `<option value="Renegociación valor 0">Renegociación valor 0</option>
            <option value="Renegociación abono">Renegociación abono</option>
            <option value="Renegociación">Renegociación</option>`;
      newRenegocia.innerHTML=`<div class="col-6">
            <label class="form-label" mb-2 mt-1><strong>Plazo Nuevo</strong></label>
            <input list="plazos" name="plazoNuevo" class="form-control p-2"  required/>
            <datalist id="plazos">
              <option value="3">
              <option value="6">
              <option value="9">
              <option value="12">
              <option value="15">
              <option value="18">
              <option value="24">
              <option value="28">
              <option value="30">
              <option value="36">
              <option value="40">
              <option value="44">
              <option value="48">
            </datalist>
          </div>
          <div class="col-6">
            <label class="form-label" mb-2 mt-1><strong>ValorRenegocio</strong></label>
            <input  type="text" pattern="[0-9]+([\.,][0-9]+)?" title="solo numeros" style="font-size:14px" name="valorRenegociar" class="form-control p-2" required maxlength="6" minlength="0" />
          </div>`;
      break;
    case "Cobranzas":
      select_value.innerHTML = `
            <option value="Visita contactada">Visita contactada</option>
            <option value="Visita no contactada">Visita no contactada</option>
            <option value="Pago">Pago</option>
            `;
      newRenegocia.innerHTML=``;
      break;
    case "Recojo":
      select_value.innerHTML = `
            <option value="Recojo">Recojo</option>
            <option value="Recojo con abono">Recojo con abono</option>
            `;
      newRenegocia.innerHTML=``;
      break;
    case "Verificación":
      select_value.innerHTML = `
            <option value="Exitosa">Exitosa</option>
            <option value="No Exitosa">No Exitosa</option>
            `;
      newRenegocia.innerHTML=``;      
      break;
    case "Matriculación":
      select_value.innerHTML = `
            <option value="Exitosa">Exitosa</option>
            <option value="No Exitosa">No Exitosa</option>
            `;
      newRenegocia.innerHTML=``;
      break;
    default:
      select_value.innerHTML = "";
      break;
  }
}
