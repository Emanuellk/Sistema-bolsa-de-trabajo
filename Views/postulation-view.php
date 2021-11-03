<?php
require_once('nav.php');   
?>

<div class="job-add">
    <section id = "listado" class="mb-5 bg-light-alpha">
        <div class = "container" >
        <br>
               
               <h2 class="mb-4">Historial</h2>
               
               <div  style="background-color:chocolate;" class="table-responsive ">
               <table class="table bg-light-alpha table-primary">
                    <thead class="table-dark" style="white-space:nowrap;  text-align:center  ">
                         <th scope="col">Título</th>
                         <th scope="col">Empresa</th>
                         <th scope="col">Carrera</th>
                         <th scope="col">Empleo</th>                         
                         <th scope="col">Carga Horaria</th>                                                 
                         <th scope="col">Salario</th>
                         <th scope="col">Ver</th>
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

                                                   
                                                  
                                                 
                                                  
                                                 
                                             </td>

           

                                               <!-- Modal SEE -->
                                             <div class="modal fade" id="See<?= $offer->getId()."s"?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                                                  <div class="modal-content" style="background-color:cadetblue;">
                                                       <div class="modal-header" >
                                                           
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

