<div class="section">
    <?php 
        require_once "./php/main.php";
    ?>

    <div class="form-rest px-6"></div>

    <form action="./php/producto_nuevo.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
        <div class="card">
            <div class="card-header">
                <div class="card-header-title is-centered">
                    <h1 class="title">&#9997; Nuevo producto</h1>
                </div>
            </div>
            <div class="card-content">
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Modelo producto</label>
                            <input class="input" type="text" name="producto_modelo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,50}" maxlength="50" required >
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Impresora producto</label>
                            <input class="input" type="text" name="producto_impresora" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,50}" maxlength="50" required >
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <label>Rendimiento producto</label>
                            <input class="input" type="text" name="producto_rendimiento" pattern="[0-9]{1,25}" maxlength="25" required >
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control has-text-centered">
                            <label>Precio producto</label>
                            <input class="input" type="text" name="producto_precio" pattern="[0-9.]{1,30}" maxlength="30" required >
                        </div>
                    </div>
                    <div class="column">
                        <div class="control has-text-centered">
                            <label>Stock producto</label>
                            <input class="input" type="text" name="producto_stock" pattern="[0-9]{1,30}" maxlength="30" required >
                        </div>
                    </div>
                </div>
                <div class="columns has-text-centered">
                    <div class="column">
				        <label>Categoría</label><br>
		    	        <div class="select is-rounded">
				  	        <select name="producto_categoria" >
                                <option value="" selected="" >Seleccione una categoría</option>
                                <?php
                                    $categorias=conexion();
                                    $categorias=$categorias->query("SELECT * FROM categoria");
                                    if($categorias->rowCount()>0){
                                        $categorias=$categorias->fetchAll();
                                        foreach($categorias as $row){
                                            echo '<option value="'.$row['categoria_id'].'" >'.$row['categoria_nombre'].'</option>';
                                        }
                                    }
                                    $categorias=null;
                                ?>
				  	        </select>
				        </div>
		  	        </div>
                      <div class="column">
				        <label>Color</label><br>
		    	        <div class="select is-rounded">
				  	        <select name="colores_id" >
                                <option value="" selected="" >Seleccione un color</option>
                                <?php
                                    $colores=conexion();
                                    $colores=$colores->query("SELECT * FROM colores");
                                    if($colores->rowCount()>0){
                                        $colores=$colores->fetchAll();
                                        foreach($colores as $row){
                                            echo '<option value="'.$row['colores_id'].'" >'.$row['colores_nombre'].'</option>';
                                        }
                                    }
                                    $colores=null;
                                ?>
				  	        </select>
				        </div>
		  	        </div>
                </div>
                <p class="has-text-centered">
                    <button type="submit" class="button is-info is-rounded">Guardar</button>
                </p>
            </div>
        </div>
    </form>
</div>