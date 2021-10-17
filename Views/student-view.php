<?php     
    require_once('nav.php');   
?>

<div class="container-listStudent">
    <div class="listStudent">
       
 <div class="card-header"><strong><h4>Datos del Alumno:</h4> </Strong></div>
  <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item list-group-item-info"><strong>Carrera: </strong> <?php echo $Career->getDescription() ?></li>
                <li class="list-group-item list-group-item-info"><strong>Nombre:  </strong><?php echo $Student->getFirstName() ?></li>
                <li class="list-group-item list-group-item-info"><strong>Apellido:  </strong><?php echo $Student->getLastName() ?></li>
                <li class="list-group-item list-group-item-info"><strong>DNI:  </strong><?php echo $Student->getDni() ?></li>
                <li class="list-group-item list-group-item-info"><strong>Legajo:</strong><?php echo $Student->getFileNumber() ?></li>
                <li class="list-group-item list-group-item-info"><strong>Genero:  </strong><?php echo $Student->getGender() ?></li>
                <li class="list-group-item list-group-item-info"><strong>Fecha de nacimiento:  </strong><?php echo $Student->getBirthDate() ?></li>
                <li class="list-group-item list-group-item-info"><strong>Telefono:  </strong><?php echo $Student->getPhoneNumber() ?></li>
                <li class="list-group-item list-group-item-info"><strong>Email:  </strong><?php echo $Student->getEmail() ?></li>
                <li class="list-group-item list-group-item-info"><strong>Activo:  </strong><?php echo $Student->getActive() ?></li>
                
            </ul> 
        </div>
    </div>    
</div>

