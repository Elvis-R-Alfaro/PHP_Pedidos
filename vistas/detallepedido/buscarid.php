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
                            <h3 class="card-title">Mostrando <small>Detalle pedido Id: <?php echo $this->datos[0]['idregistro'] ?></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm">
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="inputNombre">Numero Pedido</label>
                                    <input type="number" readonly value="<?php echo $this->datos[0]['NumeroPedidos'] ?>" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNombre">Codigo Producto</label>
                                    <input type="text" readonly value="<?php echo $this->datos[0]['CodigoProducto'] ?>" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNombre">Cantidad</label>
                                    <input type="text" readonly value="<?php echo $this->datos[0]['Cantidad'] ?>" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNombre">subproducto</label>
                                    <input type="text" readonly value="<?php echo $this->datos[0]['subproducto'] ?>" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputNombre">Notas</label>
                                    <input type="text" readonly value="<?php echo $this->datos[0]['Notas'] ?>" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNombre">Cancelado</label>
                                    <input type="number" step="1" readonly value="<?php echo $this->datos[0]['Cancelado'] ?>" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNombre">Elaborado</label>
                                    <input type="number" step="1" readonly value="<?php echo $this->datos[0]['Elaborado'] ?>" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNombre">Entregado</label>
                                    <input type="number" step="1" readonly value="<?php echo $this->datos[0]['Entregado'] ?>" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNombre">Facturado</label>
                                    <input type="number" step="1" readonly value="<?php echo $this->datos[0]['Facturado'] ?>" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
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