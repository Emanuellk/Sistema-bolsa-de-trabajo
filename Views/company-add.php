<?php
    require_once('navAdmin.php');
?>
<div class="company-add">
        <section id="listado" class="mb-5">
            <div class="container">
                <br>
                <h2 class="mb-4">Agregar empresa</h2>
                <form action="<?php echo FRONT_ROOT ?>Company/Add" method="POST" class="bg-light-alpha p-5">
                        <div class="row">                         
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nombre de la Empresa</label>
                                    <input type="text" name="nameCompany" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Fecha de creación</label>
                                    <input type="date" name="createDate" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <input type="text" name="description" value="" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
                </form>
            </div>
        </section>
</div>