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
    */
-->
<div class="row d-flex justify-content-center" id="listaProductos">

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/fotos/carousel1.jpeg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h4 class="card-title">Abrigo Gris</h4>
            <p class="card-text text-center">Abrigo con capucha de color gris oscuro y celeste tamaño grande.</p>
            <h5 class="card-text">$800</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Más</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/fotos/carousel2.jpeg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h4 class="card-title">Abrigo Beige</h4>
            <p class="card-text text-center">
                Abrigo con botones simple de color beige tamaño pequeño.
            </p>
            <h5 class="card-text">$ 700</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Más</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/fotos/carousel3.jpeg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h4 class="card-title">Abrigo Rosa</h4>
            <p class="card-text text-center">Abrigo con capucha de color rosado y a rayas tamaño medio.</p>
            <h5 class="card-text">$ 750</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Más</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/fotos/carousel4.jpeg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h4 class="card-title">Combo Especial</h4>
            <p class="card-text text-center">Abrigo con capucha de color gris y turquesa tamaño medio más body celeste a rayas.</p>
            <h5 class="card-text">$ 1050</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Más</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/fotos/carousel1.jpeg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h4 class="card-title">Abrigo Gris</h4>
            <p class="card-text text-center">Abrigo con capucha de color gris oscuro y celeste tamaño medio.</p>
            <h5 class="card-text">$ 800</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Más</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

    <div class="card productCard text-center col-lg-3 col-md-6 col-sm-12">
        <img src="assets/img/fotos/carousel5.jpeg" class="card-img-top productImg" alt="...">
        <div class="card-body">
            <h4 class="card-title">Abrigo Fucsia</h4>
            <p class="card-text text-center">Abrigo con capucha de color fucsia y rosado a rayas tamaño medio.</p>
            <h5 class="card-text">$ 800</h5>
            <a href="#" class="btn btn-outline-secondary d-grid gap-2 m-2">Ver Más</a>
            <a href="#" class="btn btn-primary d-grid gap-2 m-2">Agregar al Carrito</a>
        </div>
    </div>

</div>

<!-- Paginacion de Productos -->
<!--
<nav aria-label="Page navigation example" class="d-flex justify-content-center">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
-->