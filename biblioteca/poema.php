<?php

class Poema {
    private $id;
    private $titulo;
    private $autor;
    private $contenido;
    private $imagen;

function __construct($id, $titulo,$autor,$contenido,$imagen){
    $this->id = $id;
    $this->titulo = $titulo;
    $this->autor = $autor;
    $this->contenido = $contenido;
    $this->imagen = $imagen;

}

function __construct2($titulo,$autor,$contenido,$imagen){
    $this->titulo = $titulo;
    $this->autor = $autor;
    $this->contenido = $contenido;
    $this->imagen = $imagen;
}

function __construct3(){

}

public function setId($id)
{
    $this->id = $id;
}

public function getId()
{
    return $this->id;
}

public function setTitulo($titulo)
{
    $this->titulo = $titulo;
}

public function getTitulo()
{
    return $this->autor;
}

public function setAutor($autor)
{
    $this->autor = $autor;
}

public function getAutor()
{
    return $this->autor;
}

public function setContenido($contenido)
{
    $this->contenido = $contenido;
}

public function getContenido()
{
    return $this->contenido;
}

public function setImagen($imagen)
{
    $this->imagen = $imagen;
}

public function getImagen()
{
    return $this->imagen;
}

}

?>