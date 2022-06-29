<?php include 'vistas/plantilla/encabezado.php'; ?>
<div class="wrapper">
    <?php 
        require 'vistas/plantilla/nav.php'; 
        require 'vistas/plantilla/menulateral.php';
        require 'vistas/plantilla/contenidotitulo.php';
    ?>
<?php
$n1=10;
$n2=20;
$r=$n1+$n2;
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
                <h3 class="card-title">Datos generales <small>Cargos de empleados</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="/pedidoscancelados/guardar/" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNombre">Numero de pedido</label>
                    <input type="text" name="numeropedido" class="form-control" id="inputNombre" placeholder="Escriba el numero de pedido" required>
                  </div>
                  <div class="form-group">
                    <label for="inputNombre">Usuario</label>
                    <input type="text" name="usuario" class="form-control" id="inputNombre" placeholder="Escriba el id del usuario" required>
                  </div>
                  <div class="form-group">
                    <label for="inputNombre">Fecha</label>
                    <input type="datetime-local" name="fechahora" class="form-control" id="inputNombre" placeholder="Escriba la fecha" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary toastrDefaultSuccess">Guardar</button>
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