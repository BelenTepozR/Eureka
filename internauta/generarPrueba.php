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
          $link=mysqli_connect("localhost","root","");
          $link->query("SET NAMES 'utf8'");
          mysqli_select_db($link, "eureka");
          $result = mysqli_query($link, "select * from materias");
          $seleccionada="";
          if(isset($_GET['materia'])){
               $seleccionada = $_GET['materia'];
          }
     ?>
     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <!-- lOGO TEXT HERE -->
                    <a href="../index.php#inicio" class="navbar-brand">Eureka</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="../index.php#inicio" class="smoothScroll">Inicio</a></li>
                         <li><a href="#prueba" class="smoothScroll">Generar Prueba</a></li>
                         <li><a href="verEstadisticas.php#estadisticas" class="smoothScroll">Ver estadísticas</a></li>
                         <li><a href="acercaDe.php#acercaDe" class="smoothScroll">Acerca De</a></li>
                    </ul>
               </div>
          </div>
     </section>


     <!-- INICIO -->
     <br><div class="col-md-1"></div>
     <div class="col-md-10">
          <h1>Generar un examen</h1>
     </div>
     <section>
          <div class="container">
               <div class="row">
                    <div class="col-md-5">
                         <div id="informacion">
                              <h4>¡Siguiendo estos sencillos pasos podrás generar un examen personalizado para ti!</h4><br>
                              <figure>
                                   <span><i class="fa fa-check"></i></span>
                                   <figcaption>
                                        <h4>Elige la materia de la cual quieras generar tu prueba.</h4>
                                   </figcaption>
                              </figure>
                              <figure>
                                   <span><i class="fa fa-check"></i></span>
                                   <figcaption>
                                        <h4>Elige la dificultad que desees.</h4>
                                   </figcaption>
                              </figure>
                              <figure>
                                   <span><i class="fa fa-check"></i></span>
                                   <figcaption>
                                        <h4>Ingresa la cantidad de preguntas que quieres en tu prueba.</h4>
                                   </figcaption>
                              </figure>
                              <figure>
                                   <span><i class="fa fa-check"></i></span>
                                   <figcaption>
                                        <h4>Da click en Generar y tu pruebas estará lista para ser respondida.</h4>
                                   </figcaption>
                              </figure>
                              <h4>Recuerda que al no ser usuario de ésta plataforma solamente puedes descargar tu exámen, para poder mandarlo a tu correo y tener acceso a las respuestas correctas deberás <u><a href="registrar.php#registrarse" class="smoothScroll Estilo2">REGISTRARTE</a></u>, no te pierdas de todos los beneficios que Eureka te ofrece.</h4>
                         </div>     
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                         <form role="form" action="mostrarExamen.php" method="post">
                              <div class="col-md-12">
                                   <h2>Materias</h2>
                                   <select name="materias" class="select-css" required>
                                        <option value="">Selecciona la materia</option>
                                        <?php
                                             while($row=mysqli_fetch_array($result)){
                                                  if ($row["materia"]==$seleccionada)
                                                       echo "<option value='$row[id_materia]' selected>$row[materia]</option>";
                                                  else
                                                       echo "<option value='$row[id_materia]'>$row[materia]</option>";
                                             }
                                        ?>
                                   </select>
                              </div>
                              <div class="col-md-12">
                                   <br>                                   
                                   <h2>Nivel</h2>
                                   <select name="nivel" class="select-css" required>
                                        <option value="">Selecciona la dificultad</option>
                                        <option value="1">Basico</option>
                                        <option value="2">Intermedio</option>
                                        <option value="3">Avanzado</option>
                                   </select>
                              </div>
                              <div class="col-md-12">
                                   <br>
                                   <h2>No. de preguntas</h2>
                                   <input type="number" class="input-formularios" name="cantidad" min="2" max="15" required>
                              </div> 
                              <div class="col-md-8"></div>
                              <div class="col-md-4">
                                   <br>
                                   <input type="submit" class="btn-formularios" value="Generar">
                              </div> 
                         </form>
                    </div>
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