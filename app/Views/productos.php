<!-- Formulario para Busqueda de productos -->
<form class="d-flex roundSearch col-lg-6 sm-12" role="search">
    <input class="form-control me-2 roundSearch" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-primary" type="submit">Search</button>
</form>

<!-- Listado de Productos - por el momento es completamente estatico -->
<div class="row" id="listaProductos">

    <div class="card col-xl-2 lg-4 sm-12 productCard text-center">
        <img src="assets/img/productos/face_with_symbols_on_mouth_color.svg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nombre del Producto</h5>
            <p class="card-text">Descripcion Basica del Producto</p>
            <a href="#" class="btn btn-primary d-grid gap-2">Ver Mas</a>
        </div>
    </div>

    <div class="card col-xl-2 lg-4 sm-12 productCard text-center">
        <img src="assets/img/productos/smiling_face_with_hearts_color.svg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nombre del Producto</h5>
            <p class="card-text">Descripcion Basica del Producto</p>
            <a href="#" class="btn btn-primary d-grid gap-2">Ver Mas</a>
        </div>
    </div>

    <div class="card col-xl-2 lg-4 sm-12 productCard text-center">
        <img src="assets/img/productos/woozy_face_color.svg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nombre del Producto</h5>
            <p class="card-text">Descripcion Basica del Producto</p>
            <a href="#" class="btn btn-primary d-grid gap-2">Ver Mas</a>
        </div>
    </div>

    <div class="card col-xl-2 lg-4 sm-12 productCard text-center">
        <img src="assets/img/productos/zany_face_color.svg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nombre del Producto</h5>
            <p class="card-text">Descripcion Basica del Producto</p>
            <a href="#" class="btn btn-primary d-grid gap-2">Ver Mas</a>
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