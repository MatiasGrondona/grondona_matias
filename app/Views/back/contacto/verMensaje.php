<section class="p-3">
    <div class="container py-3">
        <div class="row">
            <div class="card text-justify">
                <div class="card-body">
                    <div class="card-title text-center py-2">
                        <h1>Remitente: <?php echo $mensaje['nombre'];  ?></h1>
                    </div>
                    <p>Email:</p>
                    <h3><?php echo $mensaje['email'];  ?></h3>
                    <h5 class="pt-5">Mensaje:</h5>
                    <p class="pb-3">
                        <?php echo $mensaje['mensaje'];  ?>
                    </p>
                    <?php if($mensaje['leído'] == 'SI'){?>
                    <a href="<?php echo base_url('mensajeNoLeido/'.$mensaje['id']);?>" class="btn btn-warning">Marcar NO
                        Leído</a>
                    <?php } else if($mensaje['leído'] == 'NO') {?>
                    <a href="<?php echo base_url('leerMensaje/'.$mensaje['id']);?>" class="btn btn-warning">Marcar
                        Leído</a>
                    <?php  }?>

                </div>
            </div>
        </div>
    </div>
</section>