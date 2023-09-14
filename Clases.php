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
    //Se crea el objeto, se instancia la clase y se asigna un valor al parametro
    $objAlumno= new persona();
    $objAlumno->asignaNombre("Daniel");
    //Se imprime la variable nombre
    echo $objAlumno->nombre;

    $objAlumno2= new persona();
    $objAlumno2->asignaNombre("Juan");
    $objAlumno2->imprimeNombre();
    echo " y mi edad es ".$objAlumno2->imprimeEdad();
?>