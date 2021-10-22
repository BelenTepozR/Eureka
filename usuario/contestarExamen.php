<!DOCTYPE html>
<html lang="en">
<head>

     <title>¡Eureka!</title>
<!-- 

Known Template 

https://templatemo.com/tm-516-known

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/owl.carousel.css">
     <link rel="stylesheet" href="../css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" type="text/css" href="../css/templatemo-style.css?ts=<?=time()?>"/>


</head>
<body id="prueba" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     <?php
          session_start();
          if (!$_SESSION['id'] || $_SESSION['tipoUsuario'] != 1){
               header ("Location: ../index.php");
          }
          $materia=$_REQUEST['materias'];
          $nivel=$_REQUEST['nivel'];
          $numeroPreguntas = $_REQUEST['cantidad'];

          $link=mysqli_connect("localhost","root","");
          $link->query("SET NAMES 'utf8'");
          mysqli_select_db($link, "eureka");
          $result = mysqli_query($link, "select * from preguntas where nivel = $nivel and id_materia = $materia order by rand() limit $numeroPreguntas");
          $i = 0;
          while($row=mysqli_fetch_array($result)){
               $A[$i] = $row["id_pregunta"];
               $i++;
          }
          mysqli_data_seek($result, 0);
          date_default_timezone_set("America/Mexico_City");
          $_SESSION['fecha'] = date('Y-m-d h:i:s', time()); 
     ?>
     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Eureka</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#prueba" class="smoothScroll">Contestar Prueba</a></li>
                    </ul>
               </div>
          </div>
     </section>


     <!-- INICIO -->
     <section class="section-personalizado">
          <br><div class="col-md-1"></div>
          <div class="col-md-11" id="informacion">
               <div class="col-md-5">
                    <br><br>
                    <figure>
                         <span><a href="generarPrueba.php"><i class="fa fa-remove"></i></a></span>
                         <figcaption>
                              <h4>Cancelar el examen.</h4>
                         </figcaption>
                    </figure>
                    <h1>EUREKA</h1>
                    <h4> Demuestra tus conocimientos, ¡EXITO!</h4>
               </div>
               <div class="col-md-7">     
                    <h5>Si no quieres responder el cuestionario en línea puedes...</h5>
                    <figure>
                         <span><a href="generarPDF.php?consulta=<?php echo base64_encode(serialize($A));?>"><i class="fa fa-print"></i></a></span>
                         <figcaption>
                              <h4>Imprimir tu exámen.</h4>
                         </figcaption>
                    </figure>
                    <figure>
                         <span><a href="generarPrueba.php"><i class="fa fa-envelope"></i></a></span>
                         <figcaption>
                              <h4>Enviar tu examen a tu correo.</h4>
                         </figcaption>
                    </figure>
               </div>
          </div>
          <div class="container">
               <div class="row">
                    <form role="form" method="POST">
                         
                         <div class="col-md-12">
                              <?php
                                   $i = 0;
                                   while($row=mysqli_fetch_array($result)){
                                        /*Guardamos los id de las preguntas que se van a responder, para pasarlos
                                          al archivo guardar respuestas y procesar los datos ingresados por el ususario*/
                                        //$A[$i] = $row["id_pregunta"];
                                        $i++;
                                        $opciones = [$row['respuesta1'],$row['respuesta2'],$row['respuesta3'],$row['respuesta_correcta']];
                                        shuffle($opciones);
                                        echo "<div class='col-md-12'>
                                                  <h4>$i.-$row[pregunta]</h4>
                                             </div>
                                             <div class='col-md-3'>
                                                  <h5><input type='radio' name='$row[id_pregunta]' value='$opciones[0]' required> $opciones[0]</h5>
                                             </div>
                                             <div class='col-md-3'>
                                                  <h5><input type='radio' name='$row[id_pregunta]' value='$opciones[1]'> $opciones[1]</h5>
                                             </div>
                                             <div class='col-md-3'>
                                                  <h5><input type='radio' name='$row[id_pregunta]' value='$opciones[2]'> $opciones[2]</h5>
                                             </div>
                                             <div class='col-md-3'>
                                                  <h5><input type='radio' name='$row[id_pregunta]' value='$opciones[3]'> $opciones[3]</h5>
                                             </div>";
                                   }

                              ?>
                         </div>
                         <div class="col-md-8"></div>
                         <div class="col-md-4">
                              <br><br>
                              <button type="submit" class="btn-formularios" formaction="guardarRespuestas.php?preguntas=<?php echo base64_encode(serialize($A));?>">Enviar</button>
                         </div> 
                    </form>
               </div>
          </div>
     </section>

     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">
                    <div class="col-md-3">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Redes sociales</h2>
                              </div>
                              <ul class="social-icon">
                                   <li><a target="_blank" href="https://facebook.com" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a target="_blank" href="https://twitter.com" class="fa fa-twitter"></a></li>
                                   <li><a target="_blank" href="https://www.instagram.com/" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>
                    <div class="col-md-6">
                         <div class="footer-info">
                              <div class="section-title texto-contacto">
                                   <h2>Información de Contacto</h2>
                              </div>
                              <ul class="social-icon footer_menu">
                                  <div class="col-md-1"></div>
                                   <div class="col-md-5">
                                        <li><a target="_blank" href="https://web.whatsapp.com/" class="fa fa-whatsapp"></a>+52 222 912 2496</li>
                                   </div>
                                   <div class="col-md-6">
                                        <li><a target="_blank" href="mailto:eureka.eduex@gmail.com" class="fa fa-envelope"></a>eureka.eduex@gmail.com</li>
                                   </div>
                              </ul>
                         </div>
                    </div>  
                    <div class="col-md-3">
                         <div class="footer-info">
						 	<div class="section-title">
                            	<h2>Diseño</h2>
                              </div>
                         	<div class="copyright-text"> 
							<p>Pagina ejemplo de <br> <a rel="nofollow noopener noreferrer" target="_blank" href="https://www.free-css.com/">https://www.free-css.com/</a><a rel="license" href="http://creativecommons.org/licenses/by/3.0/"></a></p>
						</div>
                         </div>
                    </div>  
               </div>
          </div>
     </footer>
     <!-- SCRIPTS -->
     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/owl.carousel.min.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/custom.js"></script>

</body>
</html>