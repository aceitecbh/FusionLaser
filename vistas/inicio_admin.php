
<section class="section">
  <div class="columns">
      <div class="card column ml-4" style="max-height:40%;">
        <div class="card-header">
            <div class="card-header-title">
                <h1 class="title">&#128230; Productos sin stock</h1>
            </div>
        </div>
        <div class="card-content">
          <table class="home-table table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
              <tr class="has-text-centered">
                <th>Modelo</th>
                <th>Color</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tabla = '';
  
            $consulta_datos = "SELECT * FROM producto WHERE producto_stock = 0";
	          $conexion=conexion();
  
	          $datos = $conexion->query($consulta_datos);
	          $datos = $datos->fetchAll();
              
              $categorias = $conexion->query("SELECT * FROM categoria;");
              $categorias = $categorias->fetchAll();
      
              $colores = $conexion->query("SELECT * FROM colores;");
              $colores = $colores->fetchAll();
  
              foreach($datos as $rows){
                  foreach($categorias as $cat){
                      if($cat['categoria_id'] == $rows['categoria_id']){
                          $categoria = $cat["categoria_nombre"];
                          if($categoria == "Toner"){
                              $medicion = " K";
                          }else{
                              $medicion = " ml";
                          }
                      }
                  }
                  $color = "error";
              
                  foreach($colores as $col){
                      if($col['colores_id'] == $rows['colores_id']){
                          $color= $col["colores_nombre"];
                      }
                  }
                  $tabla.='
			  	<tr class="has-text-centered" >
                      <td class="home-table">'.$rows['producto_modelo'].'</td>
                      <td class="home-table">'.$color.'</td>
                      <td class="home-table">'.$rows['producto_precio'].'</td>
                      <td class="home-table">'.$rows['producto_stock'].'</td>
                      <td class="home-table">'.$categoria.'</td>
                  </tr>
                  ';
              }
          
              echo $tabla;
              ?>                
            </tbody>
          </table>
        </div>
      </div>
  </div>
  <div class="card column ml-4" style="max-height:40%;">
        <div class="card-header">
            <div class="card-header-title">
                <h1 class="title">&#128230; Productos con poco stock</h1>
            </div>
        </div>
        <div class="card-content">
          <table class="home-table table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
              <tr class="has-text-centered">
                <th>Modelo</th>
                <th>Color</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tabla = '';
  
            $consulta_datos = "SELECT * FROM producto WHERE (producto_stock <= 2 && producto_stock > 0)";
	          $conexion=conexion();
  
	          $datos = $conexion->query($consulta_datos);
	          $datos = $datos->fetchAll();
              
              $categorias = $conexion->query("SELECT * FROM categoria;");
              $categorias = $categorias->fetchAll();
      
              $colores = $conexion->query("SELECT * FROM colores;");
              $colores = $colores->fetchAll();
  
              foreach($datos as $rows){
                  foreach($categorias as $cat){
                      if($cat['categoria_id'] == $rows['categoria_id']){
                          $categoria = $cat["categoria_nombre"];
                          if($categoria == "Toner"){
                              $medicion = " K";
                          }else{
                              $medicion = " ml";
                          }
                      }
                  }
                  $color = "error";
              
                  foreach($colores as $col){
                      if($col['colores_id'] == $rows['colores_id']){
                          $color= $col["colores_nombre"];
                      }
                  }
                  $tabla.='
			  	<tr class="has-text-centered" >
                      <td class="home-table">'.$rows['producto_modelo'].'</td>
                      <td class="home-table">'.$color.'</td>
                      <td class="home-table">'.$rows['producto_precio'].'</td>
                      <td class="home-table">'.$rows['producto_stock'].'</td>
                      <td class="home-table">'.$categoria.'</td>
                  </tr>
                  ';
              }
          
              echo $tabla;
              ?>                
            </tbody>
          </table>
        </div>
      </div>
</section>