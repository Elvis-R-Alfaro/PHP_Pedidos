<?php include 'vistas/plantilla/encabezado.php'; ?>
<div class="wrapper">
  <?php
  require 'vistas/plantilla/nav.php';
  require 'vistas/plantilla/menulateral.php';
  require 'vistas/plantilla/contenidotitulo.php';
  ?>
  <section class="content">
    <div class="container-fluid">
      <h5 class="mb-2 mt-4">Lista de Entrega Pedidos </h5>
      <!--<h5 class="mb-2 mt-4">?php var_dump($this->datos);?></h5>-->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Informacion General de Entrega Pedidos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                    <tr>
                      <th>IDDETALLEPEDIDO</th>
                      <th>USUARIO</th>
                      <th>FECHAHORA</th>
                      <th>IDENTREGA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($this->datos as $row) { ?>
                      <tr>
                        <td><a href="/entregapedido/editar?id=<?php echo $row['iddetalle_pedido']; ?>"><?php echo $row['iddetalle_pedido']; ?></a></td>
                        <td><?php echo $row['loginusuario']; ?></td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $row['fechahora']; ?></div>
                        </td>
                        <td><?php echo $row['identrega']; ?></td>
                        <td>
                          <a class="btn btn-warning" href="/entregapedido/editar?id=<?php echo $row['iddetalle_pedido']; ?>">Editar</a>
                          <a class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar?')" href="/entregapedido/eliminar?id=<?php echo $row['iddetalle_pedido']; ?>">Eliminar</a>
                        </td>

                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="/entregapedido/nuevo" class="btn btn-sm btn-info float-left">Generar nuevo pedido entregado</a>
              <a href="/entregapedido/buscar" class="btn btn-sm btn-secondary float-right">Buscar pedido entregado</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- Fin columna izquierda -->
      </div>
      <!-- Fin primera fila -->
    </div>
  </section>
  <!-- /.content -->
  <?php include 'vistas/plantilla/pie.php'; ?>
  <!-- Aqui agregar script adicionales -->
  <?php include 'vistas/plantilla/script.php'; ?>