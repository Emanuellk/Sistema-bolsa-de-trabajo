<?php
    require_once('header.php');

     if(!isset($_SESSION['loggedUser'])){
          header("location:login.php");
     }
?>

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
<div class="brand"></div>
     <span class="navbar-text">

          <strong  class="tittle-admin">Admininistrador</strong>
     </span>
     <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/ShowListView"><span class="icon-admin"> <i class="fas fa-book"></i> </span> Lista usuarios</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowAddView"><span class="icon-admin"> <i class="fas fa-plus"> </i> </span> Agregar Empresa</a>
          </li>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/ShowAddView"><span class="icon-admin"> <i class="fas fa-plus"> </i> </span> Agregar Empleo</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowManageView"><span class="icon-admin"> <i class="fas fa-tasks"> </i> </i> </span> Gestionar Empresas</a>
          </li> 
           <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/ShowManageView"><span class="icon-admin"> <i class="fas fa-tasks"> </i> </span> Administrar Empleos</a>
          </li>
     </ul>
     <li>
     <a  href="<?php echo FRONT_ROOT ?>User/Logout"> <button class="button__logout">Cerrar sesión <i class="fas fa-sign-out-alt"></i></button></a>
     </li>
</nav>