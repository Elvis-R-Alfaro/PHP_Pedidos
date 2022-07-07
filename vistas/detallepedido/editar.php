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
                        <form id="quickForm" action="/detallepedido/update?id=<?php echo $this->datos[0]['idregistro'] ?>" method="post">
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="inputNombre">Numero Pedido</label>
                                    <input type="number" name="numeropedidos" value="<?php echo $this->datos[0]['NumeroPedido'] ?>" class="form-control" placeholder="Escriba el numero pedido" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Producto</label>
                                    <select class="form-control cmbBuscarProducto select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="codigoproducto">
                                        <option value="<?php echo $this->datos[0]['CodigoProducto'] ?>" selected><?php echo $this->datos[0]['NombreProducto'] ?></option>
                                        <?php foreach ($this->productos as $producto) { ?>
                                            <option value="<?php echo $producto['codigo'] ?>"><?php echo $producto['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNombre">Cantidad</label>
                                    <input type="number" min="0" step="1" name="cantidad" value="<?php echo $this->datos[0]['Cantidad'] ?>" class="form-control" placeholder="Escriba la cantidad" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>SubProducto</label>
                                    <select class="form-control cmbBuscarSubProducto select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true" name="subproducto">
                                    <option value="<?php echo $this->datos[0]['subproducto'] ?>" selected><?php echo $this->datos[0]['NombreSubproducto'] ?></option>
                                        <?php foreach ($this->productos as $producto) { ?>
                                            <option value="<?php echo $producto['codigo'] ?>"><?php echo $producto['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputNombre">Notas</label>
                                    <input type="text" name="notas" value="<?php echo $this->datos[0]['Notas'] ?>" class="form-control" placeholder="Escriba notas">
                                </div>
                                <div class="col-md-3 text-center custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">
                                    <input type="checkbox" class="custom-control-input" name="cancelado" id="cancelado" value="<?php echo $this->datos[0]['Cancelado']; ?>" <?php $checked = $this->datos[0]['Cancelado'] ?  "checked" : "";
                                                                                                                                                                            echo $checked ?> control-id="ControlID-43">
                                    <label class="custom-control-label" for="cancelado" id="cancelado">Cancelado</label>
                                </div>
                                <div class="col-md-3 text-center custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" name="elaborado" id="elaborado" value="<?php echo $this->datos[0]['Elaborado'] ?>" <?php $checked = $this->datos[0]['Elaborado'] ?  "checked" : ""; echo $checked ?> control-id="ControlID-43">
                                    <label class="custom-control-label" for="elaborado" id="elaborado">Elaborado</label>
                                </div>
                                <div class="col-md-3 text-center custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">
                                    <input type="checkbox" class="custom-control-input" name="entregado" id="entregado" value="<?php echo $this->datos[0]['Entregado'] ?>" <?php $checked = $this->datos[0]['Entregado'] ?  "checked" : "";
                                                                                                                                                                            echo $checked ?> control-id="ControlID-43">
                                    <label class="custom-control-label" for="entregado" id="entregado">Entregado</label>
                                </div>
                                <div class="col-md-3 text-center custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">
                                    <input type="checkbox" class="custom-control-input" name="facturado" id="facturado" value="<?php echo $this->datos[0]['Facturado'] ?>" <?php $checked = $this->datos[0]['Facturado'] ?  "checked" : "";
                                                                                                                                                                            echo $checked ?> control-id="ControlID-43">
                                    <label class="custom-control-label" for="facturado" id="facturado">Facturado</label>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary toastrDefaultSuccess">Guardar Cambios</button>
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

    <script>
        $(document).ready(function() {
            $('.cmbBuscarProducto').select2();
            $('.cmbBuscarSubProducto').select2();
        });
    </script>