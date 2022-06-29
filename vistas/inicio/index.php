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
          <h5 class="mb-2 mt-4">Información general del restaurante</h5>
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Información de pedidos</h3>

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
                        <th>N° de orden</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td><a href="pages/examples/invoice.html">1</a></td>
                        <td>Carlos Flores</td>
                        <td><span class="badge badge-success">Terminado</span></td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="pages/examples/invoice.html">2</a></td>
                        <td>Andrea Hernández</td>
                        <td><span class="badge badge-warning">Elaborando en cocina</span></td>
                        <td>
                          <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="pages/examples/invoice.html">3</a></td>
                        <td>Brenda Paz</td>
                        <td><span class="badge badge-danger">Factura pendiente</span></td>
                        <td>
                          <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="pages/examples/invoice.html">4</a></td>
                        <td>Javier López</td>
                        <td><span class="badge badge-info">Pedido recibido</span></td>
                        <td>
                          <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Generar nuevo pedido</a>
                  <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Buscar pedido</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- Fin columna izquierda -->
            <!-- Comienzo columna derecha -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Areas del restaurante</h3>

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
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="chart-responsive">
                        <canvas id="pieChart" height="150"></canvas>
                      </div>
                      <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <ul class="chart-legend clearfix">
                        <li><i class="far fa-circle text-danger"></i> Chrome</li>
                        <li><i class="far fa-circle text-success"></i> IE</li>
                        <li><i class="far fa-circle text-warning"></i> FireFox</li>
                        <li><i class="far fa-circle text-info"></i> Safari</li>
                        <li><i class="far fa-circle text-primary"></i> Opera</li>
                        <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                      </ul>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer p-0">
                  <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        United States of America
                        <span class="float-right text-danger">
                          <i class="fas fa-arrow-down text-sm"></i>
                          12%</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/" class="nav-link">
                        India
                        <span class="float-right text-success">
                          <i class="fas fa-arrow-up text-sm"></i> 4%
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/" class="nav-link">
                        China
                        <span class="float-right text-warning">
                          <i class="fas fa-arrow-left text-sm"></i> 0%
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- /.footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- Fin columna derecha -->
          </div>
          <!-- Fin primera fila -->
        </div>
    </section>
<?php include 'vistas/plantilla/pie.php'; ?>
<?php include 'vistas/plantilla/script.php'; ?>