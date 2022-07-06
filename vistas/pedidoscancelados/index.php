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
          <h5 class="mb-2 mt-4">Lista de Pedidos Cancelados</h5>
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Información general de pedidos a cancelar</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>ID PEDIDO</th>
                        <th>USUARIO</th>
                        <th>FECHA</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($this->datos as $row) { ?>
                        <tr>
                          <td><a href="/pedidoscancelados/buscarid?id=<?php echo $row['numeropedido']; ?>"><?php echo $row['numeropedido']; ?></a></td>
                          <td><?php echo $row['LoginUsuario']; ?></td>
                          <td><?php echo $row['fechahora']; ?></td>
                          <td>
                            <a class="btn btn-warning" href="/pedidoscancelados/buscarid?id=<?php echo $row['numeropedido']; ?>">Editar</a>
                            <a class="btn btn-danger" onclick = "return confirm('Estas seguro de eliminar?')"
                             href="/pedidoscancelados/eliminar?id=<?php echo $row['numeropedido']; ?>">Eliminar</a>                            
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
                  <a href="/pedidoscancelados/nuevo" class="btn btn-sm btn-info float-left">Nuevo pedido cancelado</a>
                  <a href="/pedidoscancelados/buscar" class="btn btn-sm btn-secondary float-right">Buscar pedido cancelado</a>
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