<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Formulario Modal</title>
    <link rel="stylesheet" href="css/cssForm.css">
</head>

<body>

    <!-- MODAL-->
    <div id="miModal" class="modal">
        <div class="modal-contenido">
            <span class="cerrar" id="cerrarModal">&times;</span>

            <form id="formulario" action="nuevoPoema.php" method="POST" enctype="multipart/form-data">
                <center>
                    <h2>Formulario Poema</h2>
                </center>
                <br>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Título</span>
                    <input type="text" class="form-control" name="titulo" required>
                </div>

                <br>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Autor</span>
                    <input type="text" class="form-control" name="autor" required>
                </div>
                <br>

                <div class="form-floating">
                    <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="poema" required></textarea>
                    <label for="floatingTextarea2">Escribe tu poema...</label>
                </div>
                <br>

                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="imagen" accept="image/png, image/jpeg" required>
                    <label class="input-group-text" for="inputGroupFile02">Escoge tu imagen</label>
                </div>
                <br>
                
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>



    <!-- Banner-->

    <div class="banner-container">

        <!-- Navbar-->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="nav-left">

                    <img src="logo.svg" style="width:50; height:50px" />
                    <h4>Biblioteca de Poemas</h4>
                </div>
                <button class="btn btn-sm btn-outline-secondary" id="abrirModal">Ingresar Poema</button>
            </div>
        </nav>

        <!-- JUMBOTRON-->

        <div class="control-class">

        </div>

        <div class="jumbotron">
            <h1>Comparte tu poesía...</h1>
            <p>Descubre el poder de las palabras compartidas en nuestro espacio dedicado a la poesía. <br>
                Aquí, cada verso es un regalo del alma, una melodía que resuena en los corazones de quienes la escuchan.
                <br>
                Únete a nuestra comunidad de amantes de la poesía y comparte tus propios versos, inspirando y siendo
                inspirado por la magia de las palabras.
            </p>
        </div>


    </div>

    <!-- Cards-->

    <div class="container">

        <div class="row">
         
            <div class="row">
            <?php
        
            $poemas = json_decode(file_get_contents("poemas.txt"), true);

            foreach ($poemas as $poema) {
                echo '<div class="col-md-3">';
                echo '<div class="card">';
                echo '<img src="' . $poema["imagen"] . '" class="card-img-top custom-img">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $poema["titulo"] . '</h5>';
                echo '<p class="card-text">' . $poema["autor"] . '</p>';
                echo '<div class="card-button-container">';
                echo '<button type="button" class="btn btn-primary open-modal card-button" data-bs-toggle="modal" data-poema-titulo="'
                 . htmlspecialchars($poema["titulo"]) 
                 . '" data-poema-contenido="'
                 . htmlspecialchars($poema["contenido"]) . '">';
                echo 'Leer poema';
                echo '</button>';
                echo '<a href="deletepoema.php?id=' . $poema['id'] . '" class="btn btn-danger card-button">Eliminar</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

            }
            ?>

            

        </div>

    </div>
    </div>


    <!-- MODAL POEMA-->

    <div id="modalPoema" class="modal">
        <div class="contenido-modal-poema">
            
            <center><h1 id="poemaTitulo"><!--El titulo usando JS--></h1></center>
            <div class="poema-container">
             <!--Poema va aquí usando JS-->
            </div>
            <center><button type="button" class="btn btn-danger" id="cerrarPoema">Cancelar</button> </center>
          
        </div>
    </div>



    <!-- footer-->

    
    <script src="js/script.js"></script>
    <script src="js/script2.js"></script>


    <footer class="pie-pagina">
        <p>&copy; 2024 - Todos los derechos reservados</p>
    </footer>

    <script>
    $(document).ready(function() {
        $('.open-modal').click(function() {

            var poemaTitulo = $(this).data('poema-titulo');
            var poemaContenido = $(this).data('poema-contenido');

            $('#modalPoema #poemaTitulo').text(poemaTitulo);
            $('#modalPoema .poema-container').html(poemaContenido);
            $('#modalPoema').modal('show');
        });
    });
</script>

</body>

</html>