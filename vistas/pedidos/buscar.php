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
                    <form action="/pedidos/buscar" method="post">
                        <div class="input-group input-group-lg">
                            <select class="" id="filtro" name="filtro">
                                <option value="pedidos.NumeroPedido">N° Pedido</option>
                                <option value="meseros.nombre">Mesero</option>
                                <option value="estaciones.nombre">Estacion</option>
                                <option value="pedidos.modalidad">Modalidad</option>
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
                                <th>MESERO</th>
                                <th>FECHA Y HORA</th>
                                <th>ESTACION</th>
                                <!-- <th>ESTADO</th> -->
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
                                    <!-- <td><?php echo $row['activo']; ?></td> -->
                                    <td><?php echo $row['modalidad']; ?></td>
                                    <td>
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
                                        <a class="btn btn-warning" href="/pedidos/buscarId?id=<?php echo $row['NumeroPedido']; ?>"><i class="text-white fas fa-edit"></i></a>
                                        <a class="btn btn-danger" onclick="return confirm('Estas seguro de cancelar?')" href="/pedidos/eliminar?id=<?php echo $row['NumeroPedido']; ?>"><i class="text-white fas fa-window-close"></i></a>
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
                if($this->datos == null){
                    $msj=
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