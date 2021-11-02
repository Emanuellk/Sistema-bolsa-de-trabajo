<?php
require_once('nav.php');   
?>

<div class="job-add">
    <section id = "listado" class="mb-5 bg-light-alpha">
        <div class = "container" >
        <br>
               
               <h2 class="mb-4">Listado de Ofertas laborales</h2>
               <div class="mb-4">
               <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVFJREFUSEvVleExBEEQRt9FQAoiQATIgAgQASJABIgAESACZEAEyIAIqKd6qub2Zmen7N4P/eu2dqdf99dfz81YcsyWnJ8+wCpwBOwCG1HEC3APXAGfrYWVAAfABSCkFCY/AW5aIF2Aya/j4ANwCTzF8zZwBmzF8150VOXkACt+i8oPKxUKOQ2Z1obkygHpoJWrfS3syk7Oo6veb3OAQ1wHdjJZ+g4q1yPgmc1aJTngOz5stW7T92MBXxW3/db7V4mc0R3wDChX0wzSkF0mLdgyZPdBKzcBtOk7sBLO0CGlSIV8xJZXt7o70NS6ibWiyZTBUAr9nyQZtGh3Bqlat9m27aQUDtb3wrSpv2/7NKpddsexcO6G8RpXgwmVJe2N77yX3P6FaPV86Wx+b/VCxgBS0v2MvtDJWMAgZApAFzJ3E08FSBCtPfdHNCWg6NT/D/gBeOVFGZeTouUAAAAASUVORK5CYII="/>                      
               <input type="text" name="search" id="search" placeholder="Buscar..." class="src" autocomplete="off">
               </div>
               <div  style="background-color:chocolate;" class="table-responsive ">
               <table class="table bg-light-alpha table-primary">
                    <thead class="table-dark" style="white-space:nowrap;  text-align:center  ">
                         <th scope="col">Título</th>
                         <th scope="col">Empresa</th>
                         <th scope="col">Carrera</th>
                         <th scope="col">Empleo</th>                         
                         <th scope="col">Carga Horaria</th>                                                 
                         <th scope="col">Salario</th>
                         <th scope="col">Ver/Postular</th>
                    </thead>
                    <tbody>

                    <?php

                              foreach($jobOfferList as $offer)
                              {
                                   ?>
                                        <tr style="white-space:nowrap;">
                                             
                                             <td><li class="list-group-item list-group-item-info"><?php echo $offer->getNameCompany() ?> </li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $offer->getTitle() ?></li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $offer->getCareerDescription() ?> </li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $offer->getPositionDescription() ?></li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $offer->getWorkLoad() ?></li></td>                              
                                             <td><li class="list-group-item list-group-item-info"><?php echo $offer->getSalary() ?></li></td>
                                             <td>                     
                                             
                                                  <button  class = "btn btn-success" type="button"  style="background-color:darkturquoise;" data-bs-toggle="modal" data-bs-target="#See<?= $offer->getId()."s"?> " >
                                                  <i class="fas fa-eye"></i>  
                                                  </button>                                                  

                                                    <form style="display:inline;" method="POST" action="<?php echo FRONT_ROOT ?>JobOffer/apply">
                                                    
                                                    <input type="hidden" name="userId" value="<?php echo $User->getId()?>" class="form-control">
                                                    <input type="hidden" name="offerId" value="<?php echo $offer->getId()?>" class="form-control">

                                                    <button type="submit" class="btn btn-danger" class="buttonF" style="background-color: greenyellow;"><i class="fas fa-address-card"></i></button>
                                                                                                
                                                    </form>
                                                  
                                                 
                                                  
                                                 
                                             </td>

           

                                               <!-- Modal SEE -->
                                             <div class="modal fade" id="See<?= $offer->getId()."s"?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                                                  <div class="modal-content" style="background-color:cadetblue;">
                                                       <div class="modal-header" style="text-align: center;">
                                                           
                                                                  <Strong><?php echo $offer->getTitle() ?> </Strong>                                                                                     
                                                            
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                       </div>
                                                       <div class="modal-body">
                                                       
                                                       <div class="container">
                                                                 
                                                                
                                                                      <div class="row">                         
                                                                           
                                                                               
                                                                     
                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Empleo: </Strong><?php echo $offer->getPositionDescription() ?></li>                                                                                     
                                                                                </div>

                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Carrera: </Strong><?php echo $offer->getCareerDescription() ?></li>                                                                                     
                                                                                </div>                                                                                

                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Fecha de publicacion: </Strong><?php echo $offer->getPublicationDate() ?></li>                                                                                     
                                                                                </div>

                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Fecha de expiracion: </Strong><?php echo $offer->getExpirationDate() ?></li>                                                                                     
                                                                                </div>

                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Carga horaria: </Strong><?php echo $offer->getWorkLoad() ?></li>                                                                                     
                                                                                </div>

                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Salario: </Strong><?php echo $offer->getSalary() ?></li>                                                                                     
                                                                                </div>

                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Requisitos : </Strong><?php echo $offer->getRequirements() ?></li>                                                                                     
                                                                                </div>

                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Fecha Publicacion: </Strong><?php echo $offer->getPublicationDate() ?></li>                                                                                     
                                                                                </div>                                                                                

                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Descripcion: </Strong><?php echo $offer->getOfferDescription() ?></li>                                                                                     
                                                                                </div>

                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Empresa: </Strong><?php echo $offer->getNameCompany() ?></li>                                                                                     
                                                                                </div>

                                                                                <div class="">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Email de la Empresa: </Strong><?php echo $offer->getCompanyEmail() ?></li>                                                                                     
                                                                                </div>                              
                                                                                                                                                            
                                                                              
                                                                              
                                                                               

                                                                      </div>                                  
                                                                                                                            
                                                       </div>
                                                       </div>
                                                                               
                                                                
                                             </div></div></div>                                                  
                                             <!-////////////////////////////////////////////////////////////////////////////––> 





                                             

                                         </tr>
                                   <?php
                              }
                         ?>
                         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                    </tbody>
               </table>
               </div>
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