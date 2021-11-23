<?php     
    require_once('nav.php');   
?>
<h2 class="cv">Subir CV</h2>
<div class="user-uploadCv">
     <section id="listado" class="mb-5">
          <div class="container">
               <br>
             <strong>El cv tiene que estar en formato pdf</strong>
            <form action="<?php echo FRONT_ROOT ?>JobOffer/insertCv" method="POST" encype="multipart/form-data">
                <input type="file" name="pdf" value="" required><br><br>
                <button type="submit" name="submit" value="Upload">Subir Archivo</button>
            </form>
          </div>
     </section>
</div>

