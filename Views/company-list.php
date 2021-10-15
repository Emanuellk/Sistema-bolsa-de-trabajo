<?php     
    require_once('nav.php');   
?>

<div class="company-add">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Empresas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th> <li class="list-group-item list-group-item-dark">Nombre</li></th>
                         <th><li class="list-group-item list-group-item-dark">Email</li></th>
                         <th><li class="list-group-item list-group-item-dark">Fecha de creación</li></th>
                         
                    </thead>
                    <tbody>
                         
                         
                         <?php
                              foreach($companyList as $company)
                              {
                                   ?>
                                        <tr>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $company->getNameCompany() ?></li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $company->getEmail() ?> </li></td>
                                             <td><li class="list-group-item list-group-item-info"><?php echo $company->getCreateDate() ?> </li></td>
                                            

                                        </tr>
                                   <?php
                              }
                        ?>
                         
                    </tbody>
               </table>
          </div>
     </section>
</div>