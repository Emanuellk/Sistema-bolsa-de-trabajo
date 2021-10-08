<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Login and register</title>
    <link rel="stylesheet" href="Views/Css/Style.css">
</head>
<body>
    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="number" placeholder="Numero de Legajo">
                    <input type="email" placeholder="Correo Electronico">
                    <input type="password" placeholder="Contraseña">
                    <button>Entrar</button>
                </form>

                <!--Register-->
                <form action="" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <input type="number" placeholder="Legajo">
                    <input type="text" placeholder="Carrera">
                    <select name="car" class="custom-select" required>Carrera</select>
                    <input type="text" placeholder="Nombre completo">
                    <input type="email" placeholder="Correo Electronico">
                    <input type="text" placeholder="Usuario">
                    <input type="password" placeholder="Contraseña">
                    <button>Regístrarse</button>
                </form>
            </div>
        </div>

    </main>

    <script src="Views/js/script.js"></script>
</body>
</html>