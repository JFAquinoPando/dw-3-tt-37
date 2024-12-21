<?php
    session_start();
    header("Content-Type: application/json");
    $conexion = new mysqli("localhost", "root", "", "registro_usuarios");

    $opcion=$_POST["opcion"];
    if ($opcion == "login") {
        $contrasenha = md5($_POST["contrasenha"]);
        $correo = $_POST["correo"];
        $sql="SELECT * FROM usuarios where correo = '{$correo}' and contrasenha = '{$contrasenha}'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows) {
            $fila = $resultado->fetch_assoc();
            $res = [
                "resultado" => "ok",
                "datos" => $fila["nombre"]
            ];
            $_SESSION["nombre"] = $fila["nombre"];
            $_SESSION["correo"] = $fila["correo"];
        }else{
            $res =  [
                "resultado" => "error",
                "datos" =>  "anonimo"
            ];
        }

        echo json_encode($res);


    }