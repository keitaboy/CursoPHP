<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once '/../../../conexion_reportes/r_conexion.php';
$consulta= "select 
a.IdAppointment, 
a.RegistrationDate, 
CONCAT_WS(' ',b.Name,b.LastName) as Medico, 
CONCAT_WS(' ',c.Name,c.LastName)as Paciente, 
a.Description 
from medicalappointment a 
INNER JOIN doctor b ON a.IdDoc=b.IdDoc 
INNER JOIN pacient c ON a.IdPacient=c.IdPacient;";
$html.="
<table border='1'>
    <tr>
        <td style='border-bottom:1px;border-left:0px;border-right:0px;border-top:0px;'><h2 style='font-size:18px;'>DATOS DE LA CITA</h2></td>
    </tr>
</table>
";
$resultado= $mysqli->query($consulta);
while ($row=$resultado->fetch_assoc()) {
    $html.="
    <br><b>C&oacute;digo de atenci&oacute;n:</b>".$row['IdAppointment']."<br>
    <br><b>Paciente: </b><br>".$row['Paciente']."<br>
    <br><b>Medico: </b>".$row['Medico']."<br>
    <b>Descripci&oacute;: </b>".$row['Description']."<br>
    <table>
        <tr>
            <td style='text-align:center'><b>¡Agradecemos su confianza!</b></td>
        </tr>
    </table>
    ";
}

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 150]]);
$mpdf->WriteHTML($html);
$mpdf->Output();
?>