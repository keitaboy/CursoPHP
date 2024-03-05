function VerificarUsuario() {
    var Usu = $("#txt_usu").val();
    var Con = $("#txt_con").val();
    if (Usu.length == 0 || Con.length == 0) {
        return Swal.fire("Debe Ingresar Usuario o Contraseña", "Warning");
    }

    $.ajax({
        url: '../Controlador/usuario/controlador_verificar_usuario.php',
        type: 'POST',
        data: {
            user: Usu,
            pass: Con
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
        }
    }).done(function (resp) {
        console.log("Respuesta del servidor:", resp);

        // Extraer la segunda parte (datos del usuario)
        var jsonData = resp.substring(resp.indexOf('['));

        console.log("Aca el primer resp");
        console.log(jsonData);

        try {
            var data = JSON.parse(jsonData);

            if (data && data[0] && data[0][3] === 'INACTIVO') {
                return Swal.fire("Mensaje de advertencia", "Lo sentimos el usuario " + Usu + " se encuentra suspendido", "warning");
            }

            $.ajax({
                url: '../Controlador/usuario/controlador_crear_sesion.php',
                type: 'POST',
                data: {
                    idUsuario: data[0][0],
                    user: data[0][1],
                    rol: data[0][5]
                }
            }).done(function (resp) {
                let timerInterval;
                Swal.fire({
                    title: 'Bienvenido al sistema',
                    html: 'Usted sera redireccionado en <b></b> milisegundos.',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector('b');
                        timerInterval = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload();
                    }
                });
            });
        } catch (error) {
            console.error('Error al analizar la respuesta JSON:', error);
            // Tratar el error, por ejemplo, mostrar un mensaje al usuario
            Swal.fire("Error", "Error de usuario y/o contraseña", "error");
            return; // Detener la ejecución del código
        }
    });
}
var table;
function Listar_Usuario() {
     table = $("#tabla_usuario").DataTable({
        "ordering": false,
        "paging": false,
        "searching": { "regex": true },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../Controlador/usuario/Controlador_Usuario_Listar.php",
            "type": 'POST'
        },
        "columns": [
            { "data": "Posicion" },
            { "data": "UsuUser" },
            { "data": "RolName" },
            {
                "data": "Sex",
                "render": function (data, type, row) {
                    if (data == 'M') {
                        return "Masculino";
                    } else {
                        return "Femenino";
                    }
                }
            },
            {
                "data": "State",
                "render": function (data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    } else {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }
                }
            },
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],
        "language": idioma_espanol,
        "select": true
    })

    document.getElementById("tabla_usuario_filter").style.display = "none";

    $('.input.global_filter').on('keyup click', function () {
        filterGlobal();
    });

    $('.input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });

    function filterGlobal() {
        table.search(
            $('#global_filter').val()
        ).draw();
    }

    function filterColumn(column) {
        table.column(column).search(
            $('input.column_filter[data-column="' + column + '"]').val()
        ).draw();
    }
}

//Descomentar esta parte unicamente cuando llegas aca mrda 
// function Modificar_Usuario(){
//     var idUsuario = $("#txtidusuario").val();
//     var sexo = $("#cbm_sexo_editar").val();
//     var rol = $("#cbm_rol_editar").val();
//     if(idUsuario.length == 0 || sexo.length == 0 || rol.length == 0) {
//         return Swal.fire("Mensaje de advertencia","Llene los campos vacios","Warning");
//     }

//     $.ajax({
//         "url": "../Controlador/usuario/Controlador_Usuario_Modificar.php",
//         type: 'POST',
//         data:{
//             idUsuario : idUsuario,
//             sexo : sexo,
//             rol : rol
//         }
//     }).done(function (resp){
//         if(resp>0){
//          // Descomentar cuando ya funcione tu wuebada
//          // TraerDatosUsuario();
//             $("#modal_editar").modal('hide');
//             Swal.fire("Mensaje de confirmacion","Datos actualizados correctamente","success").then((value)=>{
//                 table.ajax.reload();
//             });
//         }else{
//             Swal.fire("Mensaje de error","Lo sentimos, no pudimos completar la actualizacion","error");
//         }
//     })
// }

