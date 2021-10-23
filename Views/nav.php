<?php
    require_once('header.php');
?>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    
     <div class="brand"></div>
     <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/CompanyList"><span class="icon"><i class="fas fa-building"> </i></span> Ver Empresas</a>
          </li> 
          <div id="menu">
          <li class="user">
          <a class="nav-link" href="#" ><span class="icon"><i class="fas fa-user"></i> </i></span>Mi Perfil <span><i class="fas fa-caret-down"></i></span></span></a>
               <ul id="desple">
                    <li id="item"><a class="nav-link" href="<?php echo FRONT_ROOT ?>User/StudentStatus">Ver Estado</a></li>
                    <li id="item"><a href="<?php echo FRONT_ROOT ?>User/Logout"><button class="button__logout">Cerrar sesión</button></a></a></li>
               </ul>
               </li>
     </ul>
     </div> 
</nav>
     