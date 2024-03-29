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

function listar_paciente_combo_consulta() {
    $.ajax({
        "url": "../Controlador/consulta/controlador_combo_paciente_cita_listar.php",
        "type": 'POST'
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                    cadena += "<option value='" + data[i][0] + "'>Cita: " + data[i][0] + " - Paciente: " +data[i][2]+ " - Doctor: " +data[i][3]+ "</option>";  
                
            }
            $("#cbm_paciente_consulta").html(cadena);
            $("#cbm_paciente_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_paciente_consulta").html(cadena);
            $("#cbm_paciente_editar").html(cadena);
        }
    })
}
function listar_insumo_combo() {
    $.ajax({
        "url": "../Controlador/consulta/controlador_insumo_listar.php",
        "type": 'POST'
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                    cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";  
                
            }
            $("#cbm_insumo_consulta").html(cadena);
            $("#cbm_insumo_consulta_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_insumo_consulta").html(cadena);
            $("#cbm_insumo_consulta_editar").html(cadena);
        }
    })
}

function listar_servicio_combo() {
    $.ajax({
        "url": "../Controlador/consulta/controlador_servicio_listar.php",
        "type": 'POST'
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                    cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";  
                
            }
            $("#cbm_servicio_consulta").html(cadena);
            $("#cbm_servicio_consulta_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_servicio_consulta").html(cadena);
            $("#cbm_servicio_consulta_editar").html(cadena);
        }
    })
}

function Registrar_Consulta(){
    var idcita = $("#cbm_paciente_consulta").val();
    var idinsumo = $("#cbm_insumo_consulta").val();
    var cantinsumo = $("#txt_cantinsumo_consulta").val();
    var idservicio= $("#cbm_servicio_consulta").val();
    var descripcion= $("#txt_descripcion_consulta").val();
    var observacion= $("#txt_observacion_consulta").val();
    
    if(idcita.length == 0 || idservicio.length == 0 || descripcion.length == 0){        
        return Swal.fire("Mensaje de advertencia", "Debe estar lleno los datos de Cita, Servicio y Descripcion","warning");
    }
    $.ajax({
        "url":"../Controlador/consulta/controlador_consulta_registro.php",
        type:'POST',
        data:{
            idcita:idcita,
            idinsumo:idinsumo,
            cantinsumo:cantinsumo,
            idservicio:idservicio,
            descripcion:descripcion,
            observacion:observacion
        }
    }).done(function(resp){
        if(resp>0){
                $("#modal_registro").modal('hide');
                listar_consulta();
                Swal.fire("Mensaje de confirmacion","Consulta registrada", "success");
                     
            }
        
        else{
            return Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
        }
    })
}