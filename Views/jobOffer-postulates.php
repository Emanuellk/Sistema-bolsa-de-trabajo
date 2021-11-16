<?php
    require_once('navAdmin.php');
?>
<br>
<section id = "listado" class="mb-5 bg-light-alpha">
<div class = "container" >
<div  style="background-color:primay;" class="table-responsive ">
               <h2>Historial de postulantes</h2>
               
               
               <table class="table bg-light-alpha table-primary">
                    <thead class="table" style="background-color: orange;"  text-align:center >   
                         <th scope="col">Nombre</th>
                         <th scope="col">Apellido</th>
                         <th scope="col">Email</th>
                         <th scope="col">Dni</th>                         
                    </thead>
                    
                    <tbody>

                    <?php
                              foreach($studentsList as $student)
                              {
                                   ?>
                                        <tr style="white-space:nowrap;">
                                       
                                             <td><li class="list-group-item list-group-item-info"><?php echo $student->getFirstName() ?> </li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $student->getLastName() ?></li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $student->getEmail() ?> </li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $student->getDni() ?></li></td>

                                        </tr>
                                <?php
                              }
                            ?>
                    </tbody>
                 </table>
                 <h3>Descargar en Pdf -><form style="display:inline;" method="POST" action="<?php echo FRONT_ROOT ?>User/Pdf">
                 <button type="submit" class="btn btn-dark" class="buttonF" title="Pdf" ><i class="fas fa-file-pdf"></i></button>
                 </form></h3>
</div>   
</div>       
</section>
