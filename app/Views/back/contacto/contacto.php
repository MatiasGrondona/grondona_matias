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

<div class="container py-3">
    <div class="row">
        <div class="col-12 col-lg-6 py-1" id="card-formulario">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h1>Contáctanos!</h1>
                    </div>
                    <form method="post" action="<?php echo base_url('/enviarMensaje') ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                            <input class="form-control" 
                                type="text"
                                name="nombre"
                                value="<?php echo set_value('nombre')?>"
                                placeholder="Ingrese su Nombre y Apellido por favor!"
                                aria-label="default input example">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Correo Electrónico:</label>
                            <input class="form-control" id="exampleFormControlInput1"
                                type="email"
                                name="email"
                                value="<?php echo set_value('email')?>"
                                placeholder="nombre@ejemplo.com">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">¡Escriba su consulta!</label>
                            <textarea class="form-control px-3" id="exampleFormControlTextarea1" rows="3"
                                type="text"
                                name="mensaje"
                                value="<?php echo set_value('mensaje')?>"
                                height="100%" placeholder="1000 caracteres de limite."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar!</button>
                        <button type="reset" href="" class="btn btn-secondary">limpiar</button>
                    </form>
                    <div class="card carta-aviso mt-3">
                        <div class="card-body">
                            <div class="card-title">
                                <h3>Información de Contacto</h3>
                            </div>
                            <figure>
                                <figcaption class="blockquote-header">
                                    Dirección:
                                </figcaption>
                                <blockquote class="blockquote">
                                    <p>9 de Julio 1449 Corrientes Capital.</p>
                                </blockquote>
                            </figure>
                            <figure>
                                <figcaption class="blockquote-header">
                                    Teléfono:
                                </figcaption>
                                <blockquote class="blockquote">
                                    <p>+54 (379) 499999</p>
                                </blockquote>
                            </figure>
                            <figure>
                                <figcaption class="blockquote-header">
                                    Titular de la Empresa:
                                </figcaption>
                                <blockquote class="blockquote">
                                    <p>Matias Grondona.</p>
                                </blockquote>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 py-1" id="card-mapa">
            <div class="card card-mapa">
                <div class="card-body">
                    <div class="card-title">
                        <h1>Ubicación!</h1>
                    </div>
                    <iframe id="mapa"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221.25503356782096!2d-58.83229269867417!3d-27.466751950553117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d24ec0c9%3A0xb92ce3fedb0d7729!2sFacultad%20de%20Ciencias%20Exactas%20y%20Naturales%20y%20Agrimensura!5e0!3m2!1ses-419!2sar!4v1682101186569!5m2!1ses-419!2sar"
                        width="100%" height="635px" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"
                        aria-hidden="false" tabindex="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- height="full" -->