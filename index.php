<?php 
    require "./include/session_start.php";
    require "./php/main.php"; 
    $productosEditados = new ArrayObject();
    $_SESSION["productosEditados"] = $productosEditados;

    if(!isset($_SESSION['logueado'])){
        $_SESSION['logueado'] = false;
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./include/head.php"?>
</head>
<body class="has-navbar-fixed-top">


        <?php 
            $login = true;
            if(!isset($_GET['vista']) || $_GET['vista']==""){
                $_GET['vista']="inicio";
            }
    
            if(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista']!="error" && $_GET['vista']!="login" && $_GET['vista']!="registro"){

                if((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="")){
                    //include "./vistas/logout.php";
                    //exit();
                }

                if ($_SESSION['logueado']){
                    $id=limpiar_cadena($_SESSION['id']);

                    $mysqli = mysqli_connect("localhost", "root", "", "bd_fusionlaser");
                    //$result = $pdo -> query("SELECT * FROM usuario WHERE usuario.usuario_id LIKE '%$id%'");
                    
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        exit();
                      }
                      $result = mysqli_query($mysqli, "SELECT * FROM usuario WHERE usuario.usuario_id LIKE '%$id%'");
                      if ($result) {
                        while($row = mysqli_fetch_array($result))
                        {
                            $max = $row['usuario_admin'];
                        }
                        mysqli_free_result($result);
                      }

                      mysqli_close($mysqli);

                    if($max){
                        if ($_GET['vista']=="inicio"){
                            $_GET['vista']="inicio_admin";
                        }
                        include "./include/navbar2.php"; 
                    }
                    else{
                        include "./include/navbar.php";
                    }
                }else{
                    include "./include/navbar3.php";
                }


                include "./vistas/".$_GET['vista'].".php";

                include "./include/script.php";
                
            }else{
                if($_GET['vista']=="login"){
                    include "./vistas/login.php";
                }elseif($_GET['vista']=="registro"){
                    include "./vistas/registro.php";
                }
                else{
                    include "./vistas/error.php";
                }
            }
            
        ?>  

</body>
</html>