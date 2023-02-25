<?php  
require '../../includes/App.php';
use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

    // El usuario esta autenticado
estaAutenticado();

$db = conectarDB();

$propiedad = new Propiedad();

    // CONSULTA PARA OBTENER LOS VENDEDORES
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

    // ARREGLO CON MENSAJE DE ERRORES
$errores = Propiedad::getErrores();

    // VARIABLES DE LA BASE DE DATOS
$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';


// EJECUTA EL CODGIGO, LUEGO DE QUE EL USUARIO LLENA ES FORMULARIO
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Crea una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);

    //CREAR CARPETA
    $carpetaImagenes = '../../imagenes/';
    if(!is_dir($carpetaImagenes)){
       mkdir($carpetaImagenes);
    }; 
   
    //GENERA UN NOMBRE UNICO
    $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";

    // SETEAR LA IMAGEN
    // Realiza un resize a la imagen con intervention
    if($_FILES['propiedad']['tmp_name']['imagen']){
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
        $propiedad->setImagen($nombreImagen);
    }

    // VALIDAR
    $errores = $propiedad->validar();

if(empty($errores)){

    // Crear la carpeta para subir imagenes
    if(!is_dir(CARPETA_IMAGENES)){
        mkdir(CARPETA_IMAGENES);
    }

    // Guarda la imagen en el servidor
    $image->save($carpetaImagenes . $nombreImagen);

    // Guarda en la base de datos
    $resultado = $propiedad->guardar();


    if($resultado) {
        // REDIRECCIONAR A USUARIO
        header('Location: /admin/index.php?resultado=1');
    }
}
}

incluirTemplate('header');
?>


<!-- CODIGO HTML DE LA PAGINA -->
    <main class="contenedor">
        <h1>Crear</h1>

        <a href="/admin/" class="boton boton-verde">Volver</a>

        <!-- IMPRIMIR ERRORES    -->
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach; ?>


        <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'?>

            <input type="submit" value="Enviar" class="boton boton-verde">
        </form>

    </main>


    <?php  incluirTemplate('footer');;?>