<!-- Formulario para Busqueda de productos -->
<section class="p-4">
    <form class="d-flex roundSearch col-lg-6 col-sm-12" role="search">
        <input class="form-control me-2 roundSearch" type="search" placeholder="Buscar Productos" aria-label="Search">
        <button class="btn btn-primary" type="submit">Buscar</button>
    </form>
</section>

<!-- Listado de Productos - por el momento es completamente estatico -->
<!--
    /* 
    TODO Falta agregar un foreach para que se repita el codigo de cada producto
    TODO falta agregar el precio del producto
    TODO falta agregar el boton de agregar al carrito
    */
-->
<div class="row d-flex justify-content-center" id="listaProductos">

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/productos/face_with_symbols_on_mouth_color.svg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nombre del Producto</h5>
            <p class="card-text">Descripcion Basica del Producto</p>
            <h5 class="card-text">$ 1000</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Mas</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/productos/smiling_face_with_hearts_color.svg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nombre del Producto</h5>
            <p class="card-text">Descripcion Basica del Producto</p>
            <h5 class="card-text">$ 1000</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Mas</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/productos/woozy_face_color.svg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nombre del Producto</h5>
            <p class="card-text">Descripcion Basica del Producto</p>
            <h5 class="card-text">$ 1000</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Mas</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/productos/zany_face_color.svg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h4 class="card-title">Nombre del Producto</h4>
            <p class="card-text">Descripcion Basica del Producto</p>
            <h5 class="card-text">$ 1000</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Mas</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/productos/zany_face_color.svg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h4 class="card-title">Nombre del Producto</h4>
            <p class="card-text">Descripcion Basica del Producto</p>
            <h5 class="card-text">$ 1000</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Mas</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/productos/zany_face_color.svg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h4 class="card-title">Nombre del Producto</h4>
            <p class="card-text">Descripcion Basica del Producto</p>
            <h5 class="card-text">$ 1000</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Mas</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

</div>

<!-- Paginacion de Productos -->
<nav aria-label="Page navigation example" class="d-flex justify-content-center">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>