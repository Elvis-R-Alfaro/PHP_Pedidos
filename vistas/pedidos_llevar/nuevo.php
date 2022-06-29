<form action="pedidos_llevar/Guardar" method="POST">
    <div class="row">
        <h3>Pagina pedidos llevar</h3>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label>ID registro</label>
                <input type="text" class="form-control" name="idregistro">
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>ID pedido</label>
                <input type="text" class="form-control" name="idpedido">
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>ID cliente</label>
                <input type="text" class="form-control" name="idcliente">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>