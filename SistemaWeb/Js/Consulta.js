var tableconsulta;
function listar_consulta() {
    var finicio=$("#txt_fechainicio").val();
    var ffin=$("#txt_fechafin").val();
    tableconsulta = $("#tabla_consulta_medica").DataTable({
        "ordering": false,
        "bLengthChange": true,
        "searching": { "regex": false },
        "lenghtMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "ALL"]],
        "pageLenght": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../Controlador/consulta/controlador_consulta_listar.php",
            type: 'POST',
            data:{
                fechainicio:finicio,
                fechafin:ffin
            }
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "NumeroDocumento" }, 
            { "data": "Paciente" },
            { "data": "FechaConsulta" },
            { "data": "Doctor" },
            { "data": "NombreServicio" }, 
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary' title='ed&iacute;tar'><i class='fa fa-edit'></i></button>&nbps;<button style='font-size:13px;' type='button' class='imprimir btn btn-danger' title='imprimir''><i class='fa fa-print'></i></button>" }
        ],
        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_consulta_medica_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    tableconsulta.on('draw.dt', function () {
        var PageInfo = $('#tabla_consulta_medica').DataTable().page.info();
        tableconsulta.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

$('#tabla_consulta_medica').on('click', '.editar', function () {
    var data = tableconsulta.row($(this).parents('tr')).data();//deteccion de fila al hacer click y captura de datos
    if (tableconsulta.row(this).child.isShown()) {
        var data = tableconsulta.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    $("#txt_cita_id").val(data.IdAppointment);
})
