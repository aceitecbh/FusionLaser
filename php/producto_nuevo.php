<?php
	require_once "../include/session_start.php";

	require_once "main.php";

	/*== Almacenando datos ==*/
	$modelo=limpiar_cadena($_POST['producto_modelo']);
    $impresora=limpiar_cadena($_POST['producto_impresora']);
    $rendimiento=limpiar_cadena($_POST['producto_rendimiento']);
	$color=limpiar_cadena($_POST['colores_id']);
	$precio=limpiar_cadena($_POST['producto_precio']);
	$stock=limpiar_cadena($_POST['producto_stock']);
    $categoria=limpiar_cadena($_POST['producto_categoria']);


	/*== Verificando campos obligatorios ==*/
    if($modelo=="" || $impresora=="" || $rendimiento=="" || $color=="" || $precio=="" || $stock=="" || $categoria==""){
        echo '
            <div class="notification is-danger is-light">
                Rellena todos los campos
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos ==*/
    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,100}",$modelo)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El dato modelo no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,100}",$impresora)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La dato impresora no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[0-9]{1,25}",$rendimiento)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El dato rendimiento no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[0-9.]{1,30}",$precio)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                el dato precio no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[0-9]{1,30}",$stock)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El dato stock no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    $check_modelo=conexion();
    $check_modelo=$check_modelo->query("SELECT producto_modelo FROM producto WHERE producto_modelo='$modelo'");
    if($check_modelo->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El modelo ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_modelo=null;

    $check_categoria=conexion();
    $check_categoria=$check_categoria->query("SELECT categoria_id FROM categoria WHERE categoria_id='$categoria'");
    if($check_categoria->rowCount()<=0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La categoría seleccionada no existe
            </div>
        ';
        exit();
    }
    $check_categoria=null;

    $check_colores=conexion();
    $check_colores=$check_colores->query("SELECT colores_id FROM colores WHERE colores_id='$color'");
    if($check_colores->rowCount()<=0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La categoría seleccionada no existe
            </div>
        ';
        exit();
    }
    $check_colores=null;

	/*== Guardando datos ==*/
    $guardar_producto=conexion();
    $guardar_producto=$guardar_producto->prepare("INSERT INTO producto(producto_modelo,producto_impresora,producto_rendimiento,producto_precio,producto_stock,categoria_id,colores_id) VALUES(:modelo,:impresora,:rendimiento,:precio,:stock,:categoria,:color)");

    $marcadores=[
        ":modelo"=>$modelo,
        ":impresora"=>$impresora,
        ":rendimiento"=>$rendimiento,
        ":color"=>$color,
        ":precio"=>$precio,
        ":stock"=>$stock,
        ":categoria"=>$categoria
    ];

    $guardar_producto->execute($marcadores);

    if($guardar_producto->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO REGISTRADO!</strong><br>
                El producto se registro con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el producto, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_producto=null;