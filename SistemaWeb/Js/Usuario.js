function VerificarUsuario(){
    var Usu=$("#txt_usu").val();
    var Con=$("#txt_con").val();
    if(Usu.length==0 || Con.length==0){
        return Swal.fire("Debe Ingresar Usuario o Contraseña","Warning");
    }
    $.ajax({
        url:'../Controlador/usuario/controlador_verificar_usuario.php',
        type: 'POST',
        data:{
            user:Usu,
            pass:Con            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
        }            
    }).done(function(resp){
        console.log("Aca el primer resp");
        console.log(resp);

        console.log("Usuario en el servidor:", resp.log_user);
    console.log("Contraseña en el servidor:", resp.log_pass);
    
        if(resp==0){
            Swal.fire("Mensaje de error",'Usuario y/o contrase\u00f1a incorrectas', "error");
        }else{
            var data = JSON.parse(resp);
            if (data && data[0] && data[0][3] === 'INACTIVO') {
                return Swal.fire("Mensaje de advertencia", "Lo sentimos el usuario " + Usu + " se encuentra suspendido", "warning");
            }
            $.ajax({
                url:'../Controlador/usuario/controlador_crear_sesion.php',
                type: 'POST',
                data:{
                    idUsuario:data[0][0],
                    user:data[0][1],
                    rol:data[0][5]
                }
            }).done(function(resp){
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
            })
        }
    })
}