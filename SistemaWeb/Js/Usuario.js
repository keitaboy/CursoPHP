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
                console.log("Aca el segundo resp");
                console.log(resp);
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
    var table=$("#Tabla_Usuario").DataTable({
        "ordering":false,
        "paging":false,
        "searching":{"regex":true},
        "lengthMenu":[[10,25,50,100,-1],[10,25,50,100,"All"]],
        "pageLength": 10,
        "destroy":true,
        "async":false,
        "processing":true,
        "ajax":{
            "url":"../Controlador/Usuario/Controlador_Usuario_Listar.php",
            type:'POST'
        },
        "columns":[
            {"data":"posicion"},
            {"data":"persona"},
            {"data":"Usu_IdUsuario"},
            {"data":"Usu_Usuario"},
            {"data":"Usu_Estado"},
            {"data":"Usu_Rol",
            render: function (data,type,row) {
                if (data=='ACTIVO') {
                    return"<span class='label label-sucess'>"+data+"</span>";
                }else{
                    return"<span class='label label-danger'>"+data+"</span>";
                }
            },
        },
        {"defaultcontent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary'>"}
        ],
        "language":Idiona_Espanol,
        select:true
    });
}