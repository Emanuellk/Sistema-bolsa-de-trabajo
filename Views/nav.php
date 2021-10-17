<?php
    require_once('header.php');
?>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    
     <div class="brand"></div>
     <ul class="navbar-nav ml-auto">
     
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/StudentStatus">Ver Estado</a>
               
          </li>
          <br>
          <br>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/CompanyList">Ver Empresas</a>
          </li>  

          <a  href="<?php echo FRONT_ROOT ?>User/Logout"> <button class="button__logout">Cerrar sesión <i class="fas fa-sign-out-alt"></i></button></a>

     </ul>

</nav>

     