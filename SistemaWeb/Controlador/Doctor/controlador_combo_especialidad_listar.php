<?php

require '../../Modelo/modelo_doctor.php';
$MD=new Modelo_Doctor();
$consulta=$MD->listar_combo_especialidad();
echo json_encode($consulta);