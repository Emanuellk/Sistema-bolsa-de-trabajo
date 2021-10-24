<?php     
    require_once('nav.php');   
?>

<div class="company-add " >
     <section id="listado" class="mb-5">
          <div class="container">
               <br>
               <h2 class="mb-4">Listado de Empresas</h2>
               <div class="mb-4">
               <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVFJREFUSEvVleExBEEQRt9FQAoiQATIgAgQASJABIgAESACZEAEyIAIqKd6qub2Zmen7N4P/eu2dqdf99dfz81YcsyWnJ8+wCpwBOwCG1HEC3APXAGfrYWVAAfABSCkFCY/AW5aIF2Aya/j4ANwCTzF8zZwBmzF8150VOXkACt+i8oPKxUKOQ2Z1obkygHpoJWrfS3syk7Oo6veb3OAQ1wHdjJZ+g4q1yPgmc1aJTngOz5stW7T92MBXxW3/db7V4mc0R3wDChX0wzSkF0mLdgyZPdBKzcBtOk7sBLO0CGlSIV8xJZXt7o70NS6ibWiyZTBUAr9nyQZtGh3Bqlat9m27aQUDtb3wrSpv2/7NKpddsexcO6G8RpXgwmVJe2N77yX3P6FaPV86Wx+b/VCxgBS0v2MvtDJWMAgZApAFzJ3E08FSBCtPfdHNCWg6NT/D/gBeOVFGZeTouUAAAAASUVORK5CYII="/>                      
               <input type="text" name="search" id="search" placeholder="Buscar..." class="src" autocomplete="off">
               </div>
               <table class="table bg-light-alpha">
                    <thead>
                         <th> <li class="list-group-item list-group-item-dark">Nombre</li></th>
                         <th><li class="list-group-item list-group-item-dark">Email</li></th>
                         <th><li class="list-group-item list-group-item-dark">Fecha de creación</li></th>
                         <th><li class="list-group-item list-group-item-dark">Ver empresa</li></th>
                         
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
                                             <td>
                                             <button  class = "btn btn-success" type="button"  data-bs-toggle="modal" data-bs-target="#Ver<?= $company->getIdCompany()?> " >
                                                   <i class="fas fa-eye"></i>    
                                             </button>
                                             <!-- Modal -->
                                             </td>
                                             <div class="modal fade" id="Ver<?= $company->getIdCompany()?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                                                  <div class="modal-content" style="background-color:cadetblue;">
                                                       <div class="modal-header">
                                                       <h5 style="color:black;">Ver empresa:</h5>
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                       </div>
                                                       <div class="modal-body">
                                                       
                                                       <div class="container">
                                                                 
                                                                
                                                                      <div class="row">                         
                                                                           
                                                                                <div class="form">
                                                                                <li class="list-group-item list-group-item-info"> <Strong>Nombre: </Strong><?php echo $company->getNameCompany() ?></li>
                                                                                     
                                                                                </div>
                                                                           
                                                                           
                                                                                <div class="form">
                                                                                <li class="list-group-item list-group-item-info"> <strong>Email: </strong><?php echo $company->getEmail() ?> </li>
                                                                                     
                                                                                </div>
                                                                           
                                                                           
                                                                                <div class="form">
                                                                                <li class="list-group-item list-group-item-info"><strong>Fecha: </strong><?php echo $company->getCreateDate() ?> </li>
                                                                                     
                                                                                </div>

                                                                                <div class="form">
                                                                                     
                                                                                     <li class="list-group-item list-group-item-info"><strong>Descripcion: </strong><?php echo $company->getDescription() ?> </li>
                                                                                     
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