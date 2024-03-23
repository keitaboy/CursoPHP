var tableDoctor;

function listar_Doctor() {
    tableDoctor = $("#tabla_Doctor").DataTable({
        "ordering": false,
        "bLengthChange": false,
        "searching": { "regex": false },
        "lenghtMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "ALL"]],
        "pageLenght": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../Controlador/Doctor/controlador_Doctor_listar.php",
            type: 'POST'
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "Medico" },
            { "data": "TypeDoctName" },
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
        select: true
    });
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

// function Registrar_Doctor(){
//     var Doctor = $("#txt_Doctor").val();
//     var estatus = $("#cbm_Doctor").val();

//     if(Doctor.length == 0 || estatus.length == 0 ){
//         Swal.fire("Mensaje de advertencia", "Llene los campos vacios","warning");
//     }
//     $.ajax({
//         "url":"../Controlador/Doctor/controlador_Doctor_registro.php",
//         type:'POST',
//         data:{
//             Doctor:Doctor,
//             estatus:estatus
//         }
//     }).done(function(resp){
//         console.log(resp);
//         if(resp>0){
//             if(resp==1){
//                 $("#modal_registro").modal('hide');
//                 listar_Doctor();
//                 LimpiarCampos();
//                 Swal.fire("Mensaje de confirmacion", "Datos guardados correctamente","success");         
//             }
//             else{
//                 LimpiarCampos();
//                 Swal.fire("Mensaje de advertencia", "La Doctor ya existe!","warning");
//             }
//         }
//         else{
//             Swal.fire("Mensaje de error", "No se pudo completar el registro","error");
//         }
//     })
// }

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