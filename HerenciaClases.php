<?php
//Se crea la clase que se va a reutilizar
class persona{
    //Se declara la variable publica que se puede usar al instanciar la clase
    public $nombre;
    private $edad;
    protected $altura;
    //Se crea la funcion y se le asigna un parametro
    public function asignaNombre($nuevoNombre){
        //Se iguala nombre con el parametro que recibe la funcion
        $this->nombre=$nuevoNombre;
    }
    public function imprimeNombre(){
         echo "Hola mi nombre es ".$this->nombre;
    }
    public function imprimeEdad(){
        $this->edad=24;
        return $this->edad;
    }
}   
class trabajador extends persona{
    public $puesto;
    public function presentarTrabajador($nuevoPuesto){
        $this->puesto=$nuevoPuesto;
        echo "Hola soy ".$this->nombre." y mi puesto es de ".$this->puesto;
    }
}
    //Se crea el objeto, se instancia la clase y se asigna un valor al parametro
    $objTrabajador= new trabajador();
    $objTrabajador->asignaNombre("Daniel Talavera");
    $objTrabajador->presentarTrabajador("Ingeniero");
?>