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
<?php if(session()->perfil_id == 1){?>
<section class="p-3">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center pt-3 pb-1">
                    <h1>Agregar Oferta al Producto</h1>
                </div>
                <div class="card">
                    <div class="card-body">
                        <img height="50px" whidth="50px" src="<?=base_url()?>/assets/upload/<?php echo $producto['imagen'];  ?>" alt="">
                        <h3><strong><?php echo $producto['nombre_prod'];  ?></strong></h3>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url('/nueva_oferta_save') ?>" enctype="multipart/form-data">
                    <!-- manda de manera oculta el id del producto -->
                    <?php echo form_hidden("id_producto", $producto['id_producto']);?>
                    <!-- porcentaje de descuento del Producto -->
                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Porcentaje de Descuento</h5>
                    </label>
                    <input class="form-control" type="text" name="descuento"
                        value="<?php echo set_value('descuento')?>" placeholder="porcentaje de descuento (solo numero)"
                        aria-label="default input example">
                    <!-- ERROR -->
                    <?php if($validation->getError('descuento')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('descuento'); ?>
                    </div>
                    <?php }?>

                    <!-- Nuevo precio del producto en oferta -->
                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Precio de venta del producto en oferta</h5>
                    </label>
                    <input class="form-control" type="text" name="precio_oferta"
                        value="<?php echo set_value('precio_oferta')?>" placeholder="Precio del produto en oferta"
                        aria-label="default input example">
                    <!-- ERROR -->
                    <?php if($validation->getError('precio_oferta')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('precio_oferta'); ?>
                    </div>
                    <?php }?>

                    <!-- Botones de enviar Formulario -->
                    <div class="pt-3">
                        <button type="submit" class="btn btn-primary">Cargar Oferta</button>
                        <button type="reset" class="btn btn-danger">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php } else {?>
<section>
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h1>Tu usuario no tiene los permisos necesarios para acceder a esta pagina</h1></div>
            </div>
        </div>
    </div>
</section>
<?php }?>