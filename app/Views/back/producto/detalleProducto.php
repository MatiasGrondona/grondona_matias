<div class="container py-3">
    <div class="card cardDetalleProducto">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <img src="<?=base_url()?>/assets/upload/<?php echo $producto['imagen'];  ?>" alt="">
                </div>
                <div class="col">
                    <h1><strong><?php echo $producto['nombre_prod'];  ?></strong></h1>
                    <p>Tamaño: <?php echo $producto['size'];  ?></p>
                    <p>descripcion: <?php echo $producto['descripcion'];  ?></p>
                    <p>Stock: <?php echo $producto['stock'];  ?></p>
                    <h2>Precio: $<?php echo $producto['precio_venta'];  ?></h2>
                    <?php
                        echo form_open('carrito_agrega');
                            echo form_hidden('id_producto', $producto['id_producto']);
                            echo form_hidden('precio_venta', $producto['precio_venta']);
                            echo form_hidden('nombre_prod', $producto['nombre_prod']);
                    ?>
                    <div>
                        <?php
                            $btn = array('class' => 'btn btn-primary', 'value' => 'Agregar al Carrito', 'name' => 'action');
                            echo form_submit($btn);
                            echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>