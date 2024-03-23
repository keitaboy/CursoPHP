var tableDoctor;

function listar_Doctor() {
    tableDoctor = $("#tabla_Doctor").DataTable({
        "ordering": false,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../Controlador/Doctor/controlador_Doctor_listar.php",
            "type": 'POST'
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "Medico" },
            { "data": "TypeDocName" },
            { "data": "NroDoct" },
            { "data": "CellPhone" },
            { "data": "Date_StartWorking" },            
            { "data": "Grade" },
            { "data": "TypeSpecialityName" },
            { "data": "Country" },
            { "data": "Region" },
            { "data": "City" },
            { "data": "Adress" },
            { "data": "Email" }, 
            { "data": "UsuUser" },
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],
        "language": idioma_espanol,
        "select": true
    })

    document.getElementById("tabla_Doctor_filter").style.display = "none";

    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    tableDoctor.on('draw.dt', function () {
        var PageInfo = $('#tabla_Doctor').DataTable().page.info();
        tableDoctor.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

function AbrirModalRegistro() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
    listar_combo_rol();
    listar_combo_documento();
    listar_combo_especialidad();
}

function listar_combo_rol() {
    $.ajax({
        "url": "../Controlador/usuario/controlador_combo_rol_listar.php",
        "type": 'POST'
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
            }
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        }
    })
}

function listar_combo_especialidad() {
    $.ajax({
        "url": "../Controlador/Doctor/controlador_combo_especialidad_listar.php",
        "type": 'POST'
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
            }
            $("#cbm_especialidad").html(cadena);
          //  $("#cbm_rol_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_especialidad").html(cadena);
            //$("#cbm_rol_editar").html(cadena);
        }
    })
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
           // $("#cbm_rol_editar").html(cadena);
        } else {
            cadena += "<option value=''No se Encontraron Registros</option>";
            $("#cbm_documento").html(cadena);
           // $("#cbm_rol_editar").html(cadena);
        }
    })
}

//  $('#tabla_Doctor').on('click', '.editar', function () {
//      var data = tableDoctor.row($(this).parents('tr')).data();//deteccion de fila al hacer click y captura de datos
//      if (tableDoctor.row(this).child.isShown()) {
//          var data = tableDoctor.row(this).data();
//      }
//      $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
//      $("#modal_editar").modal('show');
//      $("#txt_idDoctor").val(data.IdTypeSpeciality);
//      $("#txt_Doctor_actual_editar").val(data.TypeSpecialityName);
//      $("#txt_Doctor_nuevo_editar").val(data.TypeSpecialityName);
//      $("#cbm_estatus_editar").val(data.Status).trigger("change");
//  })

 function filterGlobal(){
     $('#tabla_Doctor').DataTable().search(
         $('#global_filter').val(),
     ).draw();
 }

 function Registrar_Doctor(){
     var DoctorNombre = $("#txt_doctor_nombre").val();
     var DoctorApellido = $("#txt_doctor_apellido").val();
     var DoctorDocumento = $("#cbm_documento").val();
     var DoctorNroDoc = $("#txt_doctor_nrodoc").val();
     var DoctorCelular = $("#txt_doctor_celular").val();
     var DoctorGrado = $("#txt_doctor_grado").val();
     var DoctorFechaNac = $("#txt_doctor_fecha_nac").val();
     var DoctorEspecialiadad = $("#cbm_especialidad").val();
     var DoctorPais = $("#txt_doctor_pais").val();
     var DoctorDepa = $("#txt_doctor_depa").val();
     var DoctorDistrito = $("#txt_doctor_distrito").val();
     var DoctorDireccion = $("#txt_doctor_direccion").val();
     var DoctorCorreo = $("#txt_doctor_correo").val();
     var DoctorUsuario = $("#txt_doctor_usu").val();
     var DoctorPassword = $("#txt_doctor_pass").val();
     var DoctorSexo = $("#cbm_sexo").val();
     var DoctorRol = $("#cbm_rol").val();

     if(DoctorNombre.length == 0 || DoctorApellido.length == 0 || DoctorDocumento.length == 0 || 
        DoctorNroDoc.length == 0 || DoctorCelular.length == 0 || DoctorGrado.length == 0 || DoctorFechaNac.length == 0 ||
        DoctorEspecialiadad.length == 0 || DoctorPais.length == 0 || DoctorDepa.length == 0 || DoctorDistrito.length == 0 ||
        DoctorDireccion.length == 0 || DoctorCorreo.length == 0 || DoctorUsuario.length == 0 || DoctorPassword.length == 0 ||
        DoctorSexo.length == 0 || DoctorRol.length == 0){
         Swal.fire("Mensaje de advertencia", "Llene todos campos vacios","warning");
     }
     $.ajax({
         "url":"../Controlador/Doctor/controlador_Doctor_registro.php",
         type:'POST',
         data:{
            DoctorNombre:DoctorNombre,
            DoctorApellido:DoctorApellido,
            DoctorDocumento:DoctorDocumento,
            DoctorNroDoc:DoctorNroDoc,
            DoctorCelular:DoctorCelular,
            DoctorGrado:DoctorGrado,
            DoctorFechaNac:DoctorFechaNac,
            DoctorEspecialiadad:DoctorEspecialiadad,
            DoctorPais:DoctorPais,
            DoctorDepa:DoctorDepa,
            DoctorDistrito:DoctorDistrito,
            DoctorDireccion:DoctorDireccion,
            DoctorCorreo:DoctorCorreo,
            DoctorUsuario:DoctorUsuario,
            DoctorPassword:DoctorPassword,
            DoctorSexo:DoctorSexo,
            DoctorRol:DoctorRol            
         }
     }).done(function(resp){
         if(resp>0){
             if(resp==1){
                 $("#modal_registro").modal('hide');
                 listar_Doctor();
                 LimpiarCampos();
                 Swal.fire("Mensaje de confirmacion", "Datos guardados correctamente","success");         
             }
             else{
                 LimpiarCampos();
                 Swal.fire("Mensaje de advertencia", "La Doctor ya existe!","warning");
             }
         }
         else{
             Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
         }
     })
 }

// function LimpiarCampos(){
//     $("#txt_Doctor").val("");
// }

// function Modificar_Doctor(){
//     var id = $("#txt_idDoctor").val();
//     var Doctoractual = $("#txt_Doctor_actual_editar").val();
//     var Doctornuevo = $("#txt_Doctor_nuevo_editar").val();  
//     var estatus = $("#cbm_estatus_editar").val();

//     if(Doctoractual.length == 0 || Doctornuevo.length == 0 || estatus.length == 0 ){

//         Swal.fire("Mensaje de advertencia", "Llene los campos vacios","warning");
//     }
//     $.ajax({
//         "url":"../Controlador/Doctor/controlador_Doctor_modificar.php",
//         type:'POST',
//         data:{
//             id: id,
//             Doctoractual:Doctoractual,
//             Doctornuevo:Doctornuevo,
//             estatus:estatus
//         }
//     }).done(function(resp){
//         console.log("la rpta es: " + resp);
//         if(resp>0){
//             if(resp==1){
//                 $("#modal_editar").modal('hide');
//                 listar_Doctor();
//                 Swal.fire("Mensaje de confirmacion", "Datos actualizados correctamente","success");         
//             }
//             else{
//                 Swal.fire("Mensaje de advertencia", "El insumo ya existe!","warning");
//             }
//         }
//         else{
//             Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
//         }
//     })
// }