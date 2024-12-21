<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <form action="./php/usuarios.php" method="post">
        <div>
            <label for="correo">Correo electrónico;</label>
            <input type="mail" id="correo"  name="correo">
        </div>
        <div>
            <label for="contrasenha">Contraseña:</label>
            <input type="password" id="contrasenha" name="contrasenha">
        </div>
        <input type="hidden" name="opcion" value="login">
        <button>Iniciar sesión</button>
    </form>
    <script type="module" >
        const $ = (p) =>document.querySelector(p)
        const formulario = $("form")
        formulario.addEventListener("submit", (evento) => {
            evento.preventDefault()
            fetch(formulario.action, {
                method:formulario.method,
                body: new FormData(formulario)
            }).then(
                peticion => peticion.json()
            ).then(
                resultado => {
                    if (resultado.resultado === "ok") {
                        Swal.fire({
                            title: "Bienvenido",
                            text: `Hola ${resultado.datos}, vamos la página privada`,
                            icon: "success"
                        }).then(
                            (valor) => {
                                window.location.href="privado.php"
                            }
                        );
                    }else{
                        Swal.fire({
                            title: "Datos incorrectos",
                            text: "No existe usuario con estas credenciales",
                            icon: "error"
                        });
                    }
                }
            )
        })

    </script>
</body>
</html>