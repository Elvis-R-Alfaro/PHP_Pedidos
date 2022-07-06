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
              <h3 class="card-title">Datos generales pedidos y ventas Pedidos y ventas </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="/pedidosventas/guardar/" method="post">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="NumeroPedido">Pedido</label>
                    <select class="form-control cmbbuscar select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="NumeroPedido">
                      <option value="" selected disabled hidden>Seleccione un pedido de venta</option>
                      <?php
                      foreach ($this->facturas as $facturas) { ?>
                        <option value="<?php echo $facturas['NumeroPedido'] ?>"><?php echo $facturas['Nombre'] ?></option>

                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="NumeroPedido">ID de pedido</label>
                    <option value=" <?php echo $this->facturas[0]['Nombre'] ?>"><?php echo $this->facturas[0]['NumeroPedido'] ?></option>
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

  <script>

$(document).ready(function() {
      $('.cmbbuscar').select2();
    });

    $(document).ready(function() {
      $('.cmbbuscar2').select2();
    });

</script>