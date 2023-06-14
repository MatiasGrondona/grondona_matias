<div>
    <!--recuperamos datos con la función Flashdata para mostrarlos-->
    <?php if (session()->getFlashdata('success')) {
      echo "
      <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('success') . "
  </div>";
    } ?>
</div>
<!-- php $validación = \Config\Services::validación(); Esto carga automáticamente el archivo Config\Validation que contiene configuraciones para incluir múltiples conjuntos de reglas -->
<?php $validation = \Config\Services::validation(); ?>

<!-- Formulario para Busqueda de productos -->
<section class="p-4">
    <form class="d-flex roundSearch col-lg-6 col-sm-12" role="search">
        <input class="form-control me-2 roundSearch" type="search" placeholder="Buscar Productos" aria-label="Search">
        <button class="btn btn-primary" type="submit">Buscar</button>
    </form>
</section>

<!-- Listado de Productos - por el momento es completamente estatico -->
<!--
    /* 
    TODO Falta agregar un foreach para que se repita el codigo de cada producto
    */
-->
<div class="row d-flex justify-content-center" id="listaProductos">
<?php if(!$productos) { ?>
    <p>No hay productos Cargados</p>
<?php } else { ?>
    <?php foreach($productos as $row){ ?>


    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="<?=base_url()?>/assets/upload/<?php echo $row->imagen;  ?>" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h2 class="card-title"><?php echo $row->nombre_prod;  ?></h2>
            <p class="text-center">Tamaño: <?php echo $row->size;  ?></p>
            <h3 class="card-text"><strong>$<?php echo $row->precio_venta;  ?></strong></h3>
            <a href="<?php echo base_url('verProducto/'.$row->id_producto);?>"
                class="btn btn-outline-secondary  gap-2 m-2">Ver Producto</a>
            <?php
            echo form_open('carrito_agrega');
                echo form_hidden('id_producto', $row->id_producto);
                echo form_hidden('precio_venta', $row->precio_venta);
                echo form_hidden('nombre_prod', $row->nombre_prod);
            ?>
            <div>
                <?php
                $btn = array('class' => 'btn btn-primary', 'value' => 'agregar al carrito', 'name' => 'action');
                echo form_submit($btn);
                echo form_close();
                ?>
            </div>
        </div>
    </div>
    <?php }?>
<?php }?>
</div>