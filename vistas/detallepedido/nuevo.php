<?php include 'vistas/plantilla/encabezado.php'; ?>
<div class="wrapper">
  <?php
  require 'vistas/plantilla/nav.php';
  require 'vistas/plantilla/menulateral.php';
  require 'vistas/plantilla/contenidotitulo.php';
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
              <h3 class="card-title">Datos generales <small>Detella pedido</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="/detallepedido/guardar/" method="post">
              <div class="card-body row">
                <div class="form-group col-md-6">
                  <label for="inputNombre">Numero Pedido</label>
                  <input type="number" name="numeropedidos" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputNombre">Codigo Producto</label>
                  <input type="text" name="codigoproducto" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputNombre">Cantidad</label>
                  <input type="text" name="cantidad" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputNombre">subproducto</label>
                  <input type="text" name="subproducto" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputNombre">Notas</label>
                  <input type="text" name="notas" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputNombre">Cancelado</label>
                  <input type="number" step="1" name="cancelado" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputNombre">Elaborado</label>
                  <input type="number" step="1" name="elaborado" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputNombre">Entregado</label>
                  <input type="number" step="1" name="entregado" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputNombre">Facturado</label>
                  <input type="number" step="1" name="facturado" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
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