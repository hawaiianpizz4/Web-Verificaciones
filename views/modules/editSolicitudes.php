<div class="container p-4 my-2 border">

    <table id="example" class="table table-striped" style="width: 100%;">
        <thead style="font-size: 10px;">
            <tr>
                <th scope="col">#Cédula del Cliente</th>
                <th scope="col">Nombre del Cliente</th>
                <th scope="col">Lugar de verificación</th>
                <th scope="col">Ciudad </th>
                <th scope="col">Dirección Domicilio</th>
                <th scope="col">Dirección Trabajo</th>
                <th scope="col">Nombre Tienda </th>
                <th scope="col">Celular </th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody style="font-size: 14px;">
            <?php foreach ($data as $retornar) : ?>
                <tr>
                    <td> <?php echo $retornar["vf_cedula_cliente"] ?></td>
                    <td> <?php echo $retornar["vf_nombre_cliente"] ?></td>
                    <td> <?php echo $retornar["vf_lugar_a_verificar"] ?></td>
                    <td> <?php echo $retornar["dndlD_ciudad_residencia"] ?></td>
                    <td> <?php echo $retornar["dndlD_direccion_domiciliaria"] ?></td>
                    <td> <?php echo $retornar["dndlN_direccion_trabajo"] ?></td>
                    <td> <?php echo $retornar["vf_nombre_tienda"] ?> </td>
                    <td> <?php echo $retornar["dndlN_telefonocelular"] ?> </td>
                    <?php if($retornar["mCount"] < 3) : ?>
                        <td><button type="button" class="btn btn-warning" 
                        data-bs-toggle="modal" 
                        data-bs-target="#CambioModal" 
                        data-bs-cedula="<?php echo $retornar["vf_cedula_cliente"] ?>" 
                        data-bs-nombre=" <?php echo $retornar["vf_nombre_cliente"] ?>" 
                        data-bs-lugar="<?php echo $retornar["vf_lugar_a_verificar"]?>"
                        data-bs-ciudad="<?php echo $retornar["dndlD_ciudad_residencia"]?>"
                        data-bs-domicilio="<?php echo $retornar["dndlD_sector_de_domicilio"]?>"
                        data-bs-direccion="<?php echo $retornar["dndlD_direccion_domiciliaria"]?>"
                        data-bs-referencia="<?php echo $retornar["dndlD_referencia_domiciliaria"]?>"
                        data-bs-empresa="<?php echo $retornar["dndlN_nombre_empresa_trabaja"]?>"
                        data-bs-actividad="<?php echo $retornar["dndlN_actividad_laboral"]?>"
                        data-bs-direccionTrabajo="<?php echo $retornar["dndlN_direccion_trabajo"]?>"
                        data-bs-telfijo="<?php echo $retornar["dndlN_telefonofijo"]?>"
                        data-bs-flujo_ingresos="<?php echo $retornar["flujo_ingresos"]?>"
                        data-bs-promedio="<?php echo $retornar["promedio"]?>"
                        data-bs-telefono=" <?php echo $retornar["dndlN_telefonocelular"] ?>" 
                        ><i class="bi bi-pencil-square"></i></button>
                        </td>
                    <?php else : ?>
                    <td ><button class="btn btn-danger" disabled><i class="bi bi-x-circle"></i></button></td>
                    <?php endif ?>   
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>