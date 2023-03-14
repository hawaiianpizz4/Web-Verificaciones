<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba imagenes</title>
</head>

<body>
    <!-- <form>
        <div>
            <label for="imagen1">menu de verificacion </label><br>
        </div>
        <a href="http://200.7.249.21:90/VerificacionesFisicas/Aplicativo/cargaimagenes.php"><input type="button" value="Ir"></a>
        </div>
    </form> -->

    <form action="http://200.7.249.21:90/VerificacionesFisicas/Aplicativo/cargaimagenes.php" method="POST">
        <label for="dato">NOMBRE CARPETA</label>
        <input type="text" name="dato" onkeyup="mayus(this);" required>
        <input type="submit" value="Enviar">
    </form>
</body>


<script>
    function mayus(e) {
    e.value = e.value.toUpperCase();
}
</script>
</html>