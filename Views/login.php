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
    <div class="alert alert-warning" role="alert">
         This is a warning alert—check it out!
    </div>
        <?php 
        if(!empty($messaje))
        echo "<script>alert('$message')</script>"; 
        ?>
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
                
                <form class="form-signin" method="post" action="<?php echo FRONT_ROOT ?>User/login">
                    <h2>Iniciar Sesión</h2>
                    <input type="email" placeholder="Correo" name="email">
                    <input type="password" placeholder="Contraseña" name="password">
                    
                    <button type="submit"  class="btn btn-dark ml-auto d-block">Agregar</button>
                </form>

               
            </div>
        </div>

    </main>

    <script src="Views/js/script.js"></script>
</body>
</html>