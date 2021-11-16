<?php
require_once('nav.php');   
?>

<div class="job-add">
    <section id = "listado" class="mb-5 bg-light-alpha">
        <div class = "container" >
        <br>
               
               <h2 class="mb-4">Historial de Postulaciones</h2>
               <br>
              
               <div  style="background-color:primary;" class="table-responsive ">
               <table class="table bg-light-alpha table-primary">
                    <thead class="table-dark" style="white-space:nowrap;  text-align:center  ">
                         <th scope="col">Título</th>
                         <th scope="col">Empresa</th>
                         <th scope="col">Carrera</th>
                         <th scope="col">Empleo</th>   
                         <th scope="col">Cancelar</th>  
                                               
                    </thead>
                    <tbody>
                    <br>
                    <?php
                              $i=0;
                              foreach($jobOfferList as $offer)
                              {

                                   ?>
                                        <tr style="white-space:nowrap;">

                                             <td><li class="list-group-item list-group-item-info"><?php echo $offer->getTitle() ?></li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $offer->getNameCompany() ?> </li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $offer->getCareerDescription() ?> </li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $offer->getPositionDescription() ?></li></td>
                                             
                                             <td>
                                             <form style="display:inline;" method="POST" action="<?php echo FRONT_ROOT ?>JobOffer/DeletePostulation">
                                                  
                                                  <input type="hidden" name="id" value="<?php echo $listPostulation[$i]->getId()?>" class="form-control">
                                                  <button type="submit" class="btn btn-danger" title="Eliminar" class="buttonF" ><i class="fas fa-trash-alt"></i></button>                                                 
                                                  </form>
                                             </td>
                                             
                                         </tr>
                                   <?php
                                   $i++;
                              }
                         ?>
                         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                    </tbody>
               </table>
               </div>
          </div>
     </section>
</div>

