<!--------------------- Info Sesión ----------------------->
<?php
    $session = session();
    $perfil_id = $session->get('perfil_id');
?>

<?php if(session()->perfil_id == 1){?>
<section>
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h1>Detalle de la venta</h1>
                </div>
                <?php if(!$venta) { ?>
                <p class="text-center py-1">No hay ventas Cargadas</p>
                <?php } else { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id Producto</th>
                            <th scope="col">Nombre producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Unidad</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($venta as $row){ ?>
                        <tr>
                            <td><?php echo $row->id_producto;  ?></td>
                            <td><?php echo $row->nombre_prod;  ?></td>
                            <td><?php echo $row->cantidad;  ?></td>
                            <td><?php echo $row->precio;  ?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <?php }?>
                </div>
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