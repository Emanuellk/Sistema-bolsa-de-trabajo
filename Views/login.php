<?php
    require_once('header.php');
?>
    <img src="Views/Images/utn.jpg" alt="">
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
                <form action="<?php echo FRONT_ROOT ?>User/login" class="formulario__login" method="POST">
                    <h2>Iniciar Sesión</h2>
                    <input type="email" placeholder="Email" name="email">
                    <input type="password" placeholder="Password" name="password">
                    <button type="submit">Entrar</button>
                </form>

                <!--Register-->
                <form action="<?php echo FRONT_ROOT ?>User/registerUser" class="formulario__register" method="POST">
                    <h2>Regístrarse</h2>
                    <input type="email" placeholder="Email" name="email">
                    <input type="password" placeholder="Password" name="password">
                    <button type="submit">Regístrarse</button>
                </form>
            </div>
        </div>

    </main>
    
    <script text="Views/js/script.js" src="Views/js/script.js"></script>
    
</body>
</html>
