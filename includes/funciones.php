<?php

function incluirTemplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL . "${nombre}.php";
};

define('TEMPLATES_URL', __DIR__.'/templates/');
define('FUNCIONES_URL', __DIR__.'funciones.php');
define('CARPETA_IMAGENES',__DIR__ . '/../imagenes/');


function estaAutenticado() {
       // El usuario esta autenticado
       session_start();

       if(!$_SESSION['login']){
        header('Location: /');
       }
}

function debuggear($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
exit;
}

// Escapa / Sanitizar el HTML
function s($html){
    $s = htmlspecialchars($html);
    return $s;
}