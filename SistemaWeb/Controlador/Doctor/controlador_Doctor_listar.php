<?php

require '../../Modelo/modelo_doctor.php';
$MD=new Modelo_Doctor();

$consulta=$MD->listar_Doctor();
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