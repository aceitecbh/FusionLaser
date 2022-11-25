<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	$campos="producto.producto_id,producto.producto_modelo,producto.producto_impresora,producto.producto_rendimiento,producto.colores_id,producto.producto_precio,producto.producto_stock,producto.categoria_id";

	if(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista'] == "catalogotinta"){

        $busqueda = 2;

		$consulta_datos="SELECT $campos FROM producto WHERE producto.categoria_id LIKE '%$busqueda%' ORDER BY producto.producto_modelo ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto WHERE producto.categoria_id LIKE '%$busqueda%' ";

	}elseif(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista'] == "catalogotoner"){
        
        $busqueda = 1;

		$consulta_datos="SELECT $campos FROM producto WHERE producto.categoria_id LIKE '%$busqueda%' ORDER BY producto.producto_modelo ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto WHERE producto.categoria_id LIKE '%$busqueda%' ";
        
        
    }else{

		$consulta_datos="SELECT $campos FROM producto ORDER BY producto.producto_modelo ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto";
		
	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	$tabla.='
	<div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                	<th>#</th>
                    <th>Modelo</th>
                    <th>Impresora</th>
                    <th>Rendimiento</th>
                    <th>Color</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
	';
	function agregarCarrito($id){
		$obj = $_SESSION["listaCarrito"];
		$obj->append($id);
		$_SESSION["listaCarrito"] = $obj;


		foreach ($_SESSION["listaCarrito"] as $producto) {
			echo $producto;
		}
	}

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;

		$categorias = $conexion->query("SELECT * FROM categoria;");
		$categorias = $categorias->fetchAll();

		$colores = $conexion->query("SELECT * FROM colores;");
		$colores = $colores->fetchAll();

		foreach($datos as $rows){

			$categoria = "error";
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
					<td>'.$contador.'</td>
                    <td>'.$rows['producto_modelo'].'</td>
                    <td>'.$rows['producto_impresora'].'</td>
                    <td>'.$rows['producto_rendimiento'].$medicion.'</td>
                    <td>'.$color.'</td>
                    <td>'.$rows['producto_precio'].'</td>
                    <td>'.$rows['producto_stock'].'</td>
                    <td>'.$categoria.'</td>
                </tr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="7">
						<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
							Haga clic acá para recargar el listado
						</a>
					</td>
				</tr>
			';
		}else{
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="9">
						No hay registros en el sistema
					</td>
				</tr>
			';
		}
	}


	$tabla.='</tbody></table></div>';

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando productos <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p><br><br>';
	}

	$conexion=null;
	echo $tabla;


	
	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}