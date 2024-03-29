<?php

require '../../Modelo/modelo_consulta.php';
$MC=new Modelo_Consulta();
$consulta=$MC->listar_insumo_combo();
echo json_encode($consulta);
?>