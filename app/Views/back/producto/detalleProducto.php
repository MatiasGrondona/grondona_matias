<section>
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img src="<?=base_url()?>/assets/upload/<?php echo $producto['imagen'];  ?>"
                        class="card-img img-fluid">
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card-body">
                        <p class="titulo"><?php echo $producto['nombre_prod'];  ?></p>
                        <p class="sub_titulo">Tamaño: <?php echo $producto['size'];  ?></p>
                        <p class="texto">Descripcion: <?php echo $producto['descripcion'];  ?></p>
                        <p class="sub_titulo">Stock: <?php echo $producto['stock'];  ?></p>
                        <p class="precio">Precio: $<?php echo $producto['precio_venta'];  ?></p>
                        <?php if(session()->logged_in && session()->perfil_id == 2){?>
                        <?php
                            echo form_open('carrito_agrega');
                            echo form_hidden('id_producto', $producto['id_producto']);
                            echo form_hidden('precio_venta', $producto['precio_venta']);
                            echo form_hidden('nombre_prod', $producto['nombre_prod']);
                        ?>
                        <div>
                            <?php
                            $btn = array('class' => 'btn btn-primary btn-lg', 'value' => 'Agregar al Carrito', 'name' => 'action');
                            echo form_submit($btn);
                            echo form_close();
                            ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>