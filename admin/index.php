<?php  

    require '../includes/funciones.php';
    // El usuario esta autenticado
    $auth = estaAutenticado();
            
    if(!$auth){
        header('Location: /');
    }

                        // DATA BASE //

    // Importar la Conexion
    require '../includes/templates/config/database.php';
    $db = conectarDB();

    // Escribir el Query
    $query = "SELECT * FROM propiedades";

    // Consultar la base de datos
    $resultadoConsulta = mysqli_query($db, $query);


    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    // CONDICIONAL PARA ELIMINAR PROPIEDAD DE LA DATABASE
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            // ELIMINAR IMAGEN DEL SERVIDOR
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);

            $propiedad = mysqli_fetch_assoc($resultado);
            unlink('../imagenes/' . $propiedad['imagen']);
          

            // ELIMINAR PROPIEDAD DE LA DB
            $query = "DELETE FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);

            if($resultado){
                header('location: /admin/index.php?resultado=3');
            }
        }
    }


    // Incluye un template
    
    incluirTemplate('header');

?>

    <main class="contenedor">
        <h1>Administrador de Bienes Raices</h1>

        <?php if(intval($resultado) === 1) :?>
            <p class="alerta exito">Enviado Correctamente</p>
        <?php elseif(intval($resultado) === 2) : ?>
            <p class="alerta exito">Actualizado Correctamente</p>
        <?php elseif(intval($resultado) === 3) : ?>
            <p class="alerta exito">Anuncio ELiminado Correctamente</p>
        <?php endif ;?>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Crear Propiedades</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>   <!-- Mostrar los resultados --> 
                <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)) :?>

                <tr>
                    <td> <?php echo $propiedad['id']?> </td>
                    <td><?php echo $propiedad['titulo']?></td>
                    <td><img src='\imagenes\<?php echo $propiedad['imagen'] ?>' class="imagen-tabla"></td>
                    <td>$<?php echo $propiedad['precio']?></td>
                    <td>

                        <form method="POST" class="w-100">
                            <input type="hidden" name='id' value="<?php echo $propiedad['id']?>">

                            <input type="submit" class="boton boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="update.php?id=<?php echo $propiedad['id']?>" class="boton boton-amarillo-block"> Actualizar </a>
                    </td>
                </tr>

                <?php endwhile; ?>

            </tbody>

        </table>
    </main>

    <?php
    // Cerrar la conexion (OPCIONAL)
    mysqli_close($db);

    // Incluye en template  
    incluirTemplate('footer');
    
    ?>