<div class="section">
    <div class= "card">
        <div class="card-header">
            <div class="card-header-title is-centered">
                <h1 class="title">&#128203; Catalogo</h1>
            </div>
        </div>
        <div class="card-content">
            <div class="tabs">
                <ul>
                    <li><a href="index.php?vista=catalogo">Todo</a></li>
                    <li class="is-active"><a>Toners</a></li>
                    <li><a href="index.php?vista=catalogotinta">Tintas</a></li>
                </ul>
            </div>
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
                    $url="index.php?vista=catalogotoner&page="; /* <== */
                    $registros=15;
                    $busqueda="";

                    # Paginador producto #
                    require_once "./php/producto_lista2.php";
                ?>
        </div>
    </div>
</div>
