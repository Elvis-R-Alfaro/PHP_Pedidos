<?php include 'vistas/plantilla/encabezado.php'; ?>
<div class="wrapper">
    <?php
    require 'vistas/plantilla/nav.php';
    require 'vistas/plantilla/menulateral.php';
    require 'vistas/plantilla/contenidotitulo.php';
    ?>
    <!-- Main content -->



    <section class="content-header">
        <div class="container-fluid">
            <h2 class="text-center display-4">Buscar</h2>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="/pedidoscancelados/buscar" method="post">
                        <div class="input-group input-group-lg">
                            <select class="" id="filtro" name="filtro">
                                <option value="pedidos_cancelados.numeropedido">N° pedido</option>
                                <option value="usuarios.LoginUsuario">Usuario</option>
                            </select>
                            <input type="search" id="buscar" name="buscar" class="form-control form-control-lg" placeholder="Buscar" value="">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3"></div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>N° PEDIDO</th>
                                <th>USUARIO</th>
                                <th>FECHA</th>
                                <!-- <th>ESTADO</th> -->
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
                                        <a class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar?')" href="/pedidoscancelados/eliminar?id=<?php echo $row['numeropedido']; ?>">Eliminar</a>
                                    </td>
                                </tr>

                            <?php  } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
    <?php
    if ($this->datos == null) {
        $msj =
            '<section class="content-header">
                        <div class="container-fluid">
                            <h5 class="text-center display">No existen datos que coincidan con la busqueda</h5>
                        </div>
                    </section>';
        echo $msj;
    }
    ?>


    <!-- /.content -->
    <?php include 'vistas/plantilla/pie.php'; ?>
    <!-- Aqui agregar script adicionales -->
    <?php include 'vistas/plantilla/script.php'; ?>