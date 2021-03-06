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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table m-0">
                      <thead>
                        <tr>
                          <th class="text-center">ID</th>
                          <th class="text-center">NumeroPedido</th>
                          <th class="text-center">Producto</th>
                          <th class="text-center">Cantidad</th>
                          <th class="text-center">Notas</th>
                          <th class="text-center">subproducto</th>
                          <th class="text-center" width=3%>Cancelado</th>
                          <th class="text-center" width=3%>Elaborado</th>
                          <th class="text-center" width=3%>Entregado</th>
                          <th class="text-center" width=3%>Facturado</th>
                          <th class="text-center" width=15%>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($this->datos as $detallepedido) {
                        ?>
                          <tr>
                            <td class="text-center"><a href="/detallepedido/buscarid?id=<?php echo $detallepedido['idregistro'] ?>"><?php echo $detallepedido['idregistro'] ?> </a></td>
                            <td class="text-center">

                              <?php echo $detallepedido['NumeroPedidos'] ?></td>
                            <td class="text-center"><?php echo $detallepedido['NombreProducto'] ?></td>
                            <td class="text-center"><?php echo $detallepedido['Cantidad'] ?></td>
                            <td class="text-center"><?php echo $detallepedido['Notas'] ?></td>
                            <td class="text-center"><?php echo $detallepedido['NombreSubproducto'] ?></td>
                            <td class="text-center">
                              <?php
                              if ($detallepedido['Cancelado'] == 0) {
                              ?>
                                <span class="badge badge-danger">NO</span>
                              <?php
                              } else {
                              ?>
                                <span class="badge badge-success">SI</span>
                              <?php
                              }
                              ?>
                            <td class="text-center">
                              <?php
                              if ($detallepedido['Elaborado'] == 0) {
                              ?>
                                <span class="badge badge-danger">NO</span>
                              <?php
                              } else {
                              ?>
                                <span class="badge badge-success">SI</span>
                              <?php
                              }
                              ?>
                            <td class="text-center">
                              <?php
                                if ($detallepedido['Entregado'] == 0) {
                                ?>
                                  <span class="badge badge-danger">NO</span>
                                <?php
                                } else {
                                ?>
                                  <span class="badge badge-success">SI</span>
                                <?php
                                }
                              ?>
                            <td class="text-center">
                              <?php
                                if ($detallepedido['Facturado'] == 0) {
                                ?>
                                  <span class="badge badge-danger">NO</span>
                                <?php
                                } else {
                                ?>
                                  <span class="badge badge-success">SI</span>
                                <?php
                                }
                              ?>
                            <td class="text-center">
                              <a class="btn btn-warning" href="/detallepedido/editar?id=<?php echo $detallepedido['idregistro'] ?>"><i class="text-white fas fa-edit"></i></a>
                              <a class="btn btn-danger" href="/detallepedido/eliminar?id=<?php echo $detallepedido['idregistro'] ?>" onclick="return confirm('Estas seguro de eliminar?')"><i class="fas fa-trash"></i></a>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <!-- <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries (filtered from 57 total entries)</div> -->
                  </div>
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                      <!-- <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                      </ul> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="card-footer clearfix">
              <a href="/detallepedido/nuevo" class="btn btn-sm btn-info float-left">Generar nuevo Detalle Pedido</a>
              <a href="/detallepedido/buscar" class="btn btn-sm btn-secondary float-right">Buscar Detalle Pedido</a>
            </div>
            <!-- /.card-footer -->
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
  <?php include 'vistas/plantilla/script.php'; ?>