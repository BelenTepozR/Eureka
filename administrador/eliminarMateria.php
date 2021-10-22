<?php
    $link=mysqli_connect("localhost","root","");
    $link->query("SET NAMES 'utf8'");
    mysqli_select_db($link, "eureka");

    $id=$_GET['id_materia'];
    mysqli_query($link,"UPDATE materias SET materia_activa=0 where id_materia = '$id'");
    mysqli_query($link,"UPDATE preguntas SET pregunta_activa=0 where id_materia = '$id'");
    header("Location: administrarMaterias.php"); 
?>