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
function Listar_Usuario() {
    var table = $("#tabla_usuario").DataTable({
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
            {"data":"Posicion"},
            {"data": "UsuUser"},
            {"data": "RolName"},            
            {"data": "Sex",
            "render": function (data, type, row) {
                if (data == 'M') {
                    return "Masculino";
                } else {
                    return "Femenino";
                }
            }},
            {"data": "State",
                "render": function (data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    } else {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }
                }
            },            
            {"defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>"}
        ],
        "language": idioma_espanol,
        "select": true
    })

    document.getElementById("tabla_usuario_filter").style.display="none";
    
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
//             $("#modal_editar").modal('hide');
//             Swal.fire("Mensaje de confirmacion","Datos actualizados correctamente","success").then((value)=>{
//                 table.ajax.reload();
//                 // Descomentar cuando ya funcione tu wuebada
//                // TraerDatosUsuario();
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
        if(data.length>0){
            if(data.length>0){
                if(data[0][4]==="M"){
                    $("#img_nav").attr("src","../../Plantilla/dist/img/avatar5.png");
                    $("#img_subnav").attr("src","../../Plantilla/dist/img/avatar5.png");
                    $("#img_lateral").attr("src","../../Plantilla/dist/img/avatar5.png");
                } else{
                    $("#img_nav").attr("src","../../Plantilla/dist/img/avatar3.png");
                    $("#img_subnav").attr("src","../../Plantilla/dist/img/avatar3.png");
                    $("#img_lateral").attr("src","../../Plantilla/dist/img/avatar3.png");
                }
            }
        }
    })
}

function AbrirModalRegistro(){
    $("#modal_registro").modal('show');
}
