<?php

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

require '../includes/app.php';
// El usuario esta autenticado
estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

// Validar que la URL tenga un ID(INT)
if (!$id) {
    header('Location: /admin/index.php');
}

// Obtener los datos de la propiedad
$propiedad = Propiedad::find($id);


// CONSULTA PARA OBTENER LOS VENDEDORES
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// ARREGLO CON MENSAJE DE ERRORES
$errores = Propiedad::getErrores();


// EJECUTA EL CODGIGO, LUEGO DE QUE EL USUARIO LLENA ES FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propiedad->sincronizar($_POST);

    // Asignar los atributos
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);
    // Validacion
    $errores = $propiedad->validar();

    // Subida de Archivos
    //GENERA UN NOMBRE UNICO
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }
    // REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
    if (empty($errores)) {
        $resultado =  $propiedad->guardar();
    }
}

incluirTemplate('header');
?>


<!-- CODIGO HTML DE LA PAGINA -->
<main class="contenedor">
    <h1>Actualizar Propiedad</h1>

    <a href="/admin/" class="boton boton-verde">Volver</a>

    <!-- IMPRIMIR ERRORES    -->
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>


    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../includes/templates/formulario_propiedades.php' ?>

        <input type="submit" value="Actualizar" class="boton boton-verde">
    </form>

</main>


<?php incluirTemplate('footer');; ?>