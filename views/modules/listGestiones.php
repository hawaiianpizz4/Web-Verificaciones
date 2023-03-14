<?php
$query2 = $dbconn->prepare("SELECT * FROM ventaspdv_verificaciones.checklistverificadomicilio_tb");
$query2->execute();
$proceso = $query2->fetchAll();
?>

<table id="example" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">#Cédula del Cliente</th>
            <th scope="col">Nombre del Cliente</th>
            <th scope="col">Tienda</th>
            <th scope="col">GestorAsignado</th>
            <th scope="col">Detalles</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($proceso as $retornar) : ?>
            <tr>
                <td><?php echo $retornar["cedulaCliente"]; ?></td>
                <td><?php echo $retornar["nombreCliente"]; ?></td>
                <td><?php echo $retornar["vf_nombre_tienda"]; ?></td>
                <td><?php echo $retornar["nombreGestor"]; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" style="margin-left: 10px;" 
                    data-bs-toggle="modal" 
                    data-bs-target="#exampleModal3" 
                    data-bs-cedula="<?php echo $retornar["cedulaCliente"]; ?>" 
                    data-bs-nombre="<?php echo $retornar["nombreCliente"]; ?>" 
                    data-bs-direccion="<?php echo $retornar["direccionDomiciliaria"]; ?>"
                     data-bs-codigo="<?php echo $retornar["codigoVerificacion"]; ?>" 
                     data-bs-tienda="<?php echo $retornar["vf_nombre_tienda"]; ?>" 
                     data-bs-viviendatipo="<?php echo $retornar["tipoVivienda"]; ?>" 
                     data-bs-personaverificacion="<?php echo $retornar["personaQuienRealizaLaVerificacion"]; ?>" 
                     data-bs-residencia3="<?php echo $retornar["residenciaMinimaTresMeses"]; ?>" 
                     data-bs-terrenopropio="<?php echo $retornar["localTerrenoPropio"]; ?>" 
                     data-bs-terrenoarrendado="<?php echo $retornar["localTerrenoArrendado"]; ?>" 
                     data-bs-planillabasica="<?php echo $retornar["planillaServicioBasico"]; ?>" 
                     data-bs-seguridadpv="<?php echo $retornar["seguridadPuertasVentanas"]; ?>" 
                     data-bs-muebleria="<?php echo $retornar["muebleriaBasica"]; ?>" 
                     data-bs-materialdecasa="<?php echo $retornar["materialCasa"]; ?>" 
                     data-bs-periodolaboral="<?php echo $retornar["periodicidadActividadesLaborales"]; ?>" 
                     data-bs-conformavecino="<?php echo $retornar["confirmacionInfoVecinos"]; ?>" 
                     data-bs-nombrevecino="<?php echo $retornar["nombreInfoVecino"]; ?>" 
                     data-bs-celularvecino="<?php echo $retornar["celularInfoVecino"]; ?>" 
                     data-bs-lati="<?php echo $retornar["latitud"]; ?>" 
                     data-bs-longi="<?php echo $retornar["longitud"]; ?>" 
                     data-bs-fechaverifica="<?php echo $retornar["fechaverificacion"]; ?>" 
                     data-bs-fotoplanilla="<?php echo $retornar["planillaServicioBasicoImagen"]; ?>" 
                     data-bs-fotoestabilidadLaboraSeisMesesImagen="<?php echo $retornar["estabilidadLaboraSeisMesesImagen"]; ?>" 
                     data-bs-fotofacturasProveedoresUltimosTresMesesImagen="<?php echo $retornar["facturasProveedoresUltimosTresMesesImagen"]; ?>" 
                     data-bs-fotofachadaDelNegocioImagen="<?php echo $retornar["fachadaDelNegocioImagen"]; ?>" data-bs-fotointeriorDelNegocioImagen="<?php echo $retornar["interiorDelNegocioImagen"]; ?>" data-bs-fotoclienteDentroDelNegocioImagen="<?php echo $retornar["clienteDentroDelNegocioImagen"]; ?>" data-bs-fotoclienteFueraDelNegocioImagen="<?php echo $retornar["clienteFueraDelNegocioImagen"]; ?>" data-bs-fototituloPropiedaGaranteOCodeudorImagen="<?php echo $retornar["tituloPropiedaGaranteOCodeudorImagen"]; ?>" data-bs-fotoimpuestoPredialImagen="<?php echo $retornar["impuestoPredialImagen"]; ?>" data-bs-fotorespaldoIngresosImagen="<?php echo $retornar["respaldoIngresosImagen"]; ?>" data-bs-fotocertificadoLaboralImagen="<?php echo $retornar["certificadoLaboralImagen"]; ?>" data-bs-fotointeriorDomicilioImagen="<?php echo $retornar["interiorDomicilioImagen"]; ?>">
                        <i class="bi bi-cursor"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>