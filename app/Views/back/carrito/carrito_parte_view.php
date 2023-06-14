<section class="p-3">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid" id="carrito">
                    <div class="cart">
                        <div class="heading">
                            <h2 id="h3" align="center">Productos de tu carrito</h2>
                        </div>
                        <div class="text" align="center">
                            <?php 
                $session=session();
                $cart = \Config\Services::cart();
                $cart = $cart->contents();
                if(empty($cart)){
                    echo 'para agregar al carrito haga click en comprar.';
                }
            ?>
                        </div>
                    </div>
                    <table class="table table-hover table-dark table-responsive-md" border="0" cellpaddin="5px"
                        cellspacing="1px">
                        <?php
        if($cart == TRUE): ?>
                        <div class="container">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered table-hover table-dark table-striped ml-3">
                                    <tr>
                                        <th>ID</th>
                                        <td>nombre_prod</td>
                                        <td>precio</td>
                                        <td>cantidad</td>
                                        <td>total</td>
                                        <td>Cancelar Producto</td>
                                    </tr>

                                    <?php echo form_open('carrito_actualiza');
                            $gran_total = 0;
                            $i = 0;

                            foreach ($cart as $item):
                                echo form_hidden('cart['.$item['id'].'][id]',$item['id']);
                                echo form_hidden('cart['.$item['id'].'][rowid]',$item['rowid']);
                                echo form_hidden('cart['.$item['id'].'][name]',$item['name']);
                                echo form_hidden('cart['.$item['id'].'][price]',$item['price']);
                                echo form_hidden('cart['.$item['id'].'][qty]',$item['qty']);
                        ?>
                                    <tr>
                                        <td>
                                            <?php echo $i++;?>
                                        </td>
                                        <td>
                                            <?php echo $item['name'];?>
                                        </td>
                                        <td>
                                            $ <?php echo number_format($item['price'], 2);?>
                                        </td>
                                        <td>
                                            <?php echo $item['qty'];?>
                                        </td>
                                        <?php $gran_total = $item['price'] * $item['qty'];?>
                                        <td>
                                            <?php echo number_format($item['subtotal'], 2);?>
                                        </td>
                                        <td>
                                            <?php $path='<img src='.base_url('img/icons/remove_shopping_cart_black_24dp.svg').'with="25px" height="20px">'; 
                                echo anchor('carrito_elimina/'.$item['rowid'], $path)?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="5">
                                            <b>
                                                Total: <?php echo number_format($gran_total, 2);?>
                                            </b>
                                        </td>
                                        <td colspan="5" align="center">
                                            <input type="button" class="btn btn-primary btn-lg" value="Borrar Carrito"
                                                onclick="window.location='borrar'">
                                            <input type="button" class="btn btn-primary btn-lg" value="Comprar"
                                                onclick="window.location='carrito-comprar'">

                                        </td>
                                    </tr>
                                    <?php echo form_close(); endif; ?>
                                </table>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>