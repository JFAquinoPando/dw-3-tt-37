<?php 
session_start();
if ( !isset($_SESSION["nombre"]) ) {
    exit("No puedes ingresar aquí");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Página privada</h1>
    <h2><?php
    echo "Hola {$_SESSION["nombre"]} tu correo es: {$_SESSION["correo"]}";

    ?></h2>
</body>
</html>