<?php  
    // Base de Datos
    require '../../includes/templates/config/database.php';
    $db = conectarDB();

    // CONSULTA PARA OBTENER LOS VENDEDORES
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // ARREGLO CON MENSAJE DE ERRORES
    $errores = [];

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
        // echo '<pre>';
        //     var_dump($_POST);
        // echo '</pre>';

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamiento = $_POST['estacionamiento'];
        $vendedores_id = $_POST['vendedor'];
        $creado = date('Y/m/d');

        // REVISAR QUE CADA CAMPO TENGA SUS VALORES ASIGNADOS
        if(!$titulo) {
            $errores[] = "Debes insertar un titulo";
        }

        if(!$precio) {
            $errores[] = "Debes insertar un precio";
        }

        if(!$descripcion || strlen($descripcion) < 50) {
            $errores[] = "La descripcion es obligatorio, y debe tener al menos 50 caracteres";
        }

        if(!$habitaciones) {
            $errores[] = "Debes insertar habitaciones";
        }

        if(!$wc) {
            $errores[] = "Debes insertar los wc";
        }

        if(!$estacionamiento) {
            $errores[] = "Debes insertar los estacionamientos";
        }

        if(!$vendedores_id) {
            $errores[] = "Debes elegir un vendedor";
        }
        
        // REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO

        if(empty($errores)){
            
                    // INSERTAR EN LA BARRA DE DATOS
                    $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id')";
            
                    //ENVIAR AL SERVIDOR
                    $resultado = mysqli_query($db, $query);
            
                    if($resultado) {
                        // REDIRECCIONAR A USUARIOS

                        header('Location: /admin');
                    }

        }


    }

    require '../../includes/funciones.php';
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


        <form action="/admin/propiedades/crear.php" class="formulario" method="POST">
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
                            min="1" 
                            max="9" 
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
                                    value="<?php echo $vendedor['id']?>">
                                <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']?>
                            </option>
                        <?php endwhile; ?>
                    </select>
            </fieldset>

            <input type="submit" value="Enviar" class="boton boton-verde">
        </form>

    </main>


    <?php  incluirTemplate('footer');;?>