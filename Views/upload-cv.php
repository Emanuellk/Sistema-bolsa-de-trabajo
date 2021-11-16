<?php     
    require_once('nav.php');   
?>
<h2 class="cv">Subir CV</h2>
<div class="user-uploadCv">
     <section id="listado" class="mb-5">
          <div class="container">
               <br>
            <form action="<?php echo FRONT_ROOT ?>JobOffer/UploadCv" method="POST" encype="multipart/form-data">
                <input type="file" name="archivo">
                <br><br>
                <button>Subir Archivo</button>
            </form>
          </div>
     </section>
</div>

