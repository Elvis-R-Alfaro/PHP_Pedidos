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
            <h2 class="text-center display-4">Buscar Pedido Entregado</h2>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="/entregapedido/buscar" method="post">
                        <div class="input-group input-group-lg">
                            <select class="" id="filtro" name="filtro">
                                <option value="entrega_pedido.iddetalle_pedido">N° Detalle Pedido</option>
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
                                <th>N° DETALLE PEDIDO</th>
                                <th>USUARIO</th>
                                <th>FECHA Y HORA</th>
                                <th>N° Entrega</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->datos as $row) { ?>
                                <tr>
                                    <td><a href="/entregapedido/editar?id=<?php echo $row['iddetalle_pedido']; ?>"><?php echo $row['iddetalle_pedido']; ?></a></td>
                                    <td><?php echo $row['loginusuario']; ?></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $row['fechahora']; ?></div>
                                    </td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $row['identrega']; ?></div>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="/entregapedido/editar?id=<?php echo $row['iddetalle_pedido']; ?>">Editar</a>
                                        <a class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar?')" href="/entregapedido/eliminar?id=<?php echo $row['iddetalle_pedido']; ?>">Eliminar</a>
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