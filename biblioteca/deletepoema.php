<?php

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $id = $_GET["id"];
    echo $id;
    //abre el archivo de poemas
    $fileContent = file_get_contents("poemas.txt");
    //vuelve el contenido del archivo e n un array
    $poemas = json_decode($fileContent, true);

    foreach($poemas as $key => $poema){
        if($poema["id"] == $id){
            unset($poemas[$key]);
            break;
        }
    }

//actualizar el array
file_put_contents("poemas.txt", json_encode(array_values($poemas)));

//envío el poema como un JSON
header("Content-Type: application/json");
//echo json_encode($poemas);

header("Location: poemario.php");
exit();

}
?>