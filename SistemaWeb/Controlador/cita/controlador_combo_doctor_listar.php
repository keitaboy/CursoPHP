<?php

require '../../Modelo/modelo_cita.php';
$MC=new Modelo_Cita();
$consulta=$MC->listar_doctor_combo();
echo json_encode($consulta);
?>