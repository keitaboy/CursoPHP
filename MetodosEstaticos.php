<?php
class  unaClase{
    public static function unMetodo(){
        echo "Hola soy un metodo estático";
    }
}
    //$obj=new unaClase();
    //$obj->unMetodo();
    //Cuando se tiene un metodo estatico se puede llamar directamente de esta forma
    unaClase::unMetodo();
?>