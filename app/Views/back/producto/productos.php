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
        <img src="<?=base_url()?>/assets/upload/<?php echo $row->imagen;  ?>" class="card-img-top productImg"
            alt="...">
        <div class="card-body">
            <h4 class="card-title"><?php echo $row->nombre_prod;  ?></h4>
            <p class="card-text text-center"><?php echo $row->descripcion;  ?></p>
            <h5>Tamaño: <?php echo $row->size;  ?></h5>
            <h5 class="card-text"><?php echo $row->precio_venta;  ?></h5>
            <p>Stock: <?php echo $row->stock;  ?></p>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Más</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>
    <?php }?>
    <?php }?>

    <!-- Ultima tarjeta de diseño original despues elimino -->
    <!--
    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/fotos/carousel5.jpeg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h4 class="card-title">Abrigo Fucsia</h4>
            <p class="card-text text-center">Abrigo con capucha de color fucsia y rosado a rayas tamaño medio.</p>
            <h5 class="card-text">$ 800</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Más</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>
    -->
</div>