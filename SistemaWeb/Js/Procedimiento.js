var tableprocedimiento;
function listar_procedimiento() {
        tableprocedimiento = $("#tabla_procedimiento").DataTable({
        "ordering": false,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../Controlador/Procedimiento/controlador_procedimiento_listar.php",
            "type": 'POST'
        },
        "order":[[1,'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "Name" },
            { "data": "Observation" },
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],
        "language": idioma_espanol,
        "select": true
    })

    document.getElementById("tabla_procedimiento_filter").style.display = "none";

    $('.input.global_filter').on('keyup click', function () {
        filterGlobal();
    });

    $('.input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });

    tableprocedimiento.on('draw.dt',function(){
        var PageInfo=$('#tabla_procedimiento_coreccion').DataTable().page.info();
        tableprocedimiento.column(0,{page:'current'}).nodes().each(function (cell, i){
            cell.innerHTML=i + 1 + PageInfo.start;
        });
    });
}

function filterGlobal() {
    $('#tabla_procedimiento').DataTable().search(
        $('#global_filter').val()
    ).draw();
}


function AbrirModalRegistro() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
}

function RegistrarProcedimiento() {
    var procedimiento=$("#txt_procedimiento").val();
    var estatus=$("#txt_observacion").val();

    if (procedimiento.legth==0) {
        return Swal.fire("Mensaje de Advertencia","El campo procedimiento debe tener datos","warning");
    }

    $.ajax({
        url:'../Controlador/Procedimiento/controlador_procedimiento_registro.php',
        type:'POST',
        data:{
            p:procedimiento,
            e:estatus
        }
    }).done(function(resp){
        if (resp>0) {
            if (resp==1) {
                $("#modal_registro").modal('hide');
                listar_procedimiento();
                LimpiarDatos();
                return Swal.fire("Mensaje de Confirmacion","Datos Registrados Correctamente","success");
            }else{
                LimpiarDatos();
                return Swal.fire("Mensaje de advertencia","El servicio ya existe","warning");
            }
        }
    })
}

function LimpiarDatos() {
    $('#txt_procedimiento').val("");
}

$('#tabla_procedimiento').on('click', '.editar', function () {
    var data = tableprocedimiento.row($(this).parents('tr')).data();
    if (tableprocedimiento.row(this).child.isShown()) {
        var data = tableprocedimiento.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    $("#txt_idprocedimiento").val(data.IdService);
    $("#txt_procedimiento_actual_editar").val(data.Name);
    $("#txt_procedimiento_nuevo_editar").val(data.Name);
    $("#txt_observacion_editar").val(data.Observation);
})

function Modificar_Procedimiento() {

    var id=$("#txt_idprocedimiento").val();
    var procedimientoactual=$("#txt_procedimiento_actual_editar").val();
    var procedimientonuevo=$("#txt_procedimiento_nuevo_editar").val();
    var observacion=$("#txt_observacion_editar").val();
    if (id.legth==0) {
        return Swal.fire("Mensaje de Advertencia","El campo id esta vacio","warning");
    }
    if (procedimiento.legth==0) {
        return Swal.fire("Mensaje de Advertencia","Debe ingresar un servicio","warning");
    }

    $.ajax({
        url:'../Controlador/Procedimiento/controlador_procedimiento_modificar.php',
        type:'POST',
        data:{
            id:id,
            procedimientoactual:procedimientoactual,
            procedimientonuevo:procedimientonuevo,
            observacion:observacion
        }
    }).done(function(resp){
        if (resp>0) {
            $("#modal_editar").modal('hidde');
            if (resp==1) {
                listar_procedimiento();
                return  Swal.fire("Mensaje de Confirmacion","Los datos fueron actualizados","success");
            }else{
                return  Swal.fire("Mensaje de Error","Los datos no fueron actualizados servicio ya existe","warning");
            }
        }else{
            return Swal.fire("Mensaje de Error","Los datos no fueron actualizados","warning");
        }
    })
}
