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
              <form id="quickForm" action="/pedidosventas/actualizar?id=<?php echo $this->datos[0]['id'];?>" method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="number" readonly name="idn" class="form-control" value="<?php echo strval($this->datos[0]['idn']);?>" id="idn" placeholder="Escriba ID" required>
                  </div>
                  <div class="form-group">
                    <label for="NumeroFactura">Numero Factura </label>
                    <input type="number" name="NumeroFactura" class="form-control" value="<?php echo strval($this->datos[0]['NumeroFactura']);?>" id="NumeroFactura" placeholder="LLene el campo" required>
                  </div>
                  <div class="form-group">
                    <label for="NumeroPedido">Numero Pedido</label>
                    <input type="number" name="NumeroPedido" class="form-control" value="<?php echo strval($this->datos[0]['NumeroPedido']);?>" id="NumeroPedido" placeholder="LLene el campo">
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