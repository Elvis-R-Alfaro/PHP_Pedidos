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
              <form id="quickForm" action="/pedidoscancelados/editar?id=<?php echo $this->datos[0]['numeropedido'] ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNombre">Numero de pedido</label>
                    <input type="text" name="id" class="form-control" id="inputNombre" readonly value='<?php echo $this->datos[0]['numeropedido'] ?>' >
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Id de usuario</label>
                    <input name="usuario" class="form-control" id="textareaDescricion"  value='<?php echo $this->datos[0]['usuario'] ?>'>
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Fecha</label>
                    <input name="fechahora" class="form-control" id="textareaDescricion"  value='<?php echo $this->datos[0]['fechahora'] ?>'>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary toastrDefaultSuccess">Guardar cambios</button>
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