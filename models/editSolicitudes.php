<?php
require_once("conexion.php");

class editarSolicitud
{
    static public function edit(
        $nombre,
        $Lugar,
        $Ciudad,
        $Domicilio,
        $Direccion,
        $Referencia,
        $Empresa,
        $Actividad,
        $Telefono,
        $Flujo_ingresos,
        $cedula
    ) {
        $stmt = Conexion::conectar()->prepare("update ventaspdv_verificaciones.verificaciones_usuarios_tb 
            set vf_nombre_cliente   = '$nombre', vf_lugar_a_verificar  = '$Lugar',dndlD_ciudad_residencia ='$Ciudad', dndlD_sector_de_domicilio = '$Domicilio',dndlD_direccion_domiciliaria = '$Direccion',
            dndlD_referencia_domiciliaria = '$Referencia', dndlN_nombre_empresa_trabaja ='$Empresa',dndlN_actividad_laboral = '$Actividad',dndlN_telefonofijo =  '$Telefono', flujo_ingresos ='$Flujo_ingresos',
            mCount= mCount + 1
            where vf_cedula_cliente = '$cedula'");
        var_dump($stmt);
        if($stmt->execute()){
            $result = 'exito';
        }else{
            $result = 'error';
        }
        return $result;
    }
}
