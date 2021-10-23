<?php     
    require_once('nav.php');   
?>

<div class="company-add">
     <section id="listado" class="mb-5">
          <div class="container">
               <br>
               <h2 class="mb-4">Listado de Empresas</h2>
               <div class="mb-4">
               <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVFJREFUSEvVleExBEEQRt9FQAoiQATIgAgQASJABIgAESACZEAEyIAIqKd6qub2Zmen7N4P/eu2dqdf99dfz81YcsyWnJ8+wCpwBOwCG1HEC3APXAGfrYWVAAfABSCkFCY/AW5aIF2Aya/j4ANwCTzF8zZwBmzF8150VOXkACt+i8oPKxUKOQ2Z1obkygHpoJWrfS3syk7Oo6veb3OAQ1wHdjJZ+g4q1yPgmc1aJTngOz5stW7T92MBXxW3/db7V4mc0R3wDChX0wzSkF0mLdgyZPdBKzcBtOk7sBLO0CGlSIV8xJZXt7o70NS6ibWiyZTBUAr9nyQZtGh3Bqlat9m27aQUDtb3wrSpv2/7NKpddsexcO6G8RpXgwmVJe2N77yX3P6FaPV86Wx+b/VCxgBS0v2MvtDJWMAgZApAFzJ3E08FSBCtPfdHNCWg6NT/D/gBeOVFGZeTouUAAAAASUVORK5CYII="/>                      
               <input type="text" name="search" id="search" placeholder="Buscar..." class="src" autocomplete="off">
               </div>
               <table class="table bg-light-alpha table-primary">
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