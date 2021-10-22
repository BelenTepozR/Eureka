<?php
    session_start();
    if (!$_SESSION['id'] || $_SESSION['tipoUsuario'] != 1){
        header ("Location: ../index.php");
    }
    
    if(isset($_GET['preguntas'])){
		$id_preguntas = unserialize(base64_decode($_GET['preguntas']));
        $link=mysqli_connect("localhost","root","");
        $link->query("SET NAMES 'utf8'");
        mysqli_select_db($link, "eureka");
        $fecha = $_SESSION['fecha'];
        echo $fecha;

        //creamos el examen
        if (mysqli_query($link,"insert into examenes (id_usuario, puntaje, inicio, fin) values ($_SESSION[id], 0, '$fecha', NOW())")) 
            echo "<br> Se hizo la colsulta";
        else
            echo "Error: <br>" . mysqli_error($link);

        $ultimoExamen = mysqli_fetch_array(mysqli_query($link, "select * from examenes where inicio = '$fecha'"));
        echo $ultimoExamen['id_examen'];

        $aciertos = 0;
        foreach ($id_preguntas as $key => $value) {
            //insertamos la respuesta del usuario para cada pregunta
            mysqli_query($link, "INSERT into registros (id_examen, id_pregunta, respuesta) values ($ultimoExamen[id_examen], $value, '$_POST[$value]')");
            //vamos verificando que las preguntas que respondió sean correctas
            $correcta = mysqli_query($link, "select respuesta_correcta from preguntas where id_pregunta = $value");
            $row=mysqli_fetch_array($correcta);
            if($_POST[$value] == $row['respuesta_correcta'])
                $aciertos++;
        }
        //Se insertaría el puntaje
        if (mysqli_query($link, "UPDATE examenes SET puntaje = '$aciertos' where id_examen = $ultimoExamen[id_examen]")) 
            echo "<br> Se hizo la colsulta";
        else
            echo "Error: <br>" . mysqli_error($link);
                
        header("Location: verEstadisticas.php");
	}    
?>
