<?php
    use DAO\CompanyDAO;
     
    require_once('nav.php'); 
    require 'DAO/CompanyDAO.php';

    $companyDAO = new CompanyDAO();
    $companys = $companyDAO->GetAll();
    
?>
<div class="company-add">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Empresas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Email</th>
                         <th>Fecha de creación</th>
                         <th>Actualizar</th>
                    </thead>
                    <tbody>
                         
                         
                         <?php
                              foreach($companys as $company)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $company->getNameCompany() ?></td>
                                             <td><?php echo $company->getEmail() ?></td>
                                             <td><?php echo $company->getCreateDate() ?></td>
                                        <td>
                                        <form action="" class="btn btn-sm btn-outline-info"><a>View</a></form>
                                          <a href="" class="btn btn-sm btn-outline-secondary">Update</a>
                                          <form method="POST" action="">
                                          <button class="btn btn-sm btn-outline-danger">Delete</button>
                                          </form>
                                         </td>
                                         </tr>
                                   <?php
                              }
                         ?>
                         
                    </tbody>
               </table>
          </div>
     </section>
</div>