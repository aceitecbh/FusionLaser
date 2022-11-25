<div class="section">
    <div class="card">
        <?php
            require_once "./php/main.php";

            if(isset($_POST['modulo_buscador'])){
                require_once "./php/buscar_producto.php";
            }

            if(!isset($_SESSION['busqueda_producto']) && empty($_SESSION['busqueda_producto'])){
        ?>
        <div class="card-header">
            <div class="card-header-title is-centered">
                <h1 class="title">&#128270; Buscar Productos</h1>
            </div>
        </div>
        <div class="card-content px-6">
            <div class="columns">
                <div class="column">
                    <form action="" method="POST" autocomplete="off" >
                        <input type="hidden" name="modulo_buscador" value="producto">
                        <div class="field is-grouped">
                            <p class="control is-expanded">
                                <input class="input is-rounded" type="text" name="txt_buscador" placeholder="¿Qué estas buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30" >
                            </p>
                            <p class="control">
                                <button class="button is-link is-rounded" type="submit" >Buscar</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <?php }else{ ?>
            <div class="card-header">
                <div class="card-header-title is-centered">
                    <h1 class="title">Buscar Productos</h1>
                </div>
            </div>
            <div class="card-content">
                <div class="columns">
                    <div class="column">
                        <form action="" method="POST" autocomplete="off" >
                            <input type="hidden" name="modulo_buscador" value="producto">
                            <div class="field is-grouped">
                                <p class="control is-expanded">
                                    <input class="input is-rounded" type="text" name="txt_buscador" placeholder="<?php echo ($_SESSION['busqueda_producto']) ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30" >
                                </p>
                                <p class="control">
                                    <button class="button is-link is-rounded" type="submit" >Buscar</button>
                                </p>
                                <form action="" method="POST" autocomplete="off" >
                                    <input type="hidden" name="modulo_buscador" value="producto"> 
                                    <input type="hidden" name="eliminar_buscador" value="producto">
                                    <button type="submit" class="button is-danger is-rounded">Limpiar busqueda</button>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                        # Eliminar producto #
                        if(isset($_GET['product_id_del'])){
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
                        $url="index.php?vista=buscador&page="; /* <== */
                        $registros=15;
                        $busqueda=$_SESSION['busqueda_producto']; /* <== */

                        # Paginador producto #
                        require_once "./php/producto_lista3.php";
                    } 
                ?>
            </div>
        </div>
    </div>
</div>