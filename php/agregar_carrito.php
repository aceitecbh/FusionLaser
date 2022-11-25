<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	$campos="producto.producto_id,producto.producto_modelo,producto.producto_impresora,producto.producto_rendimiento,producto.colores_id,producto.producto_precio,producto.producto_stock";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT $campos FROM producto WHERE producto.producto_modelo LIKE '%$busqueda%' OR producto.producto_impresora LIKE '%$busqueda%' ORDER BY producto.producto_modelo ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto WHERE producto.producto_modelo LIKE '%$busqueda%' OR producto.producto_impresora LIKE '%$busqueda%' ";

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
                    <th>rendimiento</th>
                    <th>color</th>
                    <th>precio</th>
                    <th>stock</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
	';

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
            switch($rows['colores_id']){
				case 1:
					$color = "Magenta";
					break;
				case 2:
					$color = "Negro";
					break;
				case 3:
					$color = "Cian";
					break;
				case 4:
					$color = "Amarillo";
					break;
				case 5:
					$color = "Color";
					break;
				default:
					$color = "error";

			}
			$tabla.='
				<tr class="has-text-centered" >
					<td>'.$contador.'</td>
                    <td>'.$rows['producto_modelo'].'</td>
                    <td>'.$rows['producto_impresora'].'</td>
                    <td>'.$rows['producto_rendimiento'].'</td>
                    <td>'.$color.'</td>
                    <td>'.$rows['producto_precio'].'</td>
                    <td>'.$rows['producto_stock'].'</td>
                    <td>
                        <a href="index.php?vista_carrito&producto_id_up='.$rows['producto_id'].'" class="button is-link is-rounded is-small">Agregar al carrito</a>
                    </td>
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


	$conexion=null;
	echo $tabla;


	
