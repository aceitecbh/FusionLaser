<?php
	require_once "main.php";

    /*== Almacenando datos ==*/
    $nombre=limpiar_cadena($_POST['colores_nombre']);


    /*== Verificando campos obligatorios ==*/
    if($nombre==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos ==*/
    if(verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,15}",$nombre)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    /*== Verificando nombre ==*/
    $check_nombre=conexion();
    $check_nombre=$check_nombre->query("SELECT colores_nombre FROM colores WHERE colores_nombre='$nombre'");
    if($check_nombre->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE ingresado ya se encuentra registrado, por favor elija otro
            </div>
        ';
        exit();
    }
    $check_nombre=null;


    /*== Guardando datos ==*/
    $guardar_colores=conexion();
    $guardar_colores=$guardar_colores->prepare("INSERT INTO colores(colores_nombre) VALUES(:nombre)");

    $marcadores=[
        ":nombre"=>$nombre
    ];

    $guardar_colores->execute($marcadores);

    if($guardar_colores->rowCount()==1){
        echo '
            <div class="notification is-info is-light">
                <strong>¡COLOR REGISTRADO!</strong><br>
                El color se registro con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el color, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_colores=null;