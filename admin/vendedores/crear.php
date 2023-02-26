<?php  
require '../../includes/App.php';
use App\Vendedor;

// El usuario esta autenticado
estaAutenticado();

$vendedor = new Vendedor;

 // ARREGLO CON MENSAJE DE ERRORES
 $errores = Vendedor::getErrores();

 // EJECUTA EL CODGIGO, LUEGO DE QUE EL USUARIO LLENA ES FORMULARIO
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Crear una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);
    // Validar que no haya campos vacios
    $errores = $vendedor->validar();
    // No hay errores
    if(empty($errores)){
        $vendedor->guardar();
    }
}

incluirTemplate('header');
?>

<!-- CODIGO HTML DE LA PAGINA -->
    <main class="contenedor">
        <h1>Registrar Vendedor</h1>

        <a href="/admin/" class="boton boton-verde">Volver</a>

        <!-- IMPRIMIR ERRORES    -->
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach; ?>

        <form action="/admin/vendedores/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_vendedores.php'?>

            <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde">
        </form>
    </main>
    <?php  incluirTemplate('footer');;?>