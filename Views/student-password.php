<?php     
    require_once('nav.php');   
?>

<div class="card-box">

    <div class="card">

            <div class="top-row background-top-row">
                <h4>Cambiar contraseña</h4>
                <i class="fas fa-unlock" aria-hidden="true"></i>
            </div>

            <div class="content">
                <h2>Contraseña</h2>

                <div class="form-group">
                <label class="formulario__label">Contraseña actual: </label>
                <input class="liPassword" type="password" name="password" value="<?= $user->getPassword()?>" disabled></input>
                <span class="userPassword">
                <i  class="fa fa-eye" id="font" onclick="togglePWUser()" aria-hidden="true"></i>
                </span>
                </div>

            <div class="container">
            <form action="<?php echo FRONT_ROOT ?>User/UpdatePassword" method="post" class="formulario" id="formulario">
                <!--Grupo primera password-->
                <div class="form-group" id="grupo__password">
                    <label for="password" class="formulario__label">Nueva Contraseña:</label>
                    <div class="formulario__grupo-input">
                        <input type="password" class="formulario__input" name="password" id="password" placeholder="Contraseña">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La contraseña debe tener 3 a 15 digitos.</p>
                </div>

                
                <!--Grupo segunda password-->
                <div class="form-group" id="grupo__password2">
                        <label for="password2" class="formulario__label">Repetir Contraseña:</label>
                        <div class="formulario__grupo-input">
                            <input type="password" class="formulario__input" name="password2" id="password2" placeholder="Contraseña" >
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                </div>

                <!----Fin Passwords------->
                <br>
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                <button type="submit" class="boton animado"><span>Confirmar</span></button>
                <br>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Contraseña cambiada exitosamente!</p>
			    </div>
                
                <input type="hidden" name="id" value="password" class="form-control">
                <input type="hidden" name="id" value="password2" class="form-control">
                <input type="hidden" name="id" value="<?php echo $user->getId()?>" class="form-control">
            </form>
            </div>

            </div>
    </div>
    <script src="../Views/js/Javascript.js"></script>
    <script src="../Views/js/formulario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</div>