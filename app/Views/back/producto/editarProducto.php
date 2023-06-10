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
<?php if(session()->perfil_id == 1){?>
<section class="p-3">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center pt-3 pb-3">
                    <h1>Agregar Producto</h1>
                </div>
                <form>
                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Nombre del Producto</h5>
                    </label>
                    <input class="form-control" type="text" placeholder="Nombre del Producto"
                        aria-label="default input example">

                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Descripción</h5>
                    </label>
                    <input class="form-control" type="text" placeholder="Descripción"
                        aria-label="default input example">

                    <select class="form-select" aria-label="Default select example">
                        <option selected>Seleccione el tamaño.</option>
                        <option value="1">Pequeño</option>
                        <option value="2">Mediano</option>
                        <option value="3">Grande</option>
                    </select>

                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Precio de Costo</h5>
                    </label>
                    <input class="form-control" type="number" placeholder="Precio Costo"
                        aria-label="default input example">

                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Precio de Venta</h5>
                    </label>
                    <input class="form-control" type="number" placeholder="Precio Venta"
                        aria-label="default input example">

                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Stock</h5>
                    </label>
                    <input class="form-control" type="number" placeholder="Stock" aria-label="default input example">

                    <label for="exampleFormControlInput1" class="form-label margenTituloForm">
                        <h5>Codigo del Producto</h5>
                    </label>
                    <input class="form-control" type="text" placeholder="Default input"
                        aria-label="default input example">

                    <label for="formFileMultiple" class="form-label margenTituloForm">
                        <h5>Fotos del Producto</h5>
                    </label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple />

                    <button type="submit" class="btn btn-primary">Cargar Producto</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
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