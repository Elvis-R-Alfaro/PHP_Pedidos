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
            <form id="quickForm" action="/pedidos/guardar/" method="post">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="idmesero">Mesero</label>
                    <select class="form-control cmbBuscarMesero select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true" name="idmesero">
                      <option value="" selected>Seleccione un valor</option>
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
                    <select class="form-control cmbBuscarEstacion select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true" name="Estacion">
                      <option value="" selected>Seleccione un valor</option>
                      <?php
                      foreach ($this->estaciones as $estacion) { ?>
                        <option value=" <?php echo $estacion['NumeroEstacion'] ?>"><?php echo $estacion['nombre'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="modalidad">Modalidad</label>
                    <select class="form-control" id="modalidad" name="modalidad" placeholder="Modalidad">
                      <option value="" selected>Seleccione un valor</option>
                      <option value="LL">Llevar</option>
                      <option value="DO">Domicilio</option>
                      <option value="ME">Mesa</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="activo">Estado</label>
                    <select class="form-control" id="activo" name="activo" placeholder="Activo">
                      <option value="1" default>Pendiente</option>
                      <option value="0">Finalizado</option>
                    </select>
                  </div>
                  <div id="field_wrapper" class="col-md-12">
                  <!-- <div class="form-group col-md-6"><label>Cliente</label><select class="form-control cmbbuscar select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"><option value="" selected disabled hidden>Seleccione un valor</option><?php foreach ($this->clientes as $cliente) { ?> <option value=" <?php echo $cliente['idcliente'] ?>"><?php echo $cliente['nombre'] ?></option><?php } ?> </select></div>                     -->
                  </div>
                  <div class="form-group col-md-6">
                    <label for="fechahora">Estado del Pedido</label>
                    <div class="row">
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success mr-4 ml-2">
                        <input type="checkbox" class="custom-control-input" id="elaborado" name="elaborado" value="1" checked control-id="ControlID-43">
                        <label class="custom-control-label" for="elaborado">Elaborado</label>
                      </div>
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success mr-4">
                        <input type="checkbox" class="custom-control-input" id="entregado" name="entregado" value="1" checked control-id="ControlID-43">
                        <label class="custom-control-label" for="entregado">Entregado</label>
                      </div>
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success mr-4">
                        <input type="checkbox" class="custom-control-input" id="facturado" name="facturado" value="1" checked control-id="ControlID-43">
                        <label class="custom-control-label" for="facturado">Facturado</label>
                      </div>
                    </div>
                  </div>
                </div>
                <label for="">Agregar Fila</label>
                <button type="button" class="btn btn-success" onclick="AgregarFila()"><i class="text-white fas fa-plus-square"></i></button>
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
    var conteoDetallePedidos = 0

    function AgregarFila() {
      $('#detallePedido > tbody:last-child')
        .append('<tr id="2" ><td><select select class="form-control cmbbuscar1 select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" name="detallePedido[' + conteoDetallePedidos + '][producto]" class="form-control" ><option value="" selected>Seleccione un valor</option><?php foreach ($this->productos as $subproducto) { ?> <option value="<?php echo $subproducto['codigo'] ?>"><?php echo $subproducto['nombre'] ?></option><?php } ?><td></select><input type="number" step="1" name="detallePedido[' + conteoDetallePedidos + '][cantidad]" class="form-control" placeholder="Escriba la cantidad" required></td><td><select select class="form-control cmbbuscar3 select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="6" ta name="detallePedido[' + conteoDetallePedidos + '][subproducto]"><option value="" selected>Seleccione un valor</option><?php foreach ($this->productos as $producto) { ?> <option value=" <?php echo $producto['codigo'] ?>"><?php echo $producto['nombre'] ?></option><?php } ?> </select></td><td><input type="text" name="detallePedido[' + conteoDetallePedidos + '][notas]" class="form-control" placeholder="Escriba notas" required></td><td><button class="btn btn-danger" type="button" onclick="EliminarFila(2)"><i class="text-white fas fa-backspace"></i></button></td></tr>');
      conteoDetallePedidos++
      $('.cmbbuscar1').select2();
      $('.cmbbuscar3').select2();
    }

    $(document).ready(function() {
      $('.cmbBuscarEstacion').select2();
      $('.cmbBuscarMesero').select2();
    });

    function EliminarFila(id) {
      $('#' + id).remove();
    }

    $(document).ready(function() {
      
    });



    $(document).ready(function() {
      var cmbModalidad = document.getElementById('modalidad'); //Add button selector
      var wrapper = $('#field_wrapper'); //Input field wrapper
      var fieldMesa = '<div id="mesa" class="col-md-12 row"><div class="form-group col-md-6"><label for="idcliente">N?? Mesa</label><select class="form-control cmbbuscarMesa select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="4" tabindex="-1" aria-hidden="true" name="idmesa"><option value="" selected disabled hidden>Seleccione un valor</option><?php foreach ($this->mesas as $mesa) { ?><option value=" <?php echo $mesa['idregistro'] ?>"><?php echo $mesa['Mesa'] ?></option><?php } ?></select></div><div class="form-group col-md-6"><label for="idpedido">Cuenta</label><input type="number" min=0 ste=1 class="form-control" id="cuenta" name="cuenta" placeholder="Cuenta" required></div><div class="form-group col-md-6"><label for="idcliente">Nombre de la Cuenta</label><input type="text" class="form-control" id="nombrecuenta" name="nombrecuenta" placeholder="Nombre de la cuenta" required></div></div>'; //New input field html 
      var fieldLlevar = '<div id="mesa2" class="col-md-12 row"><div class="form-group col-md-6" data-select2-id="63"><label>Cliente</label><select class="form-control cmbbuscar select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="idcliente"><option value="" selected>Seleccione un valor</option><?php foreach ($this->clientes as $cliente) { ?> <option value=" <?php echo $cliente['idcliente'] ?>"><?php echo $cliente['nombre'] ?></option><?php } ?> </select></div>';
      var x = 1;
      var y = 1;
      var max = 1;

      //Once add button is clicked
      $(cmbModalidad).change(function() {
        var cmbModalidadValor = cmbModalidad.options[cmbModalidad.selectedIndex].text; //Get initial value
        console.log(cmbModalidadValor);
        if (cmbModalidadValor == 'Mesa' && max <= 1) {
          x++;
          $(wrapper).append(fieldMesa);          
          $('.cmbbuscar').select2();
         
          $('.cmbbuscarMesa').select2();
        }
         else {
          x == 0;
          $('#mesa').remove();
        }
        if (cmbModalidadValor == 'Llevar' && max <= 1) {
          x++;
          $(wrapper).append(fieldLlevar);          
          $('.cmbbuscar').select2();
        }
         else {
          x == 0;
          $('#mesa2').remove();
        } //Add field html
      });
    });
  </script>