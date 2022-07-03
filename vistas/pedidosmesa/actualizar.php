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
              <form id="quickForm" action="/pedidosmesa/editar?id=<?php echo $this->datos[0]['idpedido'] ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNombre">id pedido</label>
                    <input type="text" name="id" class="form-control" id="inputidpedido" readonly value='<?php echo $this->datos[0]['idpedido'] ?>' >
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Id de mesa</label>
                    <input name="idmesa" class="form-control" id="textareaidmesa"  value='<?php echo $this->datos[0]['idmesa'] ?>'>
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">cuenta</label>
                    <input name="cuenta" class="form-control" id="textareacuenta"  value='<?php echo $this->datos[0]['cuenta'] ?>'>
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Nombre cuenta</label>
                    <input name="nombrecuenta" class="form-control" id="textareanombrecuenta"  value='<?php echo $this->datos[0]['nombrecuenta'] ?>'>
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