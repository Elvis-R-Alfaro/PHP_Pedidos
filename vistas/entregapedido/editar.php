<?php include 'vistas/plantilla/encabezado.php'; ?>
<div class="wrapper">
  <?php
  require 'vistas/plantilla/nav.php';
  require 'vistas/plantilla/menulateral.php';
  require 'vistas/plantilla/contenidotitulo.php';
  ?>
  <?php
  $n1 = 10;
  $n2 = 20;
  $r = $n1 + $n2;
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
              <h3 class="card-title">Datos generales <small>Entrega Pedido</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="/entregapedido/actualizar?id=<?php echo $this->datos[0]['iddetalle_pedido']; ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputNombre">Id Detalle Pedido</label>
                  <input type="number" readonly name="iddetalle_pedido" class="form-control" value="<?php echo strval($this->datos[0]['iddetalle_pedido']); ?>" id="inputNombre" placeholder="Escriba el nombre del pedido" required>
                </div>
                <!-- <div class="form-group">
                  <label for="textareaDescricion">Id usuario</label>
                  <select class="form-control cmbbuscar select2 select2-hidden-accessible" name="usuario" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
>
                    <option value="<?php echo $this->datos[0]['usuario'] ?>" selected disable hidden> <?php echo $this->datos[0]['loginusuario'] ?></option>
                    <?php
                    foreach ($this->entregapedido as $usuario) { ?>
                      <option value=" <?php echo $usuario['idregistro'] ?>"><?php echo $usuario['loginusuario'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div> -->

                <div class="form-group">
                    <label>Usuario</label>
                    <select class="form-control cmbbuscar select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="usuario">
                    <option value="" selected disabled hidden>Seleccione un valor</option>
                    <?php foreach ($this->entregapedido as $usuario) { ?> 
                      <option value=" <?php echo $usuario['idregistro'] ?>"><?php echo $usuario['loginusuario'] ?></option>
                      <?php } ?> 
                    </select>
                  </div>

                <div class="form-group">
                  <label for="textareaDescricion">Fecha Hora</label>
                  <input type="datetime-local" name="fechahora" class="form-control" value="<?php echo date("Y-m-d\TH:i:s", strtotime($this->datos[0]['fechahora'])); ?>" id="textareaDescricion" placeholder="Agregue la fecha">
                </div>
                <div class="form-group">
                  <label for="textareaDescricion">Id entrega</label>
                  <input type="text" name="identrega" class="form-control" value="<?php echo strval($this->datos[0]['identrega']); ?>" id="textareaDescricion" placeholder="Agregue el id de entrega">
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

</script>