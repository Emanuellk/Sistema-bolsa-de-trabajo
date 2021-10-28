<?php     
    require_once('navAdmin.php');   
?>

<div class="job-add">
    <section id = "listado" class="mb-5">
        <div class = "container">
        <br>
               <h2 class="mb-4">Listado de Ofertas laborales</h2>
               <div class="mb-4">
               <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVFJREFUSEvVleExBEEQRt9FQAoiQATIgAgQASJABIgAESACZEAEyIAIqKd6qub2Zmen7N4P/eu2dqdf99dfz81YcsyWnJ8+wCpwBOwCG1HEC3APXAGfrYWVAAfABSCkFCY/AW5aIF2Aya/j4ANwCTzF8zZwBmzF8150VOXkACt+i8oPKxUKOQ2Z1obkygHpoJWrfS3syk7Oo6veb3OAQ1wHdjJZ+g4q1yPgmc1aJTngOz5stW7T92MBXxW3/db7V4mc0R3wDChX0wzSkF0mLdgyZPdBKzcBtOk7sBLO0CGlSIV8xJZXt7o70NS6ibWiyZTBUAr9nyQZtGh3Bqlat9m27aQUDtb3wrSpv2/7NKpddsexcO6G8RpXgwmVJe2N77yX3P6FaPV86Wx+b/VCxgBS0v2MvtDJWMAgZApAFzJ3E08FSBCtPfdHNCWg6NT/D/gBeOVFGZeTouUAAAAASUVORK5CYII="/>                      
               <input type="text" name="search" id="search" placeholder="Buscar..." class="src" autocomplete="off">
               </div>
               <table class="table bg-light-alpha table-primary">
                    <thead>
                         <th>Título</th>
                         <th>Descripción</th>
                         <th>Requerimientos</th>
                         <th>Carga Horaria</th>
                         <th>Fecha de Publicación</th>
                         <th>Fecha de Caducidad</th>
                         <th>Salario</th>
                         <th>Actualizar</th>
                    </thead>
                    <tbody>

                    <?php
                              foreach($jobList as $offer)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $offer->getTitle() ?></td>
                                             <td><?php echo $offer->getDescription() ?></td>
                                             <td><?php echo $offer->getRequirements() ?></td>
                                             <td><?php echo $offer->getWorkLoad() ?></td>
                                             <td><?php echo $offer->getPublicationDate() ?></td>
                                             <td><?php echo $offer->getExpirationDate() ?></td>
                                             <td><?php echo $offer->getSalary() ?></td>
                                             <td>
                                                  
                                                  <button  class = "btn btn-success" type="button"  data-bs-toggle="modal" data-bs-target="#Update<?= $offer->getIdoffer()?> " >
                                                  <i class="fas fa-edit"></i>    
                                                  </button>
                                                  
                                                  <form style="display:inline;" method="POST" action="<?php echo FRONT_ROOT ?>offer/Delete">
                                                  <input type="hidden" name="id" value="<?php echo $offer->getIdoffer()?>" class="form-control">
                                                 
                                                  <button type="submit" class="btn btn-danger" class="buttonF" ><i class="fas fa-trash-alt"></i></button>
                                                  
                                                 
                                                  </form>






                                                  <!-////////////////////////////////////////////////////////////////////////////––> 
                                                  <!-- Button trigger modal -->
                                               

                                                  
                                                  <!-- Modal -->
                                                  <div class="modal fade" id="Update<?= $offer->getIdoffer()?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                  <div class="modal-content">
                                                       <div class="modal-header">
                                                       <h5 style="color:green;">Modificar</h5>
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                       </div>
                                                       <div class="modal-body">
                                                       
                                                       <div class="container">
                                                                 
                                                                 <form action="<?php echo FRONT_ROOT ?>offer/Update" method="post" class="bg-light-alpha p-5">
                                                                      <div class="row">                         
                                                                           
                                                                                <div class="form">
                                                                                     <label for="">Título del Empleo</label>
                                                                                     <input type="text" name="nameoffer" value="<?= $offer->getTitle()?>" class="form-control">
                                                                                </div>
                                                                           
                                                                           
                                                                                <div class="form-group">
                                                                                     <label for="">Descripción</label>
                                                                                     <input type="email" name="email" value="<?= $offer->getDescription()?>" class="form-control">
                                                                                </div>
                                                                           
                                                                           
                                                                                <div class="form-group">
                                                                                     <label for="">Requerimientos</label>
                                                                                     <input type="date" name="createDate" value="<?= $offer->getRequirements()?>" class="form-control">
                                                                                </div>

                                                                                <div class="form">
                                                                                     <label for="">Carga Horaria</label>
                                                                                     <input type="text" name="description" value="<?= $offer->getWorkLoad()?>" class="form-control">
                                                                                </div>

                                                                                
                                                                                <div class="form-group">
                                                                                     <label for="">Fecha de Publicación</label>
                                                                                     <input type="date" name="createDate" value="<?= $offer->getPublicationDate()?>" class="form-control">
                                                                                </div>

                                                                                
                                                                                <div class="form-group">
                                                                                     <label for="">Fecha de Caducidad</label>
                                                                                     <input type="date" name="createDate" value="<?= $offer->getExpirationDate()?>" class="form-control">
                                                                                </div>

                                                                                
                                                                                <div class="form-group">
                                                                                     <label for="">Salario</label>
                                                                                     <input type="date" name="createDate" value="<?= $offer->getSalary()?>" class="form-control">
                                                                                </div>


                                                                                <input type="hidden" name="id" value="<?php echo $offer->getIdoffer()?>" class="form-control">

                                                                      </div>
                                                                          
                                                                      
                                                                      
                                                                
                                                       </div>
                                                       </div>
                                                                                <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-dark ml-auto d-block">Confirmar</button>
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                                                                                
                                                                                </div>
                                                                 </form>
                                                  </div></div></div>                                                  
                                                  <!-////////////////////////////////////////////////////////////////////////////––> 
                                             </td>

                                         </tr>
                                   <?php
                              }
                         ?>
                         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                    </tbody>
               </table>
          </div>
     </section>
</div>

<script>
     const searchInput = document.getElementById("search");
     const rows = document.querySelectorAll("tbody tr");
     console.log(rows);
     searchInput.addEventListener("keyup", function (event) {
     const q = event.target.value.toLowerCase();
     rows.forEach((row) => {
          row.querySelector("td").textContent.toLowerCase().startsWith(q)
          ? (row.style.display = "table-row")
          : (row.style.display = "none");
          });
     });
</script>
        </div>
    </section>

</div>