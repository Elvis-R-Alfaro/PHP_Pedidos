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
                    <form action="/pedidosmesa/buscar" method="post">
                        <div class="input-group input-group-lg">
                            <select class="" id="filtro" name="filtro">
                            <option value="pedidos_mesa.idregistro">N° Registro</option>
                                <option value="pedidos_mesa.idpedido">N° pedido</option>
                                <option value="mesas_x_area.Mesa">Mesa</option>
                                <option value="pedidos_mesa.cuenta">Cuenta</option>
                                <option value="pedidos_mesa.nombrecuenta">Nombre Cuenta</option>
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
                                <th>REGISTRO</th>
                                <th>N° PEDIDO</th>
                                <th>MESA</th>
                                <th>CUENTA</th>
                                <th>NOMBRE CUENTA</th>
                                <!-- <th>ESTADO</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->datos as $row) { ?>

                                <tr>
                                    <td><a href="/pedidosmesa/buscarId?id=<?php echo $row['idregistro']; ?>"><?php echo $row['idregistro']; ?></a></td>
                                    <td><?php echo $row['idpedido']; ?></td>
                                    <td><?php echo $row['Mesa']; ?></td>
                                    <td><?php echo $row['cuenta']; ?></td>
                                    <td><?php echo $row['nombrecuenta']; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="/pedidosmesa/buscarId?id=<?php echo $row['idregistro']; ?>">Editar</a>
                                        <a class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar?')" href="/pedidosmesa/eliminar?id=<?php echo $row['idregistro']; ?>">Eliminar</a>
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