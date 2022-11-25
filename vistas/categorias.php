<section class="section">
	<div class="card">
		<div class="card-header">
			<div class="card-header-title is-centered">
				<h1 class="title">&#9997; Categoría Nueva</h1>
			</div>
		</div>
		<div class="card-content">
			<div class="container pb-6 pt-6">

			<div class="form-rest mb-6 mt-6"></div>

			<form action="./php/categoria_nueva.php" method="POST" class="FormularioAjax" autocomplete="off" >
				<div class="columns">
					  <div class="column">
						<div class="control">
							<label>Nombre</label>
							  <input class="input" type="text" name="categoria_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required >
						</div>
					  </div>
				</div>
				<p class="has-text-centered">
					<button type="submit" class="button is-info is-rounded">Guardar</button>
				</p>
			</form>
			</div>	
		</div>
		
	</div>
</section>