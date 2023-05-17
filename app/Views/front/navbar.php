<!--------------------- NAVBAR ----------------------->
<?php
    $session = session();
    $nombre = $session->get('nombre');
    $perfil_id = $session->get('perfil_id');
?>

<nav class="navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url('home');?>">
            <img src="assets/img/icons/dog_face_color.svg" alt="logo" width="50" height="50">
            <img src="assets/img/icons/Petfun.png" alt="PetFun Store">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--            MENU PARA ADMINISTRADOR-->
        <?php if(session()->perfil_id == 1){?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Productos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url('administrarProductos');?>">Ver listado de productos</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('nuevoProducto');?>">Cargar Producto</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Listado de Usuarios</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
          </ul>
        </li>
        <li>
                    <a class="nav-link" href="#">Consultas</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('login');?>">Cambiar por perfil de usario</a>
                </li>
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