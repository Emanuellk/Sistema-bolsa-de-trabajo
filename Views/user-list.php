<?php     
    require_once('navAdmin.php');   
?>

<div class="user-list" >
     <section id="listado" class="mb-5">
          <div class="container">
               <br>
               <h2 class="mb-4">Listado de Usuarios</h2>
               <table class="table table-bordered table-secondary">
                    <thead class="table-dark">
                         <th>Id</th>
                         <th>Email</th>
                         <th>Rol</th>
                         <th>Modificar / Rol</th>

                    </thead>
                  
                    <tbody>
                         
                         
                         <?php
                              foreach($userList as $key=>$user)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $user->getId() ?> </td>
                                             <td><?php echo $user->getEmail() ?> </td>
                                             <td><?php if($user->getAdmin() == 1){echo "Administrador";}else{echo("Estudiante");}?> </td>
                                             <td>
                                                  <button  class = "btn btn-primary" type="button" title="Modificar" data-bs-toggle="modal" data-bs-target="#Update<?= $user->getId() ?> " >
                                                  <i class="fas fa-user-edit"></i>   
                                                  </button>
                                                  
                                                  <form style="display:inline;" method="POST" action="<?php echo FRONT_ROOT ?>User/deleteUser">
                                                  <input type="hidden" name="id" value="<?php echo $user->getId()?>" class="form-control">

                                                  <button type="submit" class="btn btn-danger" class="buttonF" title="Eliminar" ><i class="fas fa-trash-alt"></i></button>
                                                  </form>

                                                  <form style="display:inline;" method="POST" action="<?php echo FRONT_ROOT ?>User/deleteUser">
                                                  <input type="hidden" name="id" value="<?php echo $user->getId()?>" class="form-control">                                              
                                                  </form>

                                                  


                                                  <!-- Modal Modify rank--->
                                                     
                                                  <div class="modal fade" id="Update<?= $user->getId()?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                       <div class="modal-dialog">
                                                       <div class="modal-content">
                                                       <div class="modal-header">
                                                            <h5 style="color:lightseagreen;">Modificar / Rol</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            
                                                            <div class="container">         
                                                                      <form action="<?php echo FRONT_ROOT ?>User/Update" method="post" class="bg-light-alpha p-5">
                                                                           <div class="row">                         
                                                                                
                                                                                     <div class="form">
                                                                                     <label for="">Asignar Rol: </label>
                                                                                     <select name="admin" name="type">
                                                                                     <option value=0>Estudiante</option>
                                                                                     <option value=1>Admin</option>
                                                                                     </select>
                                                                                     </div>
                                                                                     <br>
                                                                                     <br>

                                                                                     <div class="form-group">
                                                                                          
                                                                                          <label for="">Cambiar Contraseña: </label>
                                                                                          <input class="inputPassword" id="input-<?=$key?>"type="password"  name="password" placeholder="Password" value="<?= $user->getPassword()?>">
                                                                                          <span class="spanPassword">
                                                                                               <i  class="fa fa-eye" id="font-<?=$key?>"  onclick="togglePW(<?=$key?>)" aria-hidden="true"></i>
                                                                                          </span>
                                                                                     </div>

                                                                                     
                                                                                    

                                                                                     <input type="hidden" name="id" value="<?php echo $user->getId()?>" class="form-control">

                                                                           </div>
                                                                           
                                                                           
                                                                           
                                                                 
                                                            </div>
                                                            </div>
                                                                                     <div class="modal-footer">
                                                                                     <button type="submit" class="btn btn-dark ml-auto d-block">Confirmar</button>
                                                                                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                                                                                
                                                                                     </div>
                                                                      </form>
                                                       </div></div></div>                  
                                        
                                                  <!-- Aca cierra modal-->

                                             </td>                                                                                   
                                             
                                        </tr>
                                   <?php
                              }
                        ?>
                         <script src="../Views/js/Javascript.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                    </tbody>
               </table>
          </div>
     </section>
</div>


