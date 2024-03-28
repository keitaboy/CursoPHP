var tablecita;
function listar_cita() {
    tablecita = $("#tabla_cita").DataTable({
        "ordering": false,
        "bLengthChange": false,
        "searching": { "regex": false },
        "lenghtMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "ALL"]],
        "pageLenght": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../Controlador/cita/controlador_cita_listar.php",
            type: 'POST'
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "IdAppointment" }, 
            { "data": "Paciente" },
            { "data": "Medico" },
            { "data": "RegistrationDate" }, 
            {
                "data": "Status", 
                render: function (data, type, row) {
                    if (data == 'PENDIENTE') {
                        return "<span class='label label-primary'>" + data + "</span>";
                    }
                    if (data == 'CANCELADA') {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }
                    if (data == 'ATENDIDA') {
                        return "<span class='label label-success' style='background:black'>" + data + "</span>";
                    }
                }
            },
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary' title='ed&iacute;tar'><i class='fa fa-edit'></i></button>&nbps;<button style='font-size:13px;' type='button' class='imprimir btn btn-danger' title='imprimir''><i class='fa fa-print'></i></button>" }
        ],
        "language": "idioma_espanol",
        select: true
    });
    document.getElementById("tabla_cita_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    tablecita.on('draw.dt', function () {
        var PageInfo = $('#tabla_cita').DataTable().page.info();
        tablecita.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

$('#tabla_cita').on('click', '.editar', function () {
    var data = tablecita.row($(this).parents('tr')).data();//deteccion de fila al hacer click y captura de datos
    if (tablecita.row(this).child.isShown()) {
        var data = tablecita.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    listar_paciente_combo();
    listar_doctor_combo();
    $("#txt_cita_id").val(data.IdAppointment);
    $("#cbm_paciente_editar").val(data.IdPacient).trigger("change");
    $("#cbm_doctor_editar").val(data.IdDoc).trigger("change");
    $("#txt_descripcion_editar").val(data.Description).trigger("change");
})

$('#tabla_cita').on('click', '.imprimir', function () {
    var data = tablecita.row($(this).parents('tr')).data();//deteccion de fila al hacer click y captura de datos
    if (tablecita.row(this).child.isShown()) {
        var data = tablecita.row(this).data();
    }
    window.open("../Vista/libreporte/reportes/generar_ticket.php?id="+parseInt(data.IdAppointment)+"#zoom=100%","Ticket","scrollbars=NO");
})

function filterGlobal(){
    $('#tabla_cita').DataTable().search(
        $('#global_filter').val(),
    ).draw();
} 

function AbrirModalRegistro() {
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

function listar_paciente_combo() {
    $.ajax({
        "url": "../Controlador/cita/controlador_combo_paciente_listar.php",
        "type": 'POST'
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                    cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";  
                
            }
            $("#cbm_paciente").html(cadena);
            $("#cbm_paciente_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_paciente").html(cadena);
            $("#cbm_paciente_editar").html(cadena);
        }
    })
}

function listar_doctor_combo() {
    $.ajax({
        "url": "../Controlador/cita/controlador_combo_doctor_listar.php",
        "type": 'POST'
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                    cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";  
                
            }
            $("#cbm_doctor").html(cadena);
            $("#cbm_doctor_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_doctor").html(cadena);
            $("#cbm_doctor_editar").html(cadena);
        }
    })
}

function Registrar_Cita(){
    var idpaciente = $("#cbm_paciente").val();
    var iddoctor = $("#cbm_doctor").val();
    var descripcion = $("#txt_descripcion").val();
    var idusuario= $("#txtidprincipal").val();
    
    if(idpaciente.length == 0 || iddoctor.length == 0 || descripcion.length == 0){        
        return Swal.fire("Mensaje de advertencia", "Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../Controlador/cita/controlador_cita_registro.php",
        type:'POST',
        data:{
            idpa:idpaciente,
            iddo:iddoctor,
            descripcion:descripcion,
            idusuario:idusuario
        }
    }).done(function(resp){
        if(resp>0){
                $("#modal_registro").modal('hide');
                Swal.fire({
                    title: 'Datos de la cita guardados',
                    text: "Datos correctamente registrados",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonColor: 'Imprimir ticket'
                }).then((result)=>{
                    if (result.value) {
                        window.open("../Vista/libreporte/reportes/generar_ticket.php?id="+parseInt(resp)+"#zoom=100%","Ticket","scrollbars=NO");
                    }else{
                        $('#modal_registro').modal('hide');
                        listar_cita();
                    }
                })
                return Swal.fire("Mensaje de confirmacion", "Datos guardados correctamente","success");         
            }
        
        else{
            return Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
        }
    })
}

function Editar_Cita(){
    var idcita= $("#txt_cita_id").val();
    var idpaciente = $("#cbm_paciente_editar").val();
    var iddoctor = $("#cbm_doctor_editar").val();
    var descripcion = $("#txt_descripcion_editar").val();
    var estatus=$("#cbm_estatus").val();
    
    if(idcita.length == 0 || idpaciente.length == 0 || iddoctor.length == 0 || descripcion.length == 0){        
        return Swal.fire("Mensaje de advertencia", "Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../Controlador/cita/controlador_cita_editar.php",
        type:'POST',
        data:{
            idcita:idcita,
            idpa:idpaciente,
            iddo:iddoctor,
            descripcion:descripcion,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
                $("#modal_registro").modal('hide');
                Swal.fire({
                    title: 'Datos de la cita guardados',
                    text: "Datos correctamente registrados",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonColor: 'Imprimir ticket'
                }).then((result)=>{
                    tablecita.ajax.reload();
                    if (result.value) {
                        window.open("../Vista/libreporte/reportes/generar_ticket.php?id="+parseInt(idcita)+"#zoom=100%","Ticket","scrollbars=NO");
                    }else{
                        $('#modal_registro').modal('hide');
                        listar_cita();
                    }
                })
                return Swal.fire("Mensaje de confirmacion", "Datos guardados correctamente","success");         
            }
        
        else{
            return Swal.fire("Mensaje de error", "No se pudo completar la edici&oacute;n","error");
        }
    })
}