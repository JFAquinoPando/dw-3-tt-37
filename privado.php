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
    <div>
        <p>Para agregar en filas más abajo, coloca el separador "+"</p>
    </div>
    <div>
        <form action="php/generar_excel.php" method="post">
            <textarea name="guardar_excel" placeholder="Ingresa datos para guardar en el excel"></textarea>
            <button>Guardar Excel</button>
        </form>
    </div>

    <p style="text-align: center;">
            <a href="./cerrar_sesion.php">Cerrar sesión</a>
    </p>
</body>
</html>