<?php
include('consultas.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Fotos</title>
</head>

<body>
    <div div class="container p-5 my-5 border">
        <div>
            <table id="myTable" data-toggle="table" data-search="true" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Foto 1</th>
                        <th scope="col">Foto 2</th>
                        <th scope="col">Direccion Foto 1</th>
                        <th scope="col">Direccion Foto 2</th>
                    </tr>
                </thead>
                <?php
                foreach ($data1 as $retornar) :
                ?>
                    <tbody>
                        <tr>
                            <?php
                            echo '<td><img src="' . $retornar['imagen'] . '" width=80px height=auto></td>';
                            echo '<td><img src="' . $retornar['imagen2'] . '" width=80px height=auto></td>';
                            ?>
                            <td><?php echo $retornar["imagen"]; ?></td>
                            <td><?php echo $retornar["imagen2"]; ?></td>
                        </tr>
                    </tbody>
                <?php
                endforeach;
                ?>
            </table>
        </div>
    </div>
</body>

</html>