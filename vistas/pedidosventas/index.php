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
          <h5 class="mb-2 mt-4">Lista de Pedidos</h5>
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Información general de pedidos y ventas </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>N° FACTURA</th>
                        <th>N° PEDIDO</th>
                        <th>DESCRIPCION</th>                        
                        <th>ACCIONES</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($this->datos as $row) { ?>
                        <tr>
                          <td><a href="/pedidosventas/buscarId?id=<?php echo $row['NumeroFactura']; ?>"><?php echo $row['NumeroFactura']; ?></a></td>
                          <td><?php echo $row['NumeroPedido']; ?></td>
                          <td><?php echo $row['Nombre']; ?></td>
                          <td>
                            <a class="btn btn-warning" href="/pedidosventas/buscarId?id=<?php echo $row['NumeroFactura']; ?>"><i class="text-white fas fa-edit"></i></a>
                            <a class="btn btn-danger" onclick = "return confirm('Estas seguro de eliminar?')"
                             href="/pedidosventas/eliminar?id=<?php echo $row['NumeroFactura']; ?>"><i class="text-white fas fa-trash"></i></a>                            
                          </td>
                        </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="/pedidosventas/nuevo" class="btn btn-sm btn-info float-left">Nuevo pedido</a>
                  <a href="/pedidosventas/buscar" class="btn btn-sm btn-secondary float-right">Buscar pedido</a>
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