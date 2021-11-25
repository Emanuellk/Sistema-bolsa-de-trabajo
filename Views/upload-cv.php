<?php
require_once('nav.php');
$User = $this->UserDAO->SearchUserByEmail($_SESSION['loggedUser']);
?>

<section id="listado" class="mb-5">
     <div class="card-box">
          <div class="card">
               <div class="top-row background-top-row">
                    <h4>Subir Currículum</h4>
                    <i class="fas fa-user-circle" aria-hidden="true"></i>
               </div>
               <div class="content">
                    <form action="<?php echo FRONT_ROOT ?>User/AddCv" method="POST" enctype="multipart/form-data" class="bg-light-alpha p-5">

                         <div class="form-group">
                              <label class="formulario__label">Cargar Currículum</label>
                              <input type="file" name="cv" value="" class="form-control" required>
                              <input type="hidden" name="accepted" value="accepted" class="form-control" required>                           
                         </div>
                         <input type="hidden" name="id" value="<?php echo $User->getId() ?>" class="form-control" required>

                         <button type="submit" class="boton animado"><span>Enviar</span></button>
                         <br>
                         <br>
                         <a href="<?php echo $User->getCv() ?>" target="_blank">Ver mi Cv</a>
               </div>
               

               </form>
          </div>
     </div>
     </div>
</section>