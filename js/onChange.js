get_data = function(elem) {
  var options = document.getElementById('datalistOptions').getElementsByTagName("option");
  var enviar = document.getElementById("credito");
  var saldos = document.getElementById('datalistOptions').getElementsByTagName("span");
  var indicesArray = [];
  var optionVals = [];
  var pruebas = [];

  for (let index = 0; index < options.length; index++) {
    optionVals.push(options[index].getAttribute("name"),options[index].value); 
    indicesArray.push(options[index].value);   
  }
  var io = optionVals.indexOf(elem.value);
  var escribir = document.getElementById("operacion");
  if(optionVals[io]){
    escribir.value= optionVals[io-1];
    enviar.value=optionVals[io-1];
  }

  for (let index = 0; index < saldos.length; index++) {
    const element = saldos[index];
    pruebas.push(element.getAttribute("value"),element.getAttribute("name"));
  }
  var newIO = indicesArray.indexOf(elem.value);
  newIO = (newIO+1)*6;
  var saldosFinales = [];
  for (let index =newIO-6; index < newIO; index++) {
    const element = pruebas[index];
    saldosFinales.push(element);  
  }
  var saldoCartera = document.getElementById("saldoCartera");
  var genericoProducto = document.getElementById("genericoProducto");
  var PlazoOperacion = document.getElementById("PlazoOperacion");
  var Cuota = document.getElementById("Cuota");
  var CoutasPendientes = document.getElementById("CoutasPendientes");
  saldoCartera.innerHTML = saldosFinales[0];
  genericoProducto.innerHTML = saldosFinales[1];
  PlazoOperacion.innerHTML = saldosFinales[2];
  Cuota.innerHTML= saldosFinales[3];
  CoutasPendientes.innerHTML= saldosFinales[4];
}


