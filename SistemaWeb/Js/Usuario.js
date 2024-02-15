function Verificar_Usuario(){
    var Usu=$("#Txt_Usu").val();
    var Con=$("#Txt_Con").val();

    if(Usu.length==0 || Con.length==0){
        return Swal.fire("Debe Ingresar Usuario o Contraseña","Warning");
    }
    alert("Usuario Validado")
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