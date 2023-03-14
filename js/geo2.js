function getLocationLocation() {
    var options = {
      enableHighAccuracy: true,
      timeout: 6000,
      maximumAge: 0,
    };
  
    navigator.geolocation.getCurrentPosition(success, error, options);
    function success(position) {
      var coordenadas = position.coords;
      var latitud = document.getElementById("latitud1");
      var longitud = document.getElementById("longitud1");
  
      var insertlat= document.getElementById("lat1");
      var insertlong= document.getElementById("long1");
  
      insertlat.value=coordenadas.latitude;
      insertlong.value=coordenadas.longitude;
      //console.log('Más o menos ' + coordenadas.accuracy + ' metros.');
      // console.log(coordenadas);
  
      latitud.innerHTML=`<br/>${coordenadas.latitude}`;
      longitud.innerHTML=`<br/>${coordenadas.longitude}`;
      // console.log(latitud,longitud);
    }
  
    function error(error) {
      console.warn("ERROR(" + error.code + "): " + error.message);
    }
  }