<!--------------------- Info Sesión ----------------------->
<?php
    $session = session();
    $perfil_id = $session->get('perfil_id');
?>

<section>
    <div class="container py-3">
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
                        <ul>
                            <li>
                                <a href="#">Generar reporte de productos</a>
                            </li>
                            <li>
                                <a href="#">Generar reporte de ventas</a>
                            </li>
                            <li>
                                <a href="#">Otro</a>
                            </li>
                            <li>
                                <a href="#">Otro</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>