<div>
    <!--recuperamos datos con la función Flashdata para mostrarlos-->
    <?php if (session()->getFlashdata('success')) {
      echo "
      <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-danger alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('success') . "
  </div>";
    } ?>
</div>
<!-- php $validación = \Config\Services::validación(); Esto carga automáticamente el archivo Config\Validation que contiene configuraciones para incluir múltiples conjuntos de reglas -->
<?php $validation = \Config\Services::validation(); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Nuevo Usuario</h1>
            <form method="post" action="<?php echo base_url('/editarUsuarioForm') ?>">
                <!-- Manda de manera oculta el id del usuario -->
                <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">
                <!-- NOMBRE -->
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= $usuario['nombre'] ?>">
                <!-- Error -->
                <?php if ($validation->getError('nombre')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('nombre'); ?>
                    </div>
                <?php } ?>
                <!-- APELLIDO -->
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?= $usuario['apellido'] ?>">
                <!-- Error -->
                <?php if ($validation->getError('apellido')) { ?>
                <div class='alert alert-danger mt-2'>
                    <?= $error = $validation->getError('apellido'); ?>
                </div>
                <?php } ?>
                <!-- EMAIL -->
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" value="<?= $usuario['email'] ?>">
                <!-- Error -->
                <?php if ($validation->getError('email')) { ?>
                <div class='alert alert-danger mt-2'>
                    <?= $error = $validation->getError('email'); ?>
                </div>
                <?php } ?>
                <!-- USUARIO -->
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" value="<?= $usuario['usuario'] ?>" class="form-control">
                <!-- Error -->
                <?php if ($validation->getError('usuario')) { ?>
                <div class='alert alert-danger mt-2'>
                    <?= $error = $validation->getError('usuario'); ?>
                </div>
                <?php } ?>
                <button type="submit" class="btn btn-primary">Cambiar Datos</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </form>
        </div>
    </div>
</div>