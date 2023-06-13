<?php 

//*AUTOLAD:  es una técnica que permite cargar automáticamente las clases cuando son necesarias, sin tener que incluir manualmente los archivos de clase en cada punto del código.

//Se utiliza la función spl_autoload_register() para registrar una o varias funciones de autoload.

//usar el código con spl_autoload_register() limita mucho el tema de la separación por carpetas. (LA MODULARIZACIÓN)
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
    function __set($name, $value){
        $this->$name = $value;
    }
    function __get($name){
        return $this->$name;
    }
}

function autoload($class){
    //Directiorios donde buscar archivos de clases
    $directories =[
        //TODO: Qué es __DIR__?: Da la ruta específa. dir siempre busca la carpeta en la cual está guardado el archivo. Es la ruta que siempre hago para acceder a mis archivos.
        //?dirname es la que captura el dominio principal en donde se encuentra el archivo o el dominio de mi web. (la carpeta o repositorio), en una configuración básica el dominio es el nombre de la carpeta en donde se tienen alojados todos los archivos.
        
        //*Esto sirve para salir de las carpeta, es más dinámico, sale y desde afuera busca el archivo :D
        dirname(__DIR__).'/scripts/bill/',
        dirname(__DIR__).'/scripts/client/',
        dirname(__DIR__).'/scripts/product/',
        dirname(__DIR__).'/scripts/seller/',
        dirname(__DIR__).'/scripts/db/'
    ];

    $classFile = str_replace("\\","/", $class).".php"; //*esto me dice coja el nombre y pongale el .php

    foreach ($directories as $directory) {

        $file = $directory.$classFile;
        if (file_exists($file)){
            require $file;
            return; //?Si en vez de return pongo break se ven errores a futuro. En una iteración el no detecta el break como ruptura. Ya que en un foreach no puedo controlar la condición, por esto puede fallar.
        } else {
            echo "ERROR";
        }
    }
}

//!La clase se tiene que llamar igual que el nombre del archivo (para solucionar un archivo con varias clases tengo que usar el namespace)
spl_autoload_register("autoload"); //Está observando
 
$_DATA = file_get_contents("php://input"); //?Abrase y detecte todas las entradas. ¡Estudiar a fondo!
$_METHOD = $_SERVER["REQUEST_METHOD"];
$_HEADER = apache_get_modules
?>