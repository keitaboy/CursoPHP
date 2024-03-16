<?php

require '../../Modelo/modelo_procedimiento.php';
$MP=new Modelo_Procedimiento();
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$procedimientoactual = htmlspecialchars($_POST['procedimientoactual'], ENT_QUOTES, 'UTF-8');
$procedimientonuevo = htmlspecialchars($_POST['procedimientonuevo'], ENT_QUOTES, 'UTF-8');
$observacion = htmlspecialchars($_POST['observacion'], ENT_QUOTES, 'UTF-8');
$consulta=$MP->Modificar_Procedimiento($id,$procedimientoactual,$procedimientonuevo,$observacion);

    echo $consulta;

?>