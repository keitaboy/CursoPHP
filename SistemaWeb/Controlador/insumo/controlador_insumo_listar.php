<?php

require '../../Modelo/modelo_insumo.php';
$MP=new Modelo_Insumo;

$consulta=$MP->listar_insumo();
if ($consulta) {
    echo json_encode($consulta);
}else{
    echo'{
        "sEcho":1,
        "iTotalRecords":"0",
        "iTotalDisplayRecords":"0",
        "aaData":[]
    }';
}