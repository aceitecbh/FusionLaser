<div class="section">
    <div class= "card">
        <div class="card-header">
            <div class="card-header-title">
                <h1 class="title">&#128722; Tu Carrito</h1>
            </div>
        </div>
        <div class="card-content">
            <?php
                    require_once "./php/main.php";

                    $url="index.php?vista_carrito"; /* <== */
                    $registros=15;
                    $busqueda="";

                    # Paginador producto #
                    require_once "./php/agregar_carrito.php";
                ?>
        </div>
    </div>
</div>
