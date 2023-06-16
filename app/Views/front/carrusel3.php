<div>
    <!--recuperamos datos con la función Flashdata para mostrarlos-->
    <?php if (session()->getFlashdata('success')) {
      echo "
      <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('success') . "
  </div>";
    } ?>
</div>
<!-- php $validación = \Config\Services::validación(); Esto carga automáticamente el archivo Config\Validation que contiene configuraciones para incluir múltiples conjuntos de reglas -->
<?php $validation = \Config\Services::validation(); ?>

<div class="container carouselBody py-4">
    <div class="container carouselContainer swiper">
        <div class="slide-container">
            <div class="card-wrapper swiper-wrapper pb-4">
                <?php foreach($productos as $row){ ?>

                <div class="card carouselCard swiper-slide">
                    <div class="img-box">
                        <img src="<?=base_url()?>/assets/upload/<?php echo $row->imagen;  ?>" alt="...">
                    </div>
                    <div class="product-details">
                        <div class="product-description">
                            <h3 class="product">
                                <?php echo $row->nombre_prod;  ?>
                            </h3>
                            <div class="description">
                                <p class="text-center">Tamaño: <?php echo $row->size;  ?></p>
                                <h5><s style="color: red">$<?php echo $row->precio_venta;  ?></s></h5>
                                <div class="position-relative">
                                    <h5><strong>$<?php echo $row->precio_oferta;  ?></strong></h5>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        - <?php echo $row->descuento;  ?>%
                                        <span class="visually-hidden">Descuento</span>
                                    </span>
                                </div>
                                <a href="<?php echo base_url('verProducto/'.$row->id_producto);?>"
                                    class="btn btn-primary">Ver Producto</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<!--
    ARCHIVO de CARRUSEL DE PRODUCTOS ORIGINAL
<div class="container carouselBody py-3">
    <div class="container carouselContainer swiper">
        <div class="slide-container">
            <div class="card-wrapper swiper-wrapper">
                <div class="card carouselCard swiper-slide">
                    <div class="img-box">
                        <img src="assets/img/fotos/carousel1.jpeg" alt="">
                    </div>
                    <div class="product-details">
                        <div class="product-description">
                            <h3 class="product">
                                Abrigo Gris!
                            </h3>
                            <div class="description">
                                <h5><s style="color: red">$1000</s></h5>
                                <h5><strong>$850</strong></h5>
                                <a href="#" class="btn btn-primary">Ver Detalle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card carouselCard swiper-slide">
                    <div class="img-box">
                        <img src="assets/img/fotos/carousel2.jpeg" alt="">
                    </div>
                    <div class="product-details">
                        <div class="product-description">
                            <h3 class="product">
                                Abrigo Beige!
                            </h3>
                            <div class="description">
                                <h5><s style="color: red">$800</s></h5>
                                <h5><strong>$700</strong></h5>
                                <a href="#" class="btn btn-primary">Ver Detalle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card carouselCard swiper-slide">
                    <div class="img-box">
                        <img src="assets/img/fotos/carousel3.jpeg" alt="">
                    </div>
                    <div class="product-details">
                        <div class="product-description">
                            <h3 class="product">
                                Abrigo Rosa!
                            </h3>
                            <div class="description">
                                <h5><s style="color: red">$850</s></h5>
                                <h5><strong>$750</strong></h5>
                                <a href="#" class="btn btn-primary">Ver Detalle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card carouselCard swiper-slide">
                    <div class="img-box">
                        <img src="assets/img/fotos/carousel4.jpeg" alt="">
                    </div>
                    <div class="product-details">
                        <div class="product-description">
                            <h3 class="product">
                                Combo Doble!
                            </h3>
                            <div class="description">
                                <h5><s style="color: red">$1300</s></h5>
                                <h5><strong>$1050</strong></h5>
                                <a href="#" class="btn btn-primary">Ver Detalle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card carouselCard swiper-slide">
                    <div class="img-box">
                        <img src="assets/img/fotos/carousel5.jpeg" alt="">
                    </div>
                    <div class="product-details">
                        <div class="product-description">
                            <h3 class="product">
                                Abrigo Fucsia!
                            </h3>
                            <div class="description">
                                <h5><s style="color: red">$800</s></h5>
                                <h5><strong>$750</strong></h5>
                                <a href="#" class="btn btn-primary">Ver Detalle</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

-->