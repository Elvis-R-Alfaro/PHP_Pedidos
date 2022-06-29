<?php include 'vistas/plantilla/encabezado.php'; ?>
<div class="wrapper">
  <?php
  require 'vistas/plantilla/nav.php';
  require 'vistas/plantilla/menulateral.php';
  require 'vistas/plantilla/contenidotitulo.php';
  ?>
  <!-- Main content -->
  <!-- Main content -->
  <section class="content">
        <div class="container-fluid">
          <h5 class="mb-2 mt-4">Lista de cargos</h5>
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Información general de cargos</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>NUMERO PEDIDO</th>
                        <th>ID MESERO</th>
                        <th>FECHA Y HORA</th>
                        <th>ESTACION</th>
                        <th>ACTIVO</th>
                        <th>MODALIDAD</th>
                        <th>ESTADO</th>
                        <th>ACCION</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($this->datos as $row) { ?>
                        <tr>
                          <td><a href="/pedidos/buscarId?id=<?php echo $row['NumeroPedido']; ?>"><?php echo $row['NumeroPedido']; ?></a></td>
                          <td><?php echo $row['idmesero']; ?></td>
                          <td><?php echo $row['fechahora']; ?></td>
                          <td><?php echo $row['Estacion']; ?></td>
                          <td><?php echo $row['activo']; ?></td>
                          <td><?php echo $row['modalidad']; ?></td>
                          <td><?php echo $row['estado']; ?></td>
                          <td><a href="/pedidos/eliminar?id=<?php echo $row['NumeroPedido']; ?>"><button type="button" class="btn btn-danger" >Eliminar</button></a></td>
                        </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="/pedidos/nuevo" class="btn btn-sm btn-info float-left">Generar nuevo pedido</a>
                  <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Buscar pedido</a>
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