function onChangeSelect() {
  var option_value2 = document.getElementById("flujoIngresos").value;
  var option_value = document.getElementById("tipoGestion").value;

  var select_value1 = document.getElementById("content-titulo2");
  var select_value2 = document.getElementById("insertNewForm");
  // var select_value3 = document.getElementById("content-titulo3");
  var select_value4 = document.getElementById("insertNewForm2");

  console.log(option_value2);
  console.log(option_value);

  select_value1.innerHTML = "";
  // console.log(option_value,select_value);

  switch (option_value) {
    case "Negocio":
      select_value1.innerHTML = `
                      <div class="content-titulo3" id="content-titulo3">
                          <div class="title">Negocio</div>
                      </div>`;
      select_value2.innerHTML = `
        <div class="input-box">
        <span class="details">Nombre de la empresa donde trabaja el cliente <font color="red">*</font></span>
        <input name="nombreNegocio" type="text" placeholder="Nombre del negocio o de trabajo" required>
        </div>
        
        <div class="input-box">
        <span class="details">Cuál es la actividad laboral o tipo de negocio donde trabaja el cliente? <font color="red">*</font></span>
        <input name="actividadOTipoNegocio" type="text" placeholder="Actividad o tipo de negocio" onkeypress="if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
        event.returnValue = false;" required>
        </div>
        <div class="input-box">
        <span class="details">Teléfono fijo del cliente </span>
        <input name="numeroFijo" type="text" placeholder="Número fijo del cliente" required maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
        </div>`;
      select_value4.innerHTML = ``;
      break;

    case "NegoDomiDiferente":
      select_value1.innerHTML = `<div class="title">Negocio-Domicilio Diferente Lugar</div>
                    `;
      select_value2.innerHTML = `
                    <div class="input-box">
                        
                        <div class="title">Negocio</div>
                        </div>`;
      select_value4.innerHTML = `<div class="input-box">
                        <span class="details">Nombre de la empresa donde trabaja el cliente <font color="red">*</font></span>
                        <input name="nombreNegocio" type="text" placeholder="Nombre del negocio o de trabajo" required>
                        </div>
                        
                        <div class="input-box">
                        <span class="details">Cuál es la actividad laboral o tipo de negocio donde trabaja el cliente? <font color="red">*</font></span>
                        <input name="actividadOTipoNegocio" type="text" placeholder="Actividad o tipo de negocio" onkeypress="if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
                        event.returnValue = false;" required>
                        </div>
                        <div class="input-box">
                        <span class="details">Dirección de trabajo del cliente <font color="red">*</font></span>
                        <input name="direccionTrabajo" type="text" placeholder="Dirección del lugar de trabajo" required>
                        </div>
                        <div class="input-box">
                        <span class="details">Teléfono fijo del cliente </span>
                        <input name="numeroFijo" type="text" placeholder="Número fijo del cliente" required required maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        </div>`;
      break;

    case "NegoDomiMismo":
      select_value1.innerHTML = `<div class="title">Negocio-Domicilio Mismo Lugar</div>`;
      select_value2.innerHTML = `
                      <div class="input-box">
                          <div class="title">Negocio</div>
                          </div>`;
      select_value4.innerHTML = `<div class="input-box">
                          <span class="details">Nombre de la empresa donde trabaja el cliente <font color="red">*</font></span>
                          <input name="nombreNegocio" type="text" placeholder="Nombre del negocio o de trabajo" required>
                          </div>
                          
                          <div class="input-box">
                          <span class="details">Cuál es la actividad laboral o tipo de negocio donde trabaja el cliente? <font color="red">*</font></span>
                          <input name="actividadOTipoNegocio" type="text" placeholder="Actividad o tipo de negocio" onkeypress="if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
                          event.returnValue = false;" required>
                          </div>
                          <div class="input-box">
                          <span class="details">Dirección de trabajo del cliente <font color="red">*</font></span>
                          <input name="direccionTrabajo" type="text" placeholder="Dirección del lugar de trabajo" required>
                          </div>
                          <div class="input-box">
                          <span class="details">Teléfono fijo del cliente </span>
                          <input name="numeroFijo" type="text" placeholder="Número fijo del cliente" required required maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                          </div>`;
      break;

    default:
      // select_value.innerHTML='';
      select_value1.innerHTML = "";
      select_value2.innerHTML = "";
      // select_value3.innerHTML='';
      select_value4.innerHTML = "";
      break;
  }
}

// div class="input-box">
//                   <span class="details">Nombre de la tienda *</span>
//                   <input type="text" placeholder="Enter your name" required>
//                 </div>
