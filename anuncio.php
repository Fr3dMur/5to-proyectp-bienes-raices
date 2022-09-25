<?php  

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

// Validar que la URL tenga un ID(INT)
if(!$id) {
    header('Location: /');
}

/** DATA BASE */

    // IMPORTAR CONEXION
    require __DIR__ . '/includes/templates/config/database.php' ;
    $db = conectarDB();

    // CONSULTAR DATABASE
    $query = "SELECT * FROM propiedades WHERE id = ${id}";

    // LEER LA DATABASE
    $resultado = mysqli_query($db, $query);

    // COMPROBAR QUE RESULTADO SEA UN NUMERO EXISTENTE
    if(!$resultado->num_rows){
        header('Location: /');
    };
    
    require 'includes/funciones.php';
    incluirTemplate('header');
    
    ?>

<main class="contenedor seccion contenido-centrado relativo">
    <?php 
    $propi = mysqli_fetch_assoc($resultado);
    ?>
        <div class="arrow">
            <a href="anuncios.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M20 15h-8v3.586a1 1 0 0 1 -1.707 .707l-6.586 -6.586a1 1 0 0 1 0 -1.414l6.586 -6.586a1 1 0 0 1 1.707 .707v3.586h8a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1z" />
                </svg>
            </a>
        </div>
        <h1 class="title-anuncio"><?php echo $propi['titulo']; ?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $propi['imagen'];?>" alt="Imagen de la Propiedad">

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propi['precio']; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono_wc" loading="lazy">
                    <p><?php echo $propi['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono icono_estacionamiento" loading="lazy">
                    <p><?php echo $propi['estacionamiento']; ?></p>
                </li>  
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio" loading="lazy">
                    <p><?php echo $propi['habitaciones']; ?></p>
                </li>
            </ul>
            <p><?php echo $propi['descripcion']; ?></p>
        </div>
    </main>

    <?php  
        // CLOSE DATABASE CONECTION
        mysqli_close($db);

        incluirTemplate('footer');
?>

