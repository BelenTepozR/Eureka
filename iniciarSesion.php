<?php
    session_start();
    $correo=$_REQUEST['correo'];
    $contrasenia=$_REQUEST['contrasenia'];

    echo "$correo";
    echo "$contrasenia";

    $link=mysqli_connect("localhost","root","");
    mysqli_select_db($link, "eureka");
    $result = mysqli_query($link, "select * from usuarios where correo='$correo'");

    if($row=mysqli_fetch_array($result)){
        if($row["contrasenia"]==$contrasenia){
            //El ususario fue encontrado con éxito
            $tipo=$row["tipo"];
            echo "$tipo";
            $_SESSION['id']=$row["id_usuario"];
            $_SESSION['tipoUsuario']=$tipo;
            if($tipo==0){
                header("Location: administrador/administrarReactivos.php");
            }
			if($tipo==1){
         	   header("Location: usuario/inicioUsuario.php");
			}
        }else{
            header("Location: index.php?t=1");
        }
    }else{
        header("Location: index.php?t=0");
    }
    mysqli_free_result($result);
    mysqli_close($link);
?>