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
                <div class="card-title text-center pt-3 pb-3">
                    <h1>Listado de Ofertas</h1>
                </div>
                <div>
                    <a href="<?php echo base_url('ofertasAdminBaja');?>" class="btn btn-info">Ver Ofertas de Baja</a>
                </div>
                <?php if(!$ofertas) { ?>
                <p class="text-center py-1">No hay productos Cargados</p>
                <?php } else { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id oferta</th>
                            <th scope="col">Nombre Producto</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Precio Venta</th>
                            <th scope="col">Precio Oferta</th>
                            <th scope="col">BAJA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($ofertas as $row){ ?>
                        <tr>
                            <td><?php echo $row->id_oferta;  ?></td>
                            <td><?php echo $row->nombre_prod;  ?></td>
                            <td><?php echo $row->descuento;  ?>%</td>
                            <td><?php echo $row->precio_venta;  ?></td>
                            <td><?php echo $row->precio_oferta;  ?></td>
                            <td>
                                <a href="<?php echo base_url('dar_baja_oferta/'.$row->id_oferta);?>" class="btn btn-danger">Eliminar Oferta</a>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <?php }?>
            </div>
        </div>
    </div>
</section>
<?php } else {?>
<section>
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h1>Tu usuario no tiene los permisos necesarios para acceder a esta pagina</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }?>