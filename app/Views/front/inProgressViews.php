<section class="pt-3">
    <div class="card">
        <div class="card-body">
            <div class="card-title text-center pt-3 pb-3"><h1>Accesos rapidos a Vistas en Proceso</h1></div>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a class="btn btn-warning" href="<?php echo base_url('detalleProducto');?>">Detalle Producto</a>
                <a class="btn btn-info" href="<?php echo base_url('vistaAgregarProducto');?>">Nuevo Producto</a>
                <a class="btn btn-info" href="<?php echo base_url('adminProductos');?>">Administrar Productos</a>
                <a class="btn btn-danger" href="#">carrito</a>
                <a class="btn btn-danger" href="#">compras usuario</a>
                <a class="btn btn-danger" href="#">ventas admin</a>
            </div>
            <p>
                Faltan las vistas de:
                <ul>
                    <li>Carrito de compras</li>
                    <li>Historial de compras</li>
                    <li>Historial de ventas</li>
                </ul>
            </p>
        </div>
    </div>
</section>