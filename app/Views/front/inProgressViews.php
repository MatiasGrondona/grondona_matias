<section class="pt-3">
    <div class="card">
        <div class="card-body">
            <div class="card-title text-center pt-3 pb-3"><h1>Accesos rapidos a Vistas en Proceso</h1></div>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a class="btn btn-danger" href="<?php echo base_url('detalleProducto');?>">Detalle Producto</a>
                <a class="btn btn-warning" href="<?php echo base_url('nuevoProducto');?>">Nuevo Producto</a>
                <a class="btn btn-success" href="<?php echo base_url('administrarProductos');?>">Administrar Productos</a>
            </div>
            <p>
                Faltan las vistas de:
                <ul>
                    <li>Carrito de compras</li>
                    <li>Registro de usuario / añadir a la vista de login una opcion de redireccion a la vista de registrar usuario</li>
                    <li>Perfil de usuario</li>
                    <li>Historial de compras</li>
                    <li>Historial de ventas</li>
                </ul>
            </p>

            <form method="post" action="<?php echo base_url('/cerrar_sesion') ?>">
                <button type="submit" class="btn btn">Cerra Sesion</button>
            </form>
        </div>
    </div>
</section>