<?php  
require '../../includes/App.php';
use App\Propiedad;
use intervention\image\ImageManagerStatic as Image;

    // El usuario esta autenticado
estaAutenticado();

$db = conectarDB();

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
    $propiedad = new Propiedad($_POST);

    //CREAR CARPETA
    $carpetaImagenes = '../../imagenes/';
    if(!is_dir($carpetaImagenes)){
       mkdir($carpetaImagenes);
    }; 
   
    //GENERA UN NOMBRE UNICO
    $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";

    // SETEAR LA IMAGEN
    // Realiza un resize a la imagen con intervention
    if($_FILES['image']['tmp_name']){
        $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
        $propiedad->setImagen($nombreImagen);
    }

    // VALIDAR
    $errores = $propiedad->validar();

if(empty($errores)){
    // GUARDAR EN DB
    $propiedad->guardar();

    // Guarda la imagen en el servidor
    $image->save($carpetaImagenes . $nombreImagen);

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
            <fieldset>
                <legend>Informacion General</legend>

                    <label for="titulo">Titulo:</label>
                    <input type="text" 
                            name="titulo" 
                            id="titulo" 
                            placeholder="Titulo Propiedad" 
                            value="<?php echo $titulo ;?>"
                    >

                    <label for="precio">Precio:</label>
                    <input type="number" 
                            name="precio" 
                            id="precio" 
                            placeholder="Precio Propiedad" 
                            value="<?php echo $precio ;?>"
                    >

                    <label for="imagen">Imagen:</label>
                    <input type="file" 
                            name="imagen"
                            id="imagen" 
                            accept="image/jpeg, image/png"
                     >

                    <label for="descripcion">Descripcion:</label>
                    <textarea name="descripcion" 
                        id="descripcion" 
                        cols="30" 
                        rows="10" 
                        placeholder="Descripcion Propiedad">
                        <?php echo $descripcion ;?> 
                    </textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>

                    <label for="habitaciones">Habitaciones:</label>
                    <input type="number" 
                            name="habitaciones" 
                            id="habitaciones" 
                            placeholder="Ej: 3" 
                            min="1" 
                            max="9" 
                            value="<?php echo $habitaciones ;?>">

                    <label for="wc">Baños:</label>
                    <input type="number" 
                            name="wc" 
                            id="wc" 
                            placeholder="Ej: 3" 
                            min="1" 
                            max="9" 
                            value="<?php echo $wc ;?>">

                    <label for="estacionamiento">Estacionamientos:</label>
                    <input type="number" 
                            name="estacionamiento" 
                            id="estacionamiento" 
                            placeholder="Ej: 3"
                            min="1" 
                            max="9" 
                            value="<?php echo $estacionamiento ;?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                    <select name="vendedor" id="vendedor">
                        <option value=" " selected>-- Seleccione --</option>
                        <?php while($vendedor = mysqli_fetch_assoc($resultado) ) : ?>
                            <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> 
                                    value="<?php echo $vendedor['id']?>"  >
                                <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']?>
                            </option>
                        <?php endwhile; ?>
                    </select>
            </fieldset>

            <input type="submit" value="Enviar" class="boton boton-verde">
        </form>

    </main>


    <?php  incluirTemplate('footer');;?>