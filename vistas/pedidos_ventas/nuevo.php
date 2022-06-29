<form action="pedidos_llevar/Guardar" method="POST">
    <div class="row">
        <h3>Pagina pedidos x ventas</h3>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label>Numero de factura</label>
                <input type="text" class="form-control" name="NumeroFactura">
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>Numero de pedido</label>
                <input type="text" class="form-control" name="NumeroPedido">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>