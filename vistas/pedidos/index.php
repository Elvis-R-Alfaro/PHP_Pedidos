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
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Información general de Pedidos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                    <tr>
                      <th>N° PEDIDO</th>
                      <th>MESERO</th>
                      <th>FECHA Y HORA</th>
                      <th>ESTACION</th>
                      <th>ESTADO</th>
                      <th>MODALIDAD</th>
                      <th>ESTADO DEL PEDIDO</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($this->datos as $row) { ?>
                      <tr>
                        <td><a href="/pedidos/buscarId?id=<?php echo $row['NumeroPedido']; ?>"><?php echo $row['NumeroPedido']; ?></a></td>
                        <td><?php echo $row['nombremesero']; ?></td>
                        <td><?php echo $row['fechahora']; ?></td>
                        <td><?php echo $row['nombreestacion']; ?></td>
                       <td><?php echo $row['activo']; ?></td>
                        <td><?php echo $row['modalidad']; ?></td>
                        <td>
                          <?php echo $row['estado']; ?>
                          <!-- <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" readonly class="custom-control-input"  id="elaborado<?php echo $row['NumeroPedido']; ?>" name="elaborado<?php echo $row['NumeroPedido']; ?>" value="<?php echo $row['elaborado']; ?>" checked control-id="ControlID-45">
                            <label class="custom-control-label"  for="elaborado<?php echo $row['NumeroPedido']; ?>">Elaborado</label>
                          </div> -->
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="elaborado<?php echo $row['NumeroPedido']; ?>" <?php echo $row['elaborado']; ?> readonly>
                            <label class="custom-control-label">Elaborado</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="entregado<?php echo $row['NumeroPedido']; ?>" <?php echo $row['entregado']; ?> readonly>
                            <label class="custom-control-label">Entregado</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="facturado<?php echo $row['NumeroPedido']; ?>" <?php echo $row['facturado']; ?> readonly>
                            <label class="custom-control-label">Facturado</label>
                          </div>
                        </td>
                        <td>
                          <a class="btn btn-warning" href="/pedidos/buscarId?id=<?php echo $row['NumeroPedido']; ?>">Editar</a>
                          <a class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar?')" href="/pedidos/eliminar?id=<?php echo $row['NumeroPedido']; ?>">Eliminar</a>
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
              <a href="/pedidos/nuevo" class="btn btn-sm btn-info float-left">Generar nuevo pedido</a>
              <a href="/pedidos/buscar" class="btn btn-sm btn-secondary float-right">Buscar pedido</a>
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