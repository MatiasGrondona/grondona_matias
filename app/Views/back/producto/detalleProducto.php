<div class="container py-3">
    <div class="card cardDetalleProducto">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <img src="<?=base_url()?>/assets/upload/<?php echo $producto['imagen'];  ?>" alt="">
                </div>
                <div class="col">
                    <h1>nombre: <?php echo $producto['nombre_prod'];  ?></h1>
                    <p>Tamaño: <?php echo $producto['size'];  ?></p>
                    <p>descripcion: <?php echo $producto['descripcion'];  ?></p>
                    <h2>precio venta: <?php echo $producto['precio_venta'];  ?></h2>
                    <p>Stock: <?php echo $producto['stock'];  ?></p>
                </div>
            </div>
            <button class="btn btn-primary">Agregar al Carrito</button>

        </div>
    </div>
</div>