<?php include 'vistas/plantilla/encabezado.php'; ?>
<div class="wrapper">
    <?php 
        require 'vistas/plantilla/nav.php'; 
        require 'vistas/plantilla/menulateral.php';
        require 'vistas/plantilla/contenidotitulo.php';
    ?>
<?php
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos generales <small>Pedidos</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="/pedidos/actualizar?id=<?php echo $this->datos[0]['id'] ?>" method="post">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="idmesero">Id mesero</label>
                            <input type="text" class="form-control" id="idmesero" name="idmesero" placeholder="Id mesero" value="<?php echo $this->datos[0]['idmesero'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Estacion">Estacion</label>
                            <input type="text" class="form-control" id="Estacion" name="Estacion" placeholder="Estacion" value="<?php echo $this->datos[0]['Estacion'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="activo">Activo</label>
                            <input type="text" class="form-control" id="activo" name="activo" placeholder="Activo" value="<?php echo $this->datos[0]['activo'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalidad">Modalidad</label>
                            <input type="text" class="form-control" id="modalidad" name="modalidad" placeholder="Modalidad" value="<?php echo $this->datos[0]['modalidad'] ?>">
                        </div>
                    </div>
                    <div class="form-row">                        
                        <div class="form-group col-md-12">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="<?php echo $this->datos[0]['estado'] ?>">
                        </div>
                    </div>                 
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary toastrDefaultSuccess">Actualizar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php include 'vistas/plantilla/pie.php'; ?>
<!-- Aqui agregar script adicionales -->
<!-- jquery-validation -->
<script src="/public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/public/plugins/jquery-validation/additional-methods.min.js"></script>
<?php include 'vistas/plantilla/script.php'; ?>