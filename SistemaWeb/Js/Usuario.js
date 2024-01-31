function Verificar_Usuario(){
    var Usu=$("#txt_usu").val();
    var Con=$("#txt_con").val();

    if(Usu.length==0 || Con.length==0){
        return Swal.fire("Debe Ingresar Usuario o Contraseña","Warning");
    }
    alert("Usuario Validado")
}