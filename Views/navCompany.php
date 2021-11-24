<?php
    require_once('header.php');

     if(!isset($_SESSION['loggedUser'])){
          header("location:login.php");
     }
?>

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
<div class="brand"></div>
     <span class="navbar-text">

          <strong  class="tittle-admin">Empresa</strong>
     </span>
     <ul class="navbar-nav ml-auto">

           <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/ShowAddOfferView"><span class="icon-admin"> <i class="fas fa-plus"> </i> </span> Agregar Empleo</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer/ShowOfferCompanyView"><span class="icon-admin"> <i class="fas fa-tasks"> </i> </span> Administrar Empleos</a>
          </li>

     </ul>
     <li>
     <a  href="<?php echo FRONT_ROOT ?>User/Logout"> <button class="button__logout">Cerrar sesión <i class="fas fa-sign-out-alt"></i></button></a>
     </li>
</nav>