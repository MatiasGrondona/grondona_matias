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
                    <h1>Listado de Usuarios dados de BAJA</h1>
                </div>
                <div>
                    <a href="<?php echo base_url('/adminUsuarios') ?>" class="btn btn-success">
                        Usuarios Activos
                    </a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">BAJA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!$usuarios) { ?>
                            <p>No hay mensajes Cargados</p>
                        <?php } else { ?>
                            <?php foreach($usuarios as $row){ ?>
                                <tr>
                                    <td><?php echo $row['id'];  ?></td>
                                    <td><?php echo $row['nombre'];  ?></td>
                                    <td><?php echo $row['apellido'];  ?></td>
                                    <td><?php echo $row['email'];  ?></td>
                                    <td><?php echo $row['usuario'];  ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success">ALTA</a>
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