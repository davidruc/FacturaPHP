<?php


    trait getInstance{
        static $instance; //por buena prácica se pone debajo del constructor, por la sobrecarga
        static function getInstance(){
            $arg = func_get_args(); //Hacemos esto porque no funciona directamente
            $arg = array_pop($arg);
            if(self::$instance == null){
                // self::$instance = new self("Jhon", "22"); //*configuración básica
                self::$instance = new self(...(array) $arg); //*Normalmente pasamos un array, ...(array) devuelve el array desconstruiodo sin las posiciones, y func_get_args devuelve los argumentos
            }
            return self::$instance;
        }
    }
    
    // declare(strict_types=1); //TODO: Es para que las funciones o métodos no puedan realizar conversiones
    class Humano{
        //Desde la version 8 no hay necesidad de declarar las variables, si no lo hago queda pública. 
        // public $name;
        // private $age;
        // function __construct($name, $age){
        //     $this->name = $name;
        //     $this->age = $age;
        // } //!Antes de la versión 8 tocaba así

        //?DESDE LA VERSIÓN 8 SE PUEDE CREAR DE CONSTRUCT MÁS FÁCILMENTE:
        function __construct(public $name, private $age){} //TODO: Bonito :D
        use getInstance;
        public function getName(){
            return $this->name;
        }
        static function ropa(){
            return "Camisa blanca";
        } //? cuando es un método o propiedad estática la puedo llamar directamente sin instanciar. 
    }
    var_dump(Humano::ropa()."<br>"); //? Asi es como se accede a esto. 
    // $obj = new Humano("David", 22);
    // var_dump($obj->getName());  //?SINGLETON evita hacer esto. 

    //Para llamar una función debe ser así:
    var_dump(Humano::getInstance(["name"=>"David", "age"=>23])->getName()); 

    //!singleton es una sola instancia
?>