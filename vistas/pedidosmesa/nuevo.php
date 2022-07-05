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
              <h3 class="card-title">Datos generales <small>Pedidos Mesa</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="/pedidosmesa/guardar/" method="post">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="idpedido">Id Pedido</label>
                    <select class="form-control" id="idpedido" name="idpedido">
                    <option value="" selected disabled hidden>Seleccione un valor</option>

                      <?php
                      foreach ($this->pedidos as $pedido) { ?>
                        <option value=" <?php echo $pedido['NumeroPedido'] ?>"><?php echo $pedido['NumeroPedido'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="idcliente">Id Mesa</label>
                    <select class="form-control" id="idmesa" name="idmesa">
                    <option value="" selected disabled hidden>Seleccione un valor</option>
                      <?php
                      foreach ($this->mesas as $mesa) { ?>
                        <option value=" <?php echo $mesa['idregistro'] ?>"><?php echo $mesa['Mesa'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                  <label for="inputNombre">Cuenta</label>
                  <input type="number" step="1" name="cuenta" class="form-control" id="inputNombre" placeholder="Escriba el numero de cuenta" required>
                  </div>

                  <div class="form-group col-md-8">
                  <label for="inputNombre">Nombre Cuenta</label>
                  <input type="text" step="1" name="nombrecuenta" class="form-control" id="inputNombre" placeholder="Escriba el nombre de cuenta" required>
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