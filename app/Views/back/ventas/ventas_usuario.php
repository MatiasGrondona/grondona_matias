<!--------------------- Info Sesión ----------------------->
<?php
    $session = session();
    $perfil_id = $session->get('perfil_id');
?>

<?php if(session()->perfil_id == 2){?>
<section>
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h1>Compras Realizadas</h1>
                </div>
                <?php if(!$compras) { ?>
                <p class="text-center py-1">No realizaste ninguna compra todavia</p>
                <?php } else { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id venta</th>
                            <th scope="col">Email Usuario</th>
                            <th scope="col">Total venta</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Ver Detalle</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($compras as $row){ ?>
                        <tr>
                            <td><?php echo $row->id;  ?></td>
                            <td><?php echo $row->email;  ?></td>
                            <td><?php echo $row->total_venta;  ?></td>
                            <td><?php echo $row->fecha;  ?></td>
                            <td>
                                <a href="<?php echo base_url('ver_detalle_compra_cliente/'.$row->id);?>"
                                    class="btn btn-info">Ver detalle</a>
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
                <div class="card-title"><h1>Tu usuario no tiene los permisos necesarios para acceder a esta pagina</h1></div>
            </div>
        </div>
    </div>
</section>
<?php }?>