<?php include 'vistas/plantilla/encabezado.php'; ?>
<div class="wrapper">
    <?php 
        require 'vistas/plantilla/nav.php'; 
        require 'vistas/plantilla/menulateral.php';
        require 'vistas/plantilla/contenidotitulo.php';
    ?>
    <section class="content">
        <div class="container-fluid">
          <h5 class="mb-2 mt-4">Lista de Pedidos x Ventas</h5>
           <!--<h5 class="mb-2 mt-4">?php var_dump($this->datos);?></h5>-->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Informacion General de Pedidos y ventas</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>NUMERO DE FACTURA</th>
                        <th>NUMERO DE PEDIDO</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach($this->datos as $row) { ?>
                        <tr>
                          <td><a href="/pedidosventas/buscarid?id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
                          <td><?php echo $row['NumeroFactura']; ?></td>
                          <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $row['NumeroPedido']; ?></div>
                          </td>

                          <td><a class="btn btn-warning" href="/pedidosventas/editar?id=<?php echo $row['id']; ?>">edit</a>
                          <a class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar?')"
                           href="/pedidosventas/eliminar?id=<?php echo $row['idn']; ?>">del</a></td>
                          

                        </tr>  
                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="/pedidosventas/nuevo" class="btn btn-sm btn-info float-left">Generar nuevo pedido X venta</a>
                  <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Buscar </a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- Fin columna izquierda -->
            <!-- Comienzo columna derecha -->
            <div class="col-md-4">
              <div class="card">
              
                <!-- /.card-header -->

                <!-- /.card-body -->

                <!-- /.footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- Fin columna derecha -->
          </div>
          <!-- Fin primera fila -->
        </div>
    </section>
    <!-- /.content -->
<?php include 'vistas/plantilla/pie.php'; ?>
<!-- Aqui agregar script adicionales -->
<?php include 'vistas/plantilla/script.php'; ?>