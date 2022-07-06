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
            <form id="quickForm" action="/pedidos1/guardar/" method="post">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="idmesero">Mesero</label>
                    <select class="form-control" id="idmesero" name="idmesero" placeholder="Id mesero">
                      <?php
                      foreach ($this->datos as $mesero) { ?>
                        <option value=" <?php echo $mesero['idmesero'] ?>"><?php echo $mesero['nombre'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="Estacion">Estacion</label>
                    <select class="form-control" id="Estacion" name="Estacion" placeholder="Estacion">
                      <?php
                      foreach ($this->estaciones as $estacion) { ?>
                        <option value=" <?php echo $estacion['NumeroEstacion'] ?>"><?php echo $estacion['nombre'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="modalidad">Modalidad</label>
                    <select class="form-control" id="modalidad" name="modalidad" placeholder="Modalidad">
                      <option value="LL">Llevar</option>
                      <option value="DO">Domicilio</option>
                      <option value="ME">Mesa</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="activo">Estado</label>
                    <select class="form-control" id="activo" name="activo" placeholder="Activo">
                      <option value="1" default>Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="fechahora">Estado del Pedido</label>
                    <div class="form-group">
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input" id="elaborado" name="elaborado" value="1" checked control-id="ControlID-43">
                        <label class="custom-control-label" for="elaborado">Elaborado</label>
                      </div>
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input" id="entregado" name="entregado" value="1" checked control-id="ControlID-43">
                        <label class="custom-control-label" for="entregado">Entregado</label>
                      </div>
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input" id="facturado" name="facturado" value="1" checked control-id="ControlID-43">
                        <label class="custom-control-label" for="facturado">Facturado</label>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="button" onclick="AgregarFila()">A</button>
                <div class="table-responsive">
                  <table id="detallePedido" class="table m-0">
                    <thead>
                      <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>SubProducto</th>
                        <th>Notas</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="1" >
                        <td><input type="text" name="producto" class="form-control" placeholder="Escriba el nombre del producto" required></td>
                        <td><input type="number" step="1" name="cantidad" class="form-control" placeholder="Escriba el nombre del producto" required></td>
                        <td><input type="text" name="subproducto" class="form-control" placeholder="Escriba el nombre del producto" required></td>
                        <td><input type="text" name="notas" class="form-control" placeholder="Escriba el nombre del producto" required></td>                        
                        <td><button type="button" onclick="EliminarFila(1)">A</button></td>
                      </tr>
                      <tr id="2" >
                        <td><input type="text" name="producto" class="form-control" placeholder="Escriba el nombre del producto" required></td>
                        <td><input type="number" step="1" name="cantidad" class="form-control" placeholder="Escriba el nombre del producto" required></td>
                        <td><input type="text" name="subproducto" class="form-control" placeholder="Escriba el nombre del producto" required></td>
                        <td><input type="text" name="notas" class="form-control" placeholder="Escriba el nombre del producto" required></td>                        
                        <td><button type="button" onclick="EliminarFila(2)">A</button></td>
                      </tr>
                    </tbody>
                  </table>
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
    function AgregarFila(){
      $('#detallePedido > tbody:last-child').append('<tr<p>Hola</p>tr><tr<p>Hola</p>tr>');
    }
    
    function EliminarFila(id){
      $('#'+id).remove();
    }
  </script>