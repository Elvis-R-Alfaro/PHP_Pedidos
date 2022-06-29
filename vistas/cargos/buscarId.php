<?php include 'vistas/plantilla/encabezado.php'; ?>
<div class="wrapper">
    <?php
    require 'vistas/plantilla/nav.php';
    require 'vistas/plantilla/menulateral.php';
    require 'vistas/plantilla/contenidotitulo.php';
    ?>
    <?php

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
                            <h3 class="card-title">Datos generales <small>Cargos de empleados</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="/cargos/actualizar?id=<?php echo $this->datos[0]['id'] ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputNombre">Nombre del cargo</label>
                                    <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Escriba el nombre del cargo" required value="<?php echo $this->datos[0]['nombre'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="textareaDescricion">Descripción</label>
                                    <textarea name="descripcion" class="form-control" id="textareaDescricion" placeholder="Escriba la descripcion del cargo" row="3"><?php echo $this->datos[0]['descripcion'] ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary toastrDefaultSuccess">Guardar</button>
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