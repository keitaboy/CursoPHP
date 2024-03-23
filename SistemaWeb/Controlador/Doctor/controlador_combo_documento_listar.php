<?php

require '../../Modelo/modelo_doctor.php';
$MD=new Modelo_Doctor();
$consulta=$MD->listar_combo_documento();
echo json_encode($consulta);