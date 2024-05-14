<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
//abre el archivo de poemas
$fileContent = file_get_contents("poemas.txt");
//vuelve el contenido del archivo e n un array
$poemas = json_decode($fileContent, true);

//obtiene los datos del formulario para el nuevo poema
$id = $_POST["id"];
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$contenido = $_POST["poema"];
$imagen = $_POST["imagen"];
}


foreach($poemas as $key => $poema){
    if($poema["id"] == $id){
        
        $poemas[$key] = array(
            $id,
            $titulo,
            $autor,
            $contenido,
            $imagen
            );

        break;
    }
}


//añade el nuevo poema al archivo txt
$myfile = fopen("poemas.txt","w") or die("No se pudo abrir el archivo");
fwrite($myfile, json_encode($poemas));
fclose($myfile);

//envío el poema como un JSON
header("Content-Type: application/json");
echo json_encode($poemas);

?>