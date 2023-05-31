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
                <div class="card-title text-center pt-3 pb-3">
                    <h1>Listado de Productos dados de BAJA</h1>
                </div>
                <div>
                    <a href="<?php echo base_url('/adminProductos') ?>" class="btn btn-info">Productos</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Tamaño</th>
                            <th scope="col">Precio Costo</th>
                            <th scope="col">Precio Venta</th>
                            <th scope="col">Stock Minimo</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Dar de Baja/Alta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!$productos) { ?>
                            <p>No hay productos Cargados</p>
                        <?php } else { ?>
                            <?php foreach($productos as $row){ ?>
                                <tr>
                                    <td><?php echo $row['id'];  ?></td>
                                    <td><?php echo $row['nombre_prod'];  ?></td>
                                    <td><?php echo $row['descripcion'];  ?></td>
                                    <td><?php echo $row['size'];  ?></td>
                                    <td><?php echo $row['precio_costo'];  ?></td>
                                    <td><?php echo $row['precio_venta'];  ?></td>
                                    <td><?php echo $row['stock_min'];  ?></td>
                                    <td><?php echo $row['stock'];  ?></td>
                                    <td><img height="50px" whidth="50px" src="<?=base_url()?>/assets/upload/<?php echo $row['imagen'];  ?>" alt=""></td>
                                    <td>
                                        <a href="<?php echo base_url('editarProducto/');?>" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('eliminarProducto/');?>" class="btn btn-danger">Dar de ALTA</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>