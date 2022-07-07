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
              <form id="quickForm" action="/pedidoselaborados/guardar/" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNombre">N° Detalle Pedidos</label>
                    <input type="number" name="iddetallepedido" class="form-control" id="inputNombre" placeholder="Escriba el id detalle pedido" required>
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Usuario</label>
                    <!-- <select class="form-control" name="idusuario"> -->
                    <select class="form-control cmbbuscar select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="idusuario">
                    <option value="" selected disabled hidden>Seleccione un valor</option>
                      <?php
                      foreach ($this->datos as $usuario) { ?>
                        <option value=" <?php echo $usuario['idregistro'] ?>"><?php echo $usuario['loginusuario'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Fecha Hora</label>
                    <input type="date" name="fechahora" class="form-control" id="textareaDescricion" placeholder="Escriba la descripcion del cargo">
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