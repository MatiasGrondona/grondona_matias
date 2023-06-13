<?php if(session()->perfil_id == 1){?>
<section class="pt-3">
    <div class="card">
        <div class="card-body">
            <div class="card-title text-center pt-3 pb-3"><h1>Accesos rapidos a Vistas en Proceso</h1></div>
            <p>
                Faltan las vistas de:
                <ul>
                    <li>
                        Ver Producto ya funciona falta terminar de diseñar las vistas.
                    </li>
                    <li>
                        Ver mensaje ya funciona falta terminar de diseñar las vistas.
                    </li>
                    <li>
                        <p>
                            <a href="<?php echo base_url('vistaAgregarProducto');?>">Nuevo Producto</a> 
                            tengo que revisar si tiene errores pero creo que funciona
                        </p>
                    </li>
                    <li>
                        <p>
                            <a href="#">Editar Info Usuario</a>
                            Ya funciona pero tengo que revisar los errores.
                        </p>
                    </li>
                    <li>
                        <p>
                            <a href="#">Editar Info Producto</a>
                            Funciona parcialmente, tengo que implementar la parte de las imagenes y ver los errores.
                        </p>
                    </li>
                    <li>
                        <a href="#">Carrito</a>
                    </li>
                    <li>
                        <a href="#">Compras Usuario</a>
                    </li>
                    <li>
                        <a href="#">Detalle Compra Usuario</a>
                    </li>
                    <li>
                        <a href="#">Ventas Admin</a>
                    </li>
                </ul>
            </p>
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