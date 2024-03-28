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
            "url": "../Controlador/especialidad/controlador_especialidad_listar.php",
            type: 'POST'
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "TypeSpecialityName" },
            {
                "data": "Status", 
                render: function (data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    }
                    else {
                        return "<span class='label label-danger'>" + data + "</span>";
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

function AbrirModalRegistro() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
}

 $('#tabla_especialidad').on('click', '.editar', function () {
     var data = tableespecialidad.row($(this).parents('tr')).data();//deteccion de fila al hacer click y captura de datos
     if (tableespecialidad.row(this).child.isShown()) {
         var data = tableespecialidad.row(this).data();
     }
     $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
     $("#modal_editar").modal('show');
     $("#txt_idespecialidad").val(data.IdTypeSpeciality);
     $("#txt_especialidad_actual_editar").val(data.TypeSpecialityName);
     $("#txt_especialidad_nuevo_editar").val(data.TypeSpecialityName);
     $("#cbm_estatus_editar").val(data.Status).trigger("change");
 })

function filterGlobal(){
    $('#tabla_especialidad').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function Registrar_Especialidad(){
    var especialidad = $("#txt_especialidad").val();
    var estatus = $("#cbm_especialidad").val();

    if(especialidad.length == 0 || estatus.length == 0 ){
        Swal.fire("Mensaje de advertencia", "Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../Controlador/especialidad/controlador_especialidad_registro.php",
        type:'POST',
        data:{
            especialidad:especialidad,
            estatus:estatus
        }
    }).done(function(resp){
        console.log(resp);
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                listar_especialidad();
                LimpiarCampos();
                Swal.fire("Mensaje de confirmacion", "Datos guardados correctamente","success");         
            }
            else{
                LimpiarCampos();
                Swal.fire("Mensaje de advertencia", "La especialidad ya existe!","warning");
            }
        }
        else{
            Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
        }
    })
}

function LimpiarCampos(){
    $("#txt_especialidad").val("");
}

function Modificar_Especialidad(){
    var id = $("#txt_idespecialidad").val();
    var especialidadactual = $("#txt_especialidad_actual_editar").val();
    var especialidadnuevo = $("#txt_especialidad_nuevo_editar").val();  
    var estatus = $("#cbm_estatus_editar").val();

    if(especialidadactual.length == 0 || especialidadnuevo.length == 0 || estatus.length == 0 ){

        Swal.fire("Mensaje de advertencia", "Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../Controlador/especialidad/controlador_especialidad_modificar.php",
        type:'POST',
        data:{
            id: id,
            especialidadactual:especialidadactual,
            especialidadnuevo:especialidadnuevo,
            estatus:estatus
        }
    }).done(function(resp){
        console.log("la rpta es: " + resp);
        if(resp>0){
            if(resp==1){
                $("#modal_editar").modal('hide');
                listar_especialidad();
                Swal.fire("Mensaje de confirmacion", "Datos actualizados correctamente","success");         
            }
            else{
                Swal.fire("Mensaje de advertencia", "El insumo ya existe!","warning");
            }
        }
        else{
            Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
        }
    })
}