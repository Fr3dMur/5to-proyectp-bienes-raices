<?php 
// Importar la conexion
    require 'App.php';
    $db = conectarDB();

// Crear email y password
    $email = "correo@correo.com";
    $password = "123456";

// Hashear Password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // echo '<pre>';
    //     var_dump($passwordHash);
    // echo '</pre>';

// Query para crear usuario
    $query = "INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}')";

    // echo '<pre>';
    //     var_dump($query);
    // echo '</pre>';
    // exit;



// Agregarlo a la base de datos
    mysqli_query($db, $query);
