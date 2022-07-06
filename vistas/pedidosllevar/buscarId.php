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
            <form id="quickForm" action="/pedidosllevar/actualizar?id=<?php echo $this->datos[0]['id'] ?>" method="post">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="idpedido">Id Pedido</label>
                    <select class="form-control cmbbuscar select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="idpedido" required> 
                    <option value=" <?php echo $this-> datos[0]['idpedido'] ?>"><?php echo $this-> datos[0]['idpedido'] ?></option>
                      <?php
                      foreach ($this->pedidos as $pedido) { ?>
                        <option value=" <?php echo $pedido['NumeroPedido'] ?>"><?php echo $pedido['NumeroPedido'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="idcliente">Id cliente</label>

                    <select class="form-control cmbbuscar select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true" name="idcliente"  required>
                      <option value="<?php echo $this-> datos[0]['idcliente'] ?>"><?php echo $this->datos[0]['nombre'] ?></option>
                      <?php
                      foreach ($this->clientes as $cliente) { ?>
                        <option value=" <?php echo $cliente['idcliente'] ?>"><?php echo $cliente['nombre'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="submit" type="submit" class="btn btn-primary toastrDefaultSuccess">Actualizar</button>
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