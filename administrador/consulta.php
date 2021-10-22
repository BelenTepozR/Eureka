<?php

    $materia=$_REQUEST['materia'];
    $nivel=$_REQUEST['nivel'];
    echo "$materia - $nivel";
    if ($materia == -1 and $nivel == -1){
        $consulta = "Select * from preguntas";
        header("Location: administrarReactivos.php?t=$consulta");
    } 
    if ($materia == -1 and $nivel > 0) {
        $consulta = "select * from preguntas where nivel = $nivel";
        header("Location: administrarReactivos.php?t=$consulta");
    }

    if($nivel == -1 and $materia > 0){
        $consulta = "select * from preguntas where id_materia = $materia";
        header("Location: administrarReactivos.php?t=$consulta");
    }
    if ($materia > 0 and $nivel > 0){
        $consulta = "select * from preguntas where id_materia = $materia and nivel = $nivel";
        header("Location: administrarReactivos.php?t=$consulta");
    }

    
?>