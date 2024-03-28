var tablePaciente;

function listar_Paciente() {
    tablePaciente = $("#tabla_Paciente").DataTable({
        "ordering": false,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../Controlador/Paciente/controlador_Paciente_listar.php",
            "type": 'POST'
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "Name" },
            { "data": "TypeMascotName" },
            { "data": "Race" },
            { "data": "Color" },
            { "data": "Weight" },            
            { "data": "Height" },
            { "data": "Age" },
            { "data": "BornDate" },
            { "data": "NumberMedHis" },
            { "data": "NroDoct" },
            {
                "data": "Sex",
                "render": function (data, type, row) {
                    if (data == 'M') {
                        return "MACHO";
                    } else {
                        return "HEMBRA";
                    }
                }
            },
            { "data": "Sterilized" }, 
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],
        "language": idioma_espanol,
        "select": true
    })
    document.getElementById("tabla_Paciente_filter").style.display = "none";

    $('input.global_filter_paciente').on('keyup click', function () {
        filterGlobalPaciente();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    tablePaciente.on('draw.dt', function () {
        var PageInfo = $('#tabla_Paciente').DataTable().page.info();
        tablePaciente.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

function listar_Dueno() {
    tablePaciente = $("#tabla_Dueno").DataTable({
        "ordering": false,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../Controlador/Paciente/controlador_Dueno_listar.php",
            "type": 'POST'
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "Dueno" },
            { "data": "TypeDocName" },
            { "data": "NroDoct" },
            { "data": "CellPhone" },
            { "data": "Adress" },            
            { "data": "Email" },           
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],
        "language": idioma_espanol,
        "select": true
    })
    document.getElementById("tabla_Dueno_filter").style.display = "none";

    $('input.global_filter_dueno').on('keyup click', function () {
        filterGlobalDueno();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    tablePaciente.on('draw.dt', function () {
        var PageInfo = $('#tabla_Dueno').DataTable().page.info();
        tablePaciente.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

function AbrirModalRegistro() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
}

function AbrirModalRegistroPaciente() {    
    $("#modal_registrar_paciente").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registrar_paciente").modal('show');
}

function listar_combo_documento() {
    $.ajax({
        "url": "../Controlador/Doctor/controlador_combo_documento_listar.php",
        "type": 'POST'
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
            }
            $("#cbm_documento").html(cadena);
           // $("#cbm_documento_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_documento").html(cadena);
          //  $("#cbm_documento_editar").html(cadena);
        }
    })
}
function listar_combo_tipo_paciente() {
    $.ajax({
        "url": "../Controlador/Paciente/controlador_tipo_paciente_listar.php",
        "type": 'POST'
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
            }
            $("#cbm_tipo_mascota").html(cadena);
           // $("#cbm_documento_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_tipo_mascota").html(cadena);
          //  $("#cbm_documento_editar").html(cadena);
        }
    })
}

//   $('#tabla_Paciente').on('click', '.editar', function () {
//       var data = tablePaciente.row($(this).parents('tr')).data();//deteccion de fila al hacer click y captura de datos
//       if (tablePaciente.row(this).child.isShown()) {
//           var data = tablePaciente.row(this).data();
//       }
//       $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
//       $("#modal_editar").modal('show');
//       $("#txt_idPaciente").val(data.IdDoc);
//       $("#txt_Paciente_nombre_editar").val(data.Name);
//       $("#txt_Paciente_apellido_editar").val(data.LastName);
//       $("#cbm_documento_editar").val(data.IdTypeDoct).trigger("change");
//       $("#txt_Paciente_nrodoc_editar_actual").val(data.NroDoct);
//       $("#txt_Paciente_nrodoc_editar_nuevo").val(data.NroDoct);
//       $("#txt_Paciente_celular_editar").val(data.CellPhone);
//       $("#txt_Paciente_grado_editar").val(data.Grade);
//       $("#txt_Paciente_fecha_nac_editar").val(data.Date_StartWorking);
//       $("#cbm_especialidad_editar").val(data.IdTypeSpeciality).trigger("change");
//       $("#txt_Paciente_pais_editar").val(data.Country);
//       $("#txt_Paciente_depa_editar").val(data.Region);
//       $("#txt_Paciente_distrito_editar").val(data.City);
//       $("#txt_Paciente_direccion_editar").val(data.Adress);
//       $("#txt_Paciente_correo_editar").val(data.Email);
//       $("#txt_id_usuario").val(data.IdUsuario);
//       $("#txt_Paciente_usu_editar").val(data.UsuUser);
//       $("#cbm_rol_editar").val(data.IdRol).trigger("change");
//   })

 function filterGlobalPaciente(){
     $('#tabla_Paciente').DataTable().search(
         $('#global_filter_paciente').val(),
     ).draw();
 }
 function filterGlobalDueno(){
    $('#tabla_Dueno').DataTable().search(
        $('#global_filter_dueno').val(),
    ).draw();
}

 function Registrar_Dueno(){
     var DuenoNombre = $("#txt_Dueno_nombre").val();
     var DuenoApellido = $("#txt_Dueno_apellido").val();
     var DuenoDocumento = $("#cbm_documento").val();
     var DuenoNroDoc = $("#txt_Dueno_nrodoc").val();
     var DuenoCelular = $("#txt_Dueno_celular").val();
     var DuenoDireccion = $("#txt_Dueno_direccion").val();
     var DuenoCorreo = $("#txt_Dueno_correo").val();
     var EmailOk = $("#emailOK").val();

     if(EmailOk == "Incorrecto"){
         return Swal.fire("Advertencia", "El correo electronico no tiene un formato correcto","warning");
     }

     if(DuenoNombre.length == 0 || DuenoApellido.length == 0 || DuenoDocumento.length == 0 || DuenoNroDoc.length == 0 ||
         DuenoCelular.length == 0 || DuenoDireccion.length == 0 || DuenoCorreo.length == 0 ){
         Swal.fire("Mensaje de advertencia", "Llene todos campos vacios","warning");
     }
     $.ajax({
         "url":"../Controlador/Paciente/controlador_Dueno_registro.php",
         type:'POST',
         data:{
              DuenoNombre :DuenoNombre,
              DuenoApellido :DuenoApellido,
              DuenoDocumento :DuenoDocumento,
              DuenoNroDoc :DuenoNroDoc,
              DuenoCelular :DuenoCelular,
              DuenoDireccion :DuenoDireccion,
              DuenoCorreo :DuenoCorreo
         }
     }).done(function(resp){
         if(resp>0){
             if(resp==1){
                 $("#modal_registro").modal('hide');
                 listar_Paciente();
                 LimpiarCamposDueno();                 
                 Swal.fire("Mensaje de confirmacion", "Datos guardados correctamente","success");    
                 AbrirModalRegistroPaciente();     
             }
             else{
                LimpiarCamposDueno();
                 Swal.fire("Mensaje de advertencia", "La Paciente ya existe!","warning");
             }
         }
         else{
             Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
         }
     })
 }

 function Registrar_Paciente() {
    var PacienteNombre = $("#txt_Paciente_nombre").val();
    var PacienteTipoMasc = $("#cbm_tipo_mascota").val();
    var PacienteRaza = $("#txt_Paciente_raza").val();
    var PacienteColor = $("#txt_Paciente_color").val();
    var PacientePeso = $("#txt_Paciente_peso").val();
    var PacienteAltura = $("#txt_Paciente_altura").val();
    var PacienteEdad = $("#txt_Paciente_edad").val();
    var PacienteFechaNac = $("#txt_Paciente_FechaNac").val();
    var PacienteSexo = $("#cbm_sexo").val();
    var PacienteEsterilizar = $("#cbm_esterilizado").val();

    if (PacienteNombre.length == 0 || PacienteTipoMasc.length == 0 || PacienteRaza.length == 0 || PacienteColor.length == 0 ||
        PacientePeso.length == 0 || PacienteAltura.length == 0 || PacienteEdad.length == 0 || PacienteFechaNac.length == 0 ||
        PacienteSexo.length == 0 || PacienteEsterilizar.length == 0) {
        Swal.fire("Mensaje de advertencia", "Llene todos campos vacíos", "warning");
    }
    $.ajax({
        "url": "../Controlador/Paciente/controlador_Paciente_registro.php",
        type: 'POST',
        data: {
            PacienteNombre: PacienteNombre,
            PacienteTipoMasc: PacienteTipoMasc,
            PacienteRaza: PacienteRaza,
            PacienteColor: PacienteColor,
            PacientePeso: PacientePeso,
            PacienteAltura: PacienteAltura,
            PacienteEdad: PacienteEdad,
            PacienteFechaNac: PacienteFechaNac,
            PacienteSexo: PacienteSexo,
            PacienteEsterilizar: PacienteEsterilizar
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                // Mostrar ventana emergente de pregunta
                Swal.fire({
                    title: '¿Desea agregar otra mascota?',
                    showDenyButton: true,
                    confirmButtonText: `Sí`,
                    denyButtonText: `No`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        LimpiarCamposPaciente();
                        Swal.fire("Mensaje de confirmación", "Agregue los datos de la nueva mascota", "success");
                    } else if (result.isDenied) {
                        $("#modal_registrar_paciente").modal('hide');
                        listar_Paciente();
                        Swal.fire("Mensaje de confirmación", "Datos guardados correctamente", "success");
                    }
                });
            } else {
                LimpiarCamposPaciente();
                Swal.fire("Mensaje de advertencia", "La paciente ya existe!", "warning");
            }
        } else {
            Swal.fire("Mensaje de error", "No se pudo completar el registro", "error");
        }
    });
}


 function LimpiarCamposDueno(){
     $("#txt_Dueno_nombre").val("");
     $("#txt_Dueno_apellido").val("");
     $("#cbm_documento").val("");
     $("#txt_Dueno_nrodoc").val("");
     $("#txt_Dueno_celular").val("");
     $("#txt_Dueno_direccion").val("");
     $("#txt_Dueno_correo").val("");
 }

 function LimpiarCamposPaciente(){
    $("#txt_Paciente_nombre").val("");
    $("#cbm_tipo_mascota").val("");
    $("#cbm_documento").val("");
    $("#txt_Paciente_raza").val("");
    $("#txt_Paciente_color").val("");
    $("#txt_Paciente_peso").val("");
    $("#txt_Paciente_altura").val("");
    $("#txt_Paciente_edad").val("");
    $("#txt_Paciente_FechaNac").val("");
    $("#cbm_sexo").val("");
    $("#cbm_esterilizado").val("");
}


 function Modificar_Paciente(){
    var idPaciente = $("#txt_idPaciente").val();
    var PacienteNombre = $("#txt_Paciente_nombre_editar").val();
    var PacienteApellido = $("#txt_Paciente_apellido_editar").val();
    var PacienteDocumento = $("#cbm_documento_editar").val();
    var PacienteNroDocActual = $("#txt_Paciente_nrodoc_editar_actual").val();
    var PacienteNroDocNuevo = $("#txt_Paciente_nrodoc_editar_nuevo").val();
    var PacienteCelular = $("#txt_Paciente_celular_editar").val();
    var PacienteGrado = $("#txt_Paciente_grado_editar").val();
    var PacienteFechaNac = $("#txt_Paciente_fecha_nac_editar").val();
    var PacienteEspecialiadad = $("#cbm_especialidad_editar").val();
    var PacientePais = $("#txt_Paciente_pais_editar").val();
    var PacienteDepa = $("#txt_Paciente_depa_editar").val();
    var PacienteDistrito = $("#txt_Paciente_distrito_editar").val();
    var PacienteDireccion = $("#txt_Paciente_direccion_editar").val();
    var PacienteCorreo = $("#txt_Paciente_correo_editar").val(); //apuntar a email Paciente e email usuario
    var IdUsuario = $("#txt_id_usuario").val();
    var EmailOk = $("#emailOK_editar").val();

     if(EmailOk == "Incorrecto"){
         return Swal.fire("Advertencia", "El correo electronico no tiene un formato correcto","warning");
     }

    if(idPaciente.length == 0 || PacienteNombre.length == 0 || PacienteApellido.length == 0 || PacienteDocumento.length == 0 ||
        PacienteNroDocActual.length== 0 || PacienteNroDocNuevo.length == 0 || PacienteCelular.length == 0 || 
        PacienteGrado.length == 0 || PacienteFechaNac.length == 0 || PacienteEspecialiadad.length == 0 || PacientePais.length == 0 || 
        PacienteDepa.length == 0 || PacienteDistrito.length == 0 || PacienteDireccion.length == 0 || PacienteCorreo.length == 0 ||
        IdUsuario.length == 0 ){
         Swal.fire("Mensaje de advertencia", "Llene todos campos vacios","warning");
     }
     $.ajax({
         "url":"../Controlador/Paciente/controlador_Paciente_modificar.php",
         type:'POST',
         data:{
            idPaciente:idPaciente,
            PacienteNombre:PacienteNombre,
            PacienteApellido:PacienteApellido,
            PacienteDocumento:PacienteDocumento,
            PacienteNroDocActual:PacienteNroDocActual,
            PacienteNroDocNuevo:PacienteNroDocNuevo,
            PacienteCelular:PacienteCelular,
            PacienteGrado:PacienteGrado,
            PacienteFechaNac:PacienteFechaNac,
            PacienteEspecialiadad:PacienteEspecialiadad,
            PacientePais:PacientePais,
            PacienteDepa:PacienteDepa,
            PacienteDistrito:PacienteDistrito,
            PacienteDireccion:PacienteDireccion,
            PacienteCorreo:PacienteCorreo,
            IdUsuario:IdUsuario          
         }
     }).done(function(resp){
         if(resp>0){
             if(resp==1){
                 $("#modal_registro").modal('hide');
                 listar_Paciente();
                 LimpiarCampos();
                 Swal.fire("Mensaje de confirmacion", "Datos guardados correctamente","success");         
             }
             else{
                 LimpiarCampos();
                 Swal.fire("Mensaje de advertencia", "La Paciente ya existe!","warning");
             }
         }
         else{
             Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
         }
     })
 }