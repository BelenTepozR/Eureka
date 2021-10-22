<?php
    $link=mysqli_connect("localhost","root","");
    $link->query("SET NAMES 'utf8'");
    mysqli_select_db($link, "eureka");
    $id=$_GET['id_pregunta'];
    mysqli_query($link,"UPDATE preguntas SET pregunta_activa=0 where id_pregunta = '$id'");
    header("Location: administrarReactivos.php"); 
?>