<?php

require '../../Modelo/modelo_insumo.php';
$MI=new Modelo_Insumo();
$consulta=$MI->listar_combo_item();
echo json_encode($consulta);