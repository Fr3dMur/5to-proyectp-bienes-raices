<?php  
require '../includes/App.php';
// El usuario esta autenticado
estaAutenticado();

use App\Propiedad;
use App\Vendedor;

// Implementar un metodo para obtener todas las propiedades
$propiedades = Propiedad::all();
$vendedor = Vendedor::all();

// Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;

// CONDICIONAL PARA ELIMINAR PROPIEDAD DE LA DATABASE
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){
        $propiedad = Propiedad::find($id);

        $propiedad->Eliminar();
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
            <?php foreach($propiedades as $propiedad) :?>

            <tr>
                <td> <?php echo $propiedad->id?> </td>
                <td><?php echo $propiedad->titulo?></td>
                <td><img src='\imagenes\<?php echo $propiedad->imagen ?>' class="imagen-tabla"></td>
                <td>$<?php echo $propiedad->precio?></td>
                <td>

                    <form method="POST" class="w-100">
                        <input type="hidden" name='id' value="<?php echo $propiedad->id?>">
                        <input type="submit" class="boton boton-rojo-block" value="Eliminar">
                    </form>

                    <a href="update.php?id=<?php echo $propiedad->id?>" class="boton boton-amarillo-block"> Actualizar </a>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php
// Cerrar la conexion (OPCIONAL)
mysqli_close($db);

// Incluye en template  
incluirTemplate('footer');
?>