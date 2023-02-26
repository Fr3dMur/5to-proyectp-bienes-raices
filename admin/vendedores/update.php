<?php  
require '../../includes/App.php';
use App\Vendedor;

// El usuario esta autenticado
estaAutenticado();

$vendedor = new Vendedor;

 // ARREGLO CON MENSAJE DE ERRORES
 $errores = Vendedor::getErrores();

 // EJECUTA EL CODGIGO, LUEGO DE QUE EL USUARIO LLENA ES FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asignar los atributos
    $args = $_POST['vendedor'];
    // Sincronizar obketo en memoria con lo que el usuario escribio
    $vendedor->sincronizar($args);
    // Vendedor Validacion
    $errores = $vendedor->validar();

    if (empty($errores)) {
            $vendedor->guardar();
        }
}

incluirTemplate('header');
?>

<!-- CODIGO HTML DE LA PAGINA -->
    <main class="contenedor">
        <h1>Actualizar Vendedor</h1>

        <a href="/admin/" class="boton boton-verde">Volver</a>

        <!-- IMPRIMIR ERRORES    -->
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach; ?>

        <form action="/admin/vendedores/update.php" class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_vendedores.php'?>

            <input type="submit" value="Guardar Cambios" class="boton boton-verde">
        </form>
    </main>
    <?php  incluirTemplate('footer');;?>