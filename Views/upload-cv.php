<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
<<<<<<< HEAD
               <br>
             <strong>El cv tiene que estar en formato pdf</strong>
            <form action="<?php echo FRONT_ROOT ?>JobOffer/insertCv" method="POST" encype="multipart/form-data">
                <input type="file" name="pdf" value="" required><br><br>
                <button type="submit" name="submit" value="Upload">Subir Archivo</button>
            </form>
=======
               <h2 class="mb-4">Subir Currículum</h2>
               <form action="<?php echo FRONT_ROOT ?>User/Apply" method="post" class="bg-light-alpha p-5">
                    <div class="row">     
                    <input type="text" name="IdjobOffer" value="<?php echo $IdjobOffer; ?>" class="form-control" style="display:none">
                    <input type="text" name="fileNumber" value="<?php echo $fileNumber; ?>" class="form-control" style="display:none">                    
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Cargar Archivo</label>
                                   <input type="file" name="CV" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Descripción Personal</label>
                                   <input type="text" name="AplicantDescription" value="" class="form-control">
                              </div>
                              <button type="submit" class="btn btn-dark ml-auto d-block">Enviar</button>

                         </div>
                    </div>
                    </form>
>>>>>>> 5f1a600e4695a59c720d6eb49abeb9a3d22b168f
          </div>
     </section>
</main>