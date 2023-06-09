<!--------------------- NAVBAR ----------------------->
<?php
    $session = session();
    $perfil_id = $session->get('perfil_id');
?>

<nav class="navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url('home');?>">
            <img src="<?php echo base_url("assets/img/icons/dog_face_color.svg");?>" alt="logo" width="50" height="50">
            <img src="<?php echo base_url("assets/img/icons/Petfun.png");?>" alt="PetFun Store">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--            MENU PARA ADMINISTRADOR-->
        <?php if(session()->perfil_id == 1){?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li>
                    <a class="nav-link" href="<?php echo base_url('panelControl');?>">Panel de Control</a>    
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Productos
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="<?php echo base_url('vistaAgregarProducto');?>">Cargar Producto</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo base_url('adminProductos');?>">Listado de productos</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo base_url('ofertasAdmin');?>">Listado de Ofertas</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url('adminUsuarios');?>">Usuarios</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url('administrarMensajes');?>">Consultas</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url('inProgressViews');?>">Vistas en proceso</a>
                </li>
            </ul>
        </div>
        <!--            MENU PARA CLIENTES-->
        <?php } else if(session()->perfil_id == 2) {?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('productos');?>">Productos</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url('comercializacion');?>">Comercialización</a>
                </li>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ver Perfil
                </button>
            </ul>
        </div>
        <?php  } else {?>
        <!--            MENU PARA PUBLICO EN GENERAL-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('productos');?>">Productos</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url('comercializacion');?>">Comercialización</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('login');?>">Iniciar Sesión</a>
                </li>
            </ul>
        </div>
        <?php }?>
    </div>
</nav>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">
                    <?php echo($session->get('nombre')." ". $session->get('apellido'));?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Email</h3>
                <p><?php echo($session->get('email'));?></p>
                <h3>Nombre de Usuario</h3>
                <p><?php echo($session->get('usuario'));?></p>
                <h3>Telefono</h3>
                <p>agregar campo numero tel a la base de datos</p>
                <h3>Dirección</h3>
                <p>Agregar campo o tabla dirreccion a la base de datos.</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="<?php echo base_url('/cerrar_sesion') ?>">
                    <button type="submit" class="btn btn-danger">Cerra Sesion</button>
                </form>
                <button type="button" class="btn btn-secondary">Modificar Datos</button>
            </div>
        </div>
    </div>
</div>