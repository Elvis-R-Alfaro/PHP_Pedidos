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
          <h5 class="mb-2 mt-4">Lista de Pedidos llevar</h5>
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Información general de pedidos a llevar</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>ID REGISTRO</th>
                        <th>ID PEDIDO</th>
                        <th>CLIENTE</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($this->datos as $row) { ?>
                        <tr>
                          <td><a href="/pedidosllevar/buscarId?id=<?php echo $row['idregistro']; ?>"><?php echo $row['idregistro']; ?></a></td>
                          <td><?php echo $row['idpedido']; ?></td>
                          <td><?php echo $row['nombre']; ?></td>
                          <td>
                            <a class="btn btn-warning" href="/pedidosllevar/buscarId?id=<?php echo $row['idregistro']; ?>">Editar</a>
                            <a class="btn btn-danger" onclick = "return confirm('Estas seguro de eliminar?')"
                             href="/pedidosllevar/eliminar?id=<?php echo $row['idregistro']; ?>">Eliminar</a>                            
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
                  <a href="/pedidosllevar/nuevo" class="btn btn-sm btn-info float-left">Nuevo pedido a llevar</a>
                  <a href="/pedidosllevar/buscar" class="btn btn-sm btn-secondary float-right">Buscar pedido a llevar</a>
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