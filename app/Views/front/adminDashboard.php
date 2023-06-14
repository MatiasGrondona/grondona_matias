<!--------------------- Info Sesión ----------------------->
<?php
    $session = session();
    $perfil_id = $session->get('perfil_id');
?>

<?php if(session()->perfil_id == 1){?>
<section class="py-3 px-5">

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h1>Panel de Control</h1>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <p>Nombre y Apellido</p>
                            <h3><?php echo($session->get('nombre')." ". $session->get('apellido'));?></h3>
                            <p>Email</p>
                            <h3><?php echo($session->get('email'));?></h3>
                            <p>Nombre de Usuario</p>
                            <h3><?php echo($session->get('usuario'));?></h3>
                            <form method="post" class="container-fluid justify-content-start"
                                action="<?php echo base_url('/cerrar_sesion') ?>">
                                <button type="submit" class="btn btn-outline-danger me-2">Cerrar Sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3><strong>Productos</strong></h3>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a type="button" class="btn btn-primary" href="<?php echo base_url('vistaAgregarProducto');?>">Cargar Producto</a>
                        <a type="button" class="btn btn-primary" href="<?php echo base_url('adminProductos');?>">Listado de productos</a>
                        <a type="button" class="btn btn-primary" href="<?php echo base_url('ofertasAdmin');?>">Listado de Ofertas</a>
                    </div>
                    <a class="btn btn-primary" href="<?php echo base_url('ver_ventas_admin');?>">Ventas</a>
                    <a class="btn btn-primary" href="<?php echo base_url('adminUsuarios');?>">Usuarios</a>
                    <a class="btn btn-primary" href="<?php echo base_url('administrarMensajes');?>">Consultas</a>
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
                <div class="card-title">
                    <h1>Tu usuario no tiene los permisos necesarios para acceder a esta pagina</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }?>