function TraerDatosUsuario() {
    var usuario = $('#usuarioprincipal').val(); // Corrección aquí
    $.ajax({
        "url": "../Controlador/usuario/controlador_traerdatos_usuario.php",
        type: 'POST',
        data: {
            usuario: usuario // Corrección aquí
        }
    }).done(function (resp) {
        var data = JSON.parse(resp);
        if (data.length > 0) {
            if (data.length > 0) {
                $("#txtcontra_bd").val(data[0][2]);
                if (data[0][4] === "M") {
                    $("#img_nav").attr("src", "../../Plantilla/dist/img/avatar5.png");
                    $("#img_subnav").attr("src", "../../Plantilla/dist/img/avatar5.png");
                    $("#img_lateral").attr("src", "../../Plantilla/dist/img/avatar5.png");
                } else {
                    $("#img_nav").attr("src", "../../Plantilla/dist/img/avatar3.png");
                    $("#img_subnav").attr("src", "../../Plantilla/dist/img/avatar3.png");
                    $("#img_lateral").attr("src", "../../Plantilla/dist/img/avatar3.png");
                }
            }
        }
    })
}

function EditarContra() {
    var idUsuario = $("#txtidprincipal").val();
    var contraBD = $("#txtcontra_bd").val();
    var contraEscrita = $("#txtcontraactual_editar").val();
    var contraNueva = $("#txtcontranueva_editar").val();
    var contraRepetir = $("#txtcontrarepetir_editar").val();
    if (contraEscrita.length == 0 || contraNueva.length == 0 || contraRepetir.length == 0) {
        console.log("Entra aqui 1");
        return Swal.fire("Mensaje de advertencia", "Llene los campos vacios", "Warning");
    }
    if (contraNueva != contraRepetir) {
        console.log("Entra aqui 2");
        return Swal.fire("Mensaje de advertencia", "Debes ingresar la misma clave", "Warning");
    }
    $.ajax({
        url: '../Controlador/usuario/controlador_contra_modificar.php',
        type: 'POST',
        data: {
            idUsuario: idUsuario,
            contraBD: contraBD,
            contraEscrita: contraEscrita,
            contraNueva: contraNueva
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_editar_contra").modal('hide');
                LimpiarEditarContra();
                Swal.fire("Mensaje de confirmacion", "Contrase\u00f1a actualizada correctamente", "success").then((value) => {
                    TraerDatosUsuario();
                });
            } else {
                Swal.fire("Mensaje de error", "La contrase\u00f1a ingresada no coincide", "error");
            }
        } else {
            Swal.fire("Mensaje de error", "No se pudo verificar contrase\u00f1a", "error");
        }
    })
}

function LimpiarEditarContra(){
    $("#txtcontraactual_editar").val("");
    $("#txtcontranueva_editar").val("");
    $("#txtcontrarepetir_editar").val("");
}

function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

function AbrirModalEditarContra() {
    $("#modal_editar_contra").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar_contra").modal('show');
    $("#modal_editar_contra").on('shown.bs.modal', function () {
        $("#txtcontraactual_editar").focus();
    })
}

function listar_combo_rol(){
    $.ajax({
        "url": "../Controlador/usuario/controlador_combo_rol_listar.php",
        "type": 'POST'
    }).done(function(resp){
        var data=JSON.parse(resp);
        var cadena="";
        if (data.length>0) {
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cbm_rol").html(cadena);
        }else{
            cadena+="<option value=''No se Encontraron Registros</option>";
        }
    })
}

function Registrar_Usuario(){
    var usu=$("#txt_usu").val();
    var contra=$("#txt_con1").val();
    var contra2=$("#txt_con2").val();
    var rol=$("#cbm_rol").val();
    if (usu.length==0 || contra.length==0 || contra2.length==0 || rol.length==0 ) {
      return Swal.fire("Mensaje de advertencia","Llene los campos vacios","warning");  
    } 
    if (contra!=contra2) {
        return Swal.fire("Las contraseñas deben coincidir","warning");  
    }
    $.ajax({
        "url": "../Controlador/usuario/controlador_usuario_registro.php",
        "type": 'POST',
        data:{
            usuario:usu,
            contrasena:contra,
            rol:rol
        }
    }).done(function(resp){
        alert(resp);
        if (resp>0){
            if (resp==1) {
                $("#modal_registro").modal('hide');
                Swal.fire("Mensaje de confirmacion","Datos guardados correctamente, Nuevo Usuario Registrado","sucess").then((value)=>{
                    LimpiarRegistro();
                    table.ajax.reload();
                });  
            }else{
                return Swal.fire("Mensaje de advertencia","El nombre del usuario ya se encuentra en uso","warning"); 
            }
        }else{
            Swal.fire("Mensaje de error","Lo sentimos no se pudo completar el registro","error");  
        }
    })
}

function LimpiarRegistro() {
    $("#txt_usu").val("");
    $("#txt_con1").val("");
    $("#txt_con2").val("");
}