<div class="section">
	<div class="card">
		<?php

			require_once "./php/main.php";

			$id = (isset($_GET['producto_id_up'])) ? $_GET['producto_id_up'] : 0;

			/*== Verificando producto ==*/
			$check_producto=conexion();
			$check_producto=$check_producto->query("SELECT * FROM producto WHERE producto_id='$id'");

			if($check_producto->rowCount()>0){
				$datos=$check_producto->fetch();
		?>
		
		<div class="card-header">
            <div class="card-header-title is-centered">
                    <h1 class="title">Modificar producto</h1>
            </div>
			<?php include "./include/btn_back.php";?>
        </div>
		<div class="card-content">
			<div class="form-rest mb-6 mt-6"></div>
		
			<h2 class="title has-text-centered"><?php echo $datos['producto_modelo']; ?></h2>

			<form action="./php/producto_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" >

			<input type="hidden" name="producto_id" value="<?php echo $datos['producto_id']; ?>" required >

			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Modelo</label>
						<input class="input" type="text" name="producto_modelo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,100}" maxlength="100" required value="<?php echo $datos['producto_modelo']; ?>" >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Impresora</label>
						<input class="input" type="text" name="producto_impresora" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,100}" maxlength="100" required value="<?php echo $datos['producto_impresora']; ?>" >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Rendimiento</label>
						<input class="input" type="text" name="producto_rendimiento" pattern="[0-9]{1,20}" maxlength="20" required value="<?php echo $datos['producto_rendimiento']; ?>" >
					</div>
				</div>
				<div class="column">
					<label>color</label><br>
		    		<div class="select is-rounded">
					  	<select name="colores_id" >
					    	<?php
    							$color=conexion();
    							$color=$color->query("SELECT * FROM colores");
    							if($color->rowCount()>0){
    								$color=$color->fetchAll();
    								foreach($color as $row){
    									if($datos['colores_id']==$row['colores_id']){
    										echo '<option value="'.$row['colores_id'].'" selected="" >'.$row['colores_nombre'].' (Actual)</option>';
    									}else{
    										echo '<option value="'.$row['colores_id'].'" >'.$row['colores_nombre'].'</option>';
    									}
					    			}
					   			}
					   			$color=null;
					    	?>
					  	</select>
					</div>
		  		</div>
			</div>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Precio</label>
						<input class="input" type="text" name="producto_precio" pattern="[0-9.]{1,25}" maxlength="30" required value="<?php echo $datos['producto_precio']; ?>" >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Stock</label>
						<input class="input" type="text" name="producto_stock" pattern="[0-9]{1,25}" maxlength="30" required value="<?php echo $datos['producto_stock']; ?>" >
					</div>
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<label>Categoría</label><br>
		    		<div class="select is-rounded">
					  	<select name="producto_categoria" >
					    	<?php
    							$categorias=conexion();
    							$categorias=$categorias->query("SELECT * FROM categoria");
    							if($categorias->rowCount()>0){
    								$categorias=$categorias->fetchAll();
    								foreach($categorias as $row){
    									if($datos['categoria_id']==$row['categoria_id']){
    										echo '<option value="'.$row['categoria_id'].'" selected="" >'.$row['categoria_nombre'].' (Actual)</option>';
    									}else{
    										echo '<option value="'.$row['categoria_id'].'" >'.$row['categoria_nombre'].'</option>';
    									}
					    			}
					   			}
					   			$categorias=null;
					    	?>
					  	</select>
					</div>
		  		</div>
			</div>
			<p class="has-text-centered">
				<button type="submit" class="button is-success is-rounded">Actualizar</button>
			</p>
			</form>
		</div>

		<?php 
			}else{
				include "./include/error_alert.php";
			}
			$check_tinta=null;
		?>
	</div>
</div>