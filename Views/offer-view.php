<?php
require_once('nav.php');   
?>

<div class="job-add">
    <section id = "listado" class="mb-5 bg-light-alpha">
        <div class = "container" >
        <br>
               
               <h2 class="mb-4">Listado de Ofertas laborales</h2>
              
               <div   class="table-responsive ">
               <table class="table bg-light-alpha table-primary" id="example" >
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
                         $i=0;
                              foreach($jobOfferList as $offer)
                              {
                                   ?>
                                        <tr style="white-space:nowrap;">

                                             <td scope="row"><li class="list-group-item list-group-item-info"><?php echo $offer->getTitle() ?></li></td>
                                             <td scope="row"><li class="list-group-item list-group-item-info"><?php echo $offer->getNameCompany() ?> </li></td>
                                             <td scope="row"><li class="list-group-item list-group-item-info"><?php echo $offer->getCareerDescription() ?> </li></td>
                                             <td scope="row"><li class="list-group-item list-group-item-info"><?php echo $offer->getPositionDescription() ?></li></td>
                                             <td scope="row"><li class="list-group-item list-group-item-info"><?php echo $offer->getWorkLoad() ?></li></td>                              
                                             <td scope="row"><li class="list-group-item list-group-item-info"><?php echo $offer->getSalary() ?></li></td>
                                             <td>                     
                                             
                                                  <button  class = "btn btn-success" title="Ver" type="button"  style="background-color:darkturquoise;" data-bs-toggle="modal" data-bs-target="#See<?= $offer->getId()."s"?> " >
                                                  <i class="fas fa-eye"></i>  
                                                  </button>  
                                                  
       
                                                 


                                                 <form style="display:inline;" method="POST" action="<?php echo FRONT_ROOT ?>JobOffer/apply">
                                                    
                                                    <input type="hidden" name="userId" value="<?php echo $User->getId()?>" class="form-control">
                                                    <input type="hidden" name="offerId" value="<?php echo $offer->getId()?>" class="form-control">

                                                    <button type="submit"  title="Postular" class="btn btn-danger" class="buttonF" <?php if($alreadyPostulated[$i] == "exist"){ echo ( 'style="background-color: red;" ');}else{ echo ( 'style="background-color: greenyellow;" ');} ?> data-bs-target="#Apply<?= $offer->getId()."s"?> "><i class="fas fa-address-card"></i></button>
                                                                                                
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
                                                                                
                                                                                <div class="">
                                                                                <img src="<?php echo $offer->getImage() ?>" style="height: 100%; width: 100%;">
                                                                                </div>
                                                                              
                                                                              
                                                                               

                                                                      </div>                                  
                                                                                                                            
                                                       </div>
                                                       </div>
                                                                               
                                                                
                                             </div></div></div>                                                  
                                             <!-////////////////////////////////////////////////////////////////////////////––> 
                                         
 
                                         </tr>
                                   <?php
                                   $i= $i + 1;
                                  
                              }
                         ?>

                         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                    </tbody>
               </table>
              
               </div>
          </div>
     </section>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 

<script>


$(document).ready(function(){
    var table = $('#example').DataTable({
       orderCellsTop: true,
       fixedHeader: true, 
       paging:   false,       
       info:     false,

      
       
    });

    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    
   

    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html( '<input type="text" placeholder="Search...'+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
                    
            }
        } );
    } );   
});


 

</script>
