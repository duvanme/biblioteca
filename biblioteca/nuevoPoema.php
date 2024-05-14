<?php
//Valida si el método post es llamado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //abre el archivo de poemas
    $fileContent = file_get_contents("poemas.txt");
    //vuelve el contenido del archivo e n un array
    $poemas = json_decode($fileContent, true);

    //obtiene los datos del formulario para el nuevo poema
    $ultimoPoema = end($poemas);
    if (is_array($ultimoPoema)) {
        $id = $ultimoPoema["id"] + 1;
    } else {
        $id = 1;
    }
    
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $contenido = $_POST["poema"];
    
    if(isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
        
        $imagen = $_FILES["imagen"]["name"];
        
        
        $tmp_name = $_FILES["imagen"]["tmp_name"];

       
        move_uploaded_file($tmp_name, "C:/wamp64/www/PHP_puro/Introducción/biblioteca/biblioteca/img/" . $imagen);
    } else {
       
        echo "No se ha subido ninguna imagen.";
    }
    
    

    //crea un nuevo poema
    $poema = array(
        "id" => $id,
        "titulo" => $titulo,
        "autor" => $autor,
        "contenido" => $contenido,
        "imagen" => "img/".$imagen
    );
    //añadir nuevo poema a los poemas
    array_push($poemas, $poema);
    //añade el nuevo poema al archivo txt
    file_put_contents("poemas.txt", json_encode($poemas));
    
    header("Location: poemario.php");
    exit();
}

?>