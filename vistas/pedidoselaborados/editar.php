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
              <h3 class="card-title">Datos generales <small>Pedidos Elaborados</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="/pedidoselaborados/actualizar?id=<?php echo $this->datos[0]['iddetallepedido']; ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputNombre">N° Detalle Pedidos</label>
                  <input type="number" readonly name="iddetallepedido" class="form-control" value="<?php echo strval($this->datos[0]['iddetallepedido']); ?>" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                </div>
                <div class="form-group">
                  <label for="textareaDescricion">Usuario</label>
                  <select class="form-control cmbbuscar select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="idusuario">
                    <option value="<?php echo $this->datos[0]['idusuario'] ?>"selected disable hidden> <?php echo $this->datos[0]['loginusuario'] ?></option>
                    <?php
                    foreach ($this->usuarios as $usuario) { ?>
                      <option value=" <?php echo $usuario['idregistro'] ?>"><?php echo $usuario['loginusuario'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="textareaDescricion">Fecha Hora</label>
                  <input type="datetime-local" name="fechahora" class="form-control" value="<?php echo date("Y-m-d\TH:i:s", strtotime($this->datos[0]['fechahora'])); ?>" id="textareaDescricion" placeholder="Escriba la descripcion del cargo">
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