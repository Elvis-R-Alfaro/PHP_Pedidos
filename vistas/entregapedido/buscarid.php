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
                <h3 class="card-title">Datos generales <small>Entrega Pedido</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNombre">Id Detalle Pedidos</label>
                    <input type="number" class="form-control" readonly value="<?php echo strval($this->datos[0]['iddetalle_pedido']);?>" >
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Usuario</label>
                    <input type="text"class="form-control" readonly value="<?php echo $this->datos[0]['loginusuario'];?>">
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Fecha Hora</label>
                    <input type="text" class="form-control" readonly value=" <?php echo strval($this->datos[0]['fechahora']);?>">
                  </div>
                  <div class="form-group">
                    <label for="textareaDescricion">Id Entrega</label>
                    <input type="text" class="form-control" readonly value=" <?php echo strval($this->datos[0]['identrega']);?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-primary toastrDefaultSuccess">Guardar</button> -->
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