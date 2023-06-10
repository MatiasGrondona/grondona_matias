<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                Productos en tu Carrito
            </div>
            <?php
            $session = session();
            $cart = \Config\Services::cart();
            $cart = $cart->contents();
            if(empty($cart)){
                echo 'Para agregar productos al carrito haga click en "Comprar"';
            }
            ?>
            <table class="table table-striped">
            <?php if ($cart == TRUE): ?>
                <tr class="table-active">
                    <td>ID</td>
                    <td>Nombre Producto</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Total</td>
                    <td>Cancelar Producto</td>
                </tr>
            
            </table>
        </div>
    </div>
</div>
