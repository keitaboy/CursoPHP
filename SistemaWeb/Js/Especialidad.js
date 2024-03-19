var tableespecialidad;

function listar_especialidad() {
    tableespecialidad = $("#tabla_especialidad").DataTable({
        "ordering": false,
        "bLengthChange": false,
        "searching": { "regex": false },
        "lenghtMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "ALL"]],
        "pageLenght": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../Controlador/insumo/controlador_insumo_listar.php",
            type: 'POST'
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "Name" }, //-------En el video es insumo_nombre-------//
            { "data": "Cant" }, //-------En el video es insumo_stock-------//
            { "data": "TypeItemName" }, //-------Aca podemos poner el nombre del IdTypeItem-------//
            {
                "data": "Status", //-------En el video es insumo_estatus-------//
                render: function (data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    }
                    if (data == 'INACTIVO') {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }
                    if (data == 'AGOTADO') {
                        return "<span class='label label-black' style='background:black'>" + data + "</span>";
                    }
                }
            },
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],
        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_especialidad_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    tableespecialidad.on('draw.dt', function () {
        var PageInfo = $('#tabla_especialidad').DataTable().page.info();
        tableespecialidad.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

// $('#tabla_insumo').on('click', '.editar', function () {
//     var data = tableinsumo.row($(this).parents('tr')).data();//deteccion de fila al hacer click y captura de datos
//     if (tableinsumo.row(this).child.isShown()) {
//         var data = tableinsumo.row(this).data();
//     }
//     $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
//     $("#modal_editar").modal('show');
//     $("#txt_idinsumo").val(data.IdItem);
//     $("#txt_insumo_actual_editar").val(data.Name);
//     $("#txt_insumo_nuevo_editar").val(data.Name);
//     $("#txt_stock_editar").val(data.Cant);
//     $("#cbm_estatus_editar").val(data.Status).trigger("change");
// })

function filterGlobal(){
    $('#tabla_especialidad').DataTable.search(
        $('#global_filter').val(),
    ).draw();
}