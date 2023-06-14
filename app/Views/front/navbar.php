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
                    <a class="nav-link" href="<?php echo base_url('ver_ventas_admin');?>">Ventas</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url('adminUsuarios');?>">Usuarios</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url('administrarMensajes');?>">Consultas</a>
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
                <li>
                    <a class="nav-link" href="<?php echo base_url('muestro');?>">
                        <img src="<?php echo base_url("assets/img/icons/shopping_cart.svg");?>" alt="logo" width="25" height="25">
                        Carrito
                    </a>
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
                <p>Email</p>
                <h3><?php echo($session->get('email'));?></h3>
                <p class="pt-4">Nombre de Usuario</p>
                <h3><?php echo($session->get('usuario'));?></h3>
            </div>
            <div class="modal-footer">
                <a class="btn btn-info" href="<?php echo base_url('ver_compras_cliente/'.$session->get('id_usuario'));?>">Ver Compras</a>
                <a class="btn btn-secondary" href="<?php echo base_url('editarUsuario/'.$session->get('id_usuario'));?>">Modificar Datos</a>
                <form method="post" action="<?php echo base_url('/cerrar_sesion') ?>">
                    <button type="submit" class="btn btn-danger">Cerra Sesion</button>
                </form>
            </div>
        </div>
    </div>
</div>