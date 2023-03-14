<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD79WG_XsriNcEow-JxBtrdGdfpY32UFgU"></script>

    <link rel="stylesheet" href="stylemapa.css">
</head>
<body>

    <!-- search input box -->
    
    <div class="form-group input-group">
        <input type="text" id="search_location" class="form-control" placeholder="Search location">
        <div class="input-group-btn">
            <button class="btn btn-default get_map" type="submit">
                Locate
            </button>
        </div>
    </div>
    
    
    <!-- display google map -->
    <div id="geomap"></div>
    
    <!-- display selected location information -->
    <h4>Location Details</h4>
    <p>Address: <input type="text" class="search_addr" size="45"></p>
    <p>Latitude: <input type="text" class="search_latitude" size="30"></p>
    <p>Longitude: <input type="text" class="search_longitude" size="30"></p>
    
    <script src="mapa.js"></script>
</body>
</html>