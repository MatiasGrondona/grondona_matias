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

<section class="p-3">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center pt-3 pb-1">
                    <h1>Agregar Producto</h1>
                </div>
                <form method="post" action="<?php echo base_url('/agregarProducto') ?>" enctype="multipart/form-data">
                    <!-- NOMBRE del Producto -->
                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Nombre del Producto</h5>
                    </label>
                    <input class="form-control" type="text" name="nombre_prod"
                        value="<?php echo set_value('nombre_prod')?>" placeholder="Nombre del Producto"
                        aria-label="default input example">
                    <!-- ERROR -->
                    <?php if($validation->getError('nombre_prod')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('nombre_prod'); ?>
                    </div>
                    <?php }?>

                    <!-- descripcion de producto -->
                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Descripción</h5>
                    </label>
                    <input class="form-control" type="text" name="descripcion"
                        value="<?php echo set_value('descripcion')?>" placeholder="Descripción del Producto"
                        aria-label="default input example">
                    <!-- Error -->
                    <?php if ($validation->getError('descripcion')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('descripcion'); ?>
                    </div>
                    <?php } ?>

                    <!-- tamaño del producto -->
                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Seleccione el Tamaño del producto</h5>
                    </label>
                    <select class="form-select" type="number" name="size" aria-label="Default select example">
                        <option value="">Seleccione el tamaño.</option>
                        <?php foreach($tamaño as $row){ ?>
                        <option value="<?php echo $row['id_tamaño']?>">
                            <?php echo $row['size']?>
                        </option>
                        <?php if ($validation->getError('size')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('size'); ?>
                        </div>
                        <?php } ?>
                        <?php }?>
                    </select>

                    <!-- Precio de Costo del Producto -->
                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Precio de Costo</h5>
                    </label>
                    <input class="form-control" type="number" name="precio_costo"
                        value="<?php echo set_value('precio_costo')?>" placeholder="Precio de Costo del Producto"
                        aria-label="default input example">
                    <!-- Error -->
                    <?php if ($validation->getError('precio_costo')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('precio_costo'); ?>
                    </div>
                    <?php } ?>

                    <!-- Precio de Ventan del producto -->
                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Precio de Venta</h5>
                    </label>
                    <input class="form-control" type="number" name="precio_venta"
                        value="<?php echo set_value('precio_venta')?>" placeholder="Precio de Venta del Producto"
                        aria-label="default input example">
                    <!-- Error -->
                    <?php if ($validation->getError('precio_venta')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('precio_venta'); ?>
                    </div>
                    <?php } ?>

                    <!-- Stock Minimo -->
                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Stock Minimo</h5>
                    </label>
                    <input class="form-control" type="number" name="stock_min"
                        value="<?php echo set_value('stock_min')?>" placeholder="Stock Minimo"
                        aria-label="default input example">
                    <!-- Error -->
                    <?php if ($validation->getError('stock_min')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('stock_min'); ?>
                    </div>
                    <?php } ?>

                    <!-- Stock -->
                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Stock</h5>
                    </label>
                    <input class="form-control" type="number" name="stock" value="<?php echo set_value('stock')?>"
                        placeholder="Stock Actual del Producto" aria-label="default input example">
                    <!-- Error -->
                    <?php if ($validation->getError('stock')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('stock'); ?>
                    </div>
                    <?php } ?>


                    <!-- Foto del producto -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label margenTituloForm">Imagen de Producto</label>
                        <input class="form-control" id="formFile" name="imagen" type="file"
                            value="<?php echo set_value('precio_venta')?>">
                    </div>
                    <!-- Error -->
                    <?php if ($validation->getError('imagen')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('imagen'); ?>
                    </div>
                    <?php } ?>
                    <!-- Botones de enviar Formulario -->
                    <div class="pt-3">
                        <button type="submit" class="btn btn-primary">Cargar Producto</button>
                        <button type="reset" class="btn btn-danger">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>