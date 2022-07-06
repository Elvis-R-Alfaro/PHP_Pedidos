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
                        <form id="quickForm" method="post">
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="inputNombre">Numero Pedido</label>
                                    <input type="number" readonly name="numeropedidos" value="<?php echo $this->datos[0]['NumeroPedido'] ?>" class="form-control" placeholder="Escriba el numero pedido" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Producto</label>
                                        <input class="form-control" value="<?php echo $this->datos[0]['NombreProducto'] ?>">
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNombre">Cantidad</label>
                                    <input type="number" readonly min="0" step="1" name="cantidad" value="<?php echo $this->datos[0]['Cantidad'] ?>" class="form-control" placeholder="Escriba la cantidad" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>SubProducto</label>
                                    <input class="form-control" value="<?php echo $this->datos[0]['NombreSubproducto'] ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputNombre">Notas</label>
                                    <input readonly type="text" name="notas" value="<?php echo $this->datos[0]['Notas'] ?>" class="form-control" placeholder="Escriba notas">
                                </div>
                                <div class="col-md-3 text-center custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">
                                    <input type="checkbox" class="custom-control-input" name="cancelado" id="" value="<?php echo $this->datos[0]['Cancelado']; ?>" <?php $checked = $this->datos[0]['Cancelado'] ?  "checked" : "";
                                                                                                                                                                            echo $checked ?> control-id="ControlID-43">
                                    <label class="custom-control-label" for="cancelado" id="">Cancelado</label>
                                </div>
                                <div class="col-md-3 text-center custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input readonly type="checkbox" class="custom-control-input" name="elaborado" id="" value="<?php echo $this->datos[0]['Elaborado'] ?>" <?php $checked = $this->datos[0]['Elaborado'] ?  "checked" : ""; echo $checked ?> control-id="ControlID-43">
                                    <label class="custom-control-label" for="elaborado" id="">Elaborado</label>
                                </div>
                                <div class="col-md-3 text-center custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">
                                    <input readonly type="checkbox" class="custom-control-input" name="entregado" id="" value="<?php echo $this->datos[0]['Entregado'] ?>" <?php $checked = $this->datos[0]['Entregado'] ?  "checked" : "";
                                                                                                                                                                            echo $checked ?> control-id="ControlID-43">
                                    <label  class="custom-control-label" for="entregado" id="">Entregado</label>
                                </div>
                                <div class="col-md-3 text-center custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">
                                    <input readonly type="checkbox" class="custom-control-input" name="" id="" value="<?php echo $this->datos[0]['Facturado'] ?>" <?php $checked = $this->datos[0]['Facturado'] ?  "checked" : "";
                                                                                                                                                                            echo $checked ?> control-id="ControlID-43">
                                    <label class="custom-control-label" for="facturado" id="">Facturado</label>
                                </div>
                            </div>
                            <!-- /.card-body -->
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

    <script>
        $(document).ready(function() {
            $('.cmbBuscarProducto').select2();
            $('.cmbBuscarSubProducto').select2();
        });
    </script>