<?php
    session_start();
    $nombre=$_REQUEST['nombre'];
    $correo=$_REQUEST['correo'];
    $contrasenia=$_REQUEST['contrasenia'];
    $contrasenia_c=$_REQUEST['contrasenia_c'];

    if($contrasenia == $contrasenia_c){
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link, "eureka");
        $result = mysqli_query($link, "select * from usuarios where correo='$correo'");
        if(!$row=mysqli_fetch_array($result)){
            if (mysqli_query($link,"insert into usuarios (nombre,correo,contrasenia,tipo) values ('$nombre', '$correo', '$contrasenia', 1 )")){
               // echo '<script language="javascript">alert("B I E N V E N I D O  ");</script>';
                $datosUsuario = mysqli_fetch_array(mysqli_query($link, "select * from usuarios where correo = '$correo'"));
                $_SESSION['id'] = $datosUsuario['id_usuario']; 
                $_SESSION['tipoUsuario'] = $datosUsuario['tipo']; 
                header("Location: ../usuario/inicioUsuario.php");
            } 
           else
              header("Location: registrar.php?msg=No se pudo registrar al usuario"); 
        }else
            header("Location: registrar.php?msg=El usuario ya está registrado");       

        mysqli_free_result($result);
        mysqli_close($link);
    }
    else{
        $mensaje = "Las contraseñas no coinciden";
        header("Location: registrar.php?msg=$mensaje");
    }
        
?>