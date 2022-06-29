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
                <h3 class="card-title">Datos generales <small>Pedidos Elaborados</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="/pedidoselaborados/guardar/" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNombre">Id Detalle Pedidos</label>
                    <input type="number" name="iddetallepedido" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Id usuario</label>
                    <input type="number" name="idusuario" class="form-control" id="textareaDescricion" placeholder="Escriba la descripcion del cargo">
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Fecha Hora</label>
                    <input type="date" name="fechahora" class="form-control" id="textareaDescricion" placeholder="Escriba la descripcion del cargo">
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