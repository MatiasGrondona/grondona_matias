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

<div class="container py-3 d-flex justify-content-center">
    <div class="card col-12 col-lg-8">
        <div class="card-body">
            <h1 class="card-title text-center">
                Iniciar Sesión
            </h1>
            <form method="post" action="<?php echo base_url('/enviar_login') ?>">
                <div class="mb-3">
                    <!-- EMAIL -->
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" value="<?php echo set_value('email')?>"
                        placeholder="correo@algo.com">
                    <!-- Error -->
                    <?php if ($validation->getError('email')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('email'); ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <!-- PASSWORD -->
                <label for="pass" class="form-label">Contraseña</label>
                <input name="pass" type="password" class="form-control" placeholder="Contraseña (mínimo 5 caracteres)">
                <!-- Error -->
                <?php if ($validation->getError('pass')) { ?>
                <div class='alert alert-danger mt-2'>
                    <?= $error = $validation->getError('pass'); ?>
                </div>
                <?php } ?>
                </div>
<!--
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Recuérdame</label>
                </div>
                -->
                <button type="submit" class="btn btn-primary">Entrar</button>
                <button type="reset" class="btn btn-secondary">Cancelar</button>
            </form>
            <h5 class="pt-3 text-center">
                No tienes cuenta? <a href="nuevoUsuario">Registrate</a>
            </h5>
        </div>
    </div>
</div>