<?php
    require('../fpdf184/fpdf.php');
    $link=mysqli_connect("localhost","root","");
    $link->query("SET NAMES 'utf8'");
    mysqli_select_db($link, "eureka");
    if(isset($_GET['consulta'])){
        $pdf=new FPDF();
        //izquierda arriba derecha
        $pdf->SetMargins(25, 15 , 25);	
        $pdf->AddPage();	//Agregar una pagina
        $pdf->SetFont('Arial','B',18);
        $pdf->Image('../images/logo.jpg',0,0,40,15);
        $pdf->Ln();
		$consulta = unserialize(base64_decode($_GET['consulta']));
        $j=0;
        $incisos_correctos=[];
        foreach ($consulta as $key => $value) {
            $pdf->SetFont('Arial','B',14);
            $result = mysqli_fetch_array(mysqli_query($link, "Select * from preguntas where id_pregunta = $value"));
            $pdf->MultiCell(0, 7, utf8_decode(($j+1). '.- ' .$result['pregunta']), 0, 7);
            $opciones = [$result['respuesta1'],$result['respuesta2'],$result['respuesta3'],$result['respuesta_correcta']];
            $incisos = ['a)','b)','c)','d)'];
            $preguntas[$j] = $result['pregunta'];
            $respuestas_correctas[$j] = $result['respuesta_correcta'];
            shuffle($opciones);
        
            $o=0;
            foreach ($opciones as $k => $v) {
                if($v == $respuestas_correctas[$j]){
                    if($o==0) $incisos_correctos[$j] = "a)";
                    if($o==1) $incisos_correctos[$j] = "b)";
                    if($o==2) $incisos_correctos[$j] = "c)";
                    if($o==3) $incisos_correctos[$j] = "d)";
                }
                $o++;
            }
            $pdf->SetFont('Arial','',12);
            $i=0;
            foreach ($opciones as $key2 => $value2) {
                $pdf->MultiCell(0, 7, utf8_decode( $incisos[$i]. ' ' .$value2), 0, 1);
                $i++;
            }
            $j++;
            $pdf->Ln();
        }
        $pdf->Output("generar.pdf", "D");      
        mysqli_close($link);

	}else
        echo "No";    
    header("Location: verEstadisticas.php");
    
?>
