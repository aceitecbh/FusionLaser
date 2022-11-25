<div class="section">
    <div class= "card">
        <div class="card-header">
            <div class="card-header-title is-centered">
                <h1 class="title">&#128203; Lista de productos</h1>
            </div>
        </div>
        <div class="card-content">
            <?php
                require_once "./php/main.php";

                # Eliminar producto #
                if(isset($_GET['producto_id_del'])){
                    require_once "./php/producto_eliminar.php";
                }

                if(!isset($_GET['page'])){
                    $pagina=1;
                }else{
                    $pagina=(int) $_GET['page'];
                    if($pagina<=1){
                        $pagina=1;
                    }
                }

                $pagina=limpiar_cadena($pagina);
                $url="index.php?vista=lista_producto&page="; /* <== */
                $registros=15;
                $busqueda="";

                # Paginador producto #
                require_once "./php/producto_lista.php";
            ?>
        </div>
    </div>
</div>
