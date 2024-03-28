<?php

require '../../Modelo/modelo_paciente.php';
$MP=new Modelo_Paciente();
$consulta=$MP->listar_combo_tipo_paciente();
echo json_encode($consulta);