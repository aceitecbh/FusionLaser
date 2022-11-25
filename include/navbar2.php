
    <nav class="vista-navbar navbar is-fixed-top is-dark" role="navigation">
        <div class="navbar-brand pl-2">
            <a class="navbar-item" href="index.php?vista=inicio">
                <strong>Fusión Láser</strong>
            </a>
    
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a href="index.php?vista=inicio" class="navbar-item">
                    Home
                </a>

                <a href="index.php?vista=catalogo" class="navbar-item">
                    Catalogo
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Más
                    </a>

                    <div class="navbar-dropdown">
                        <a href="index.php?vista=agregar_producto" class="navbar-item">
                            Agregar Producto
                        </a>
                        <a href="index.php?vista=buscador" class="navbar-item">
                            Buscador
                        </a>
                        <a href="index.php?vista=lista_producto" class="navbar-item">
                            Lista
                        </a>
                        <a href="index.php?vista=categorias" class="navbar-item">
                            Categoria Nueva
                        </a>
                        <a href="index.php?vista=colores" class="navbar-item">
                            Color Nuevo
                        </a>
                    </div>
                </div>
                <!--
                <div class="navbar-item">
                    <form action="" method="POST" autocomplete="off" >
                        <input type="hidden" name="modulo_buscador" value="producto">
                        <div class="navbar-item field is-grouped">
                            <p class="control is-expanded">
                                <input class="input is-rounded" type="text" name="txt_buscador" placeholder="¿Qué estas buscando?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30" >
                            </p>
                            <p class="navbar-item control">
                                <a href="index.php?vista=buscador" class="button is-link is-rounded is-small">Buscar</a>
                            </p>
                        </div>
                    </form>
                </div>
                -->

            </div>
        </div>
        
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-medium" href="index.php?vista=micuenta&user_id_up=<?php echo $_SESSION['id']; ?>">
                        <img src="img/usuario.png"></img>
                    </a>
                    
                    <a class="button is-medium" href="index.php?vista=logout">
                        <img src="img/logout.png"></img>
                    </a>
                </div>
            </div>
        </div>
    </nav>

