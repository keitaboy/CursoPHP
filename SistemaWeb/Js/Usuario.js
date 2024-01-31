function Verificar_Usuario(){
    var Usu=$("#Txt_Usu").val();
    var Con=$("#Txt_Con").val();

    if(Usu.length==0 || Con.length==0){
        return Swal.fire("Debe Ingresar Usuario o Contraseña","Warning");
    }
    alert("Usuario Validado")
}