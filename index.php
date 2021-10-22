<?php
	session_start();
	$id =5;
	if(isset($_GET['t'])){
		$id = $_GET['t'];
	}
     $link=mysqli_connect("localhost","root","");
     $link->query("SET NAMES 'utf8'");
     mysqli_select_db($link, "eureka");
     $result = mysqli_query($link, "select * from materias");
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>¡Eureka!</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" type="text/css" href="css/templatemo-style.css?ts=<?=time()?>"/>
     
</head>
<body  onLoad="myOnLoad(<?php echo $id; ?>)" id="inicio" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <!-- lOGO TEXT HERE -->
                    <a href="index.php#inicio" class="navbar-brand">Eureka</a>
               </div>
               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#inicio" class="smoothScroll">Inicio</a></li>
                         <li><a href="internauta/generarPrueba.php#prueba" class="smoothScroll">Generar Prueba</a></li>
                         <li><a href="internauta/verEstadisticas.php#estadisticas" class="smoothScroll">Ver estadísticas</a></li>
                         <li><a href="internauta/acercaDe.php#acercaDe" class="smoothScroll">Acerca De</a></li>
                    </ul>
               </div>
          </div>
     </section>

     <!-- INICIO -->
     <section id="informacion">
          <div class="container">
               <div class="row">
			   		<div class="col-md-6 col-sm-12">
                    	<div class="about-info">
							<h1>Bienvenido ¡EUREKA!</h1>
							<figure>
                                   <span><i class="fa fa-university"></i></span>
                                   <figcaption>
                                        <h4>Eureka es una plataforma de educación para nivel superior donde podrás 
								 poner a prueba tus habilidades.</h4>
                                   </figcaption>
                           </figure>
						   	<figure>
                                   <span><i class="fa fa-file"></i></span>
                                   <figcaption>
                                        <h4>En Eureka podrás generar pruebas personalizadas de acuerdo a tus necesidades
								 y nivel de conocimiento en el área de tu interes.</h4>
                                   </figcaption>
                           </figure>
						   	<figure>
                                   <span><i class="fa fa-user"></i></span>
                                   <figcaption>
                                        <h4>Te invitamos a registrarte para poder disfrutar de la totalidad de funciones 
								 que Eureka ofrece.</h4>
                                   </figcaption>
                           </figure>
                         </div>
                    </div>

                    <div class="col-md-offset-1 col-md-4 col-sm-12">
                         <div class="entry-form">
                              <form action="iniciarSesion.php" method="post">
                                   <h2>Iniciar Sesión</h2>
                                   <input type="email" name="correo" class="form-control" placeholder="Ingresa tu correo electrónico" required="">

                                   <input type="password" name="contrasenia" class="form-control" placeholder="Ingresa tu contraseña" required="">

                                   <button class="submit-btn form-control" id="form-submit">Ingresar</button>
							<p><a href="internauta/registrar.php#registrarse" class="smoothScroll Estilo1">Registrarse</a></p>
							<p style="font-size:1.5vw;" id="pError"> </p>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <section id="courses" class="sectionInicio">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Examenes personalizados <small>Puedes generar examenes de la materia de tu preferencia y la cantidad de reactivos que necesites, ¡Comencemos!<br>Consulta tus avances dentro de la plataforma en la pestaña ver estadísticas</small></h2>
                         </div>
                         <div class="owl-carousel owl-theme owl-courses">
                              <?php
                                   while ($materia=mysqli_fetch_array($result)) {
                                        echo"
                                             <div class='col-md-4 col-sm-4'>
                                                  <div class='item'>
                                                       <div class='courses-thumb'>
                                                            <div class='courses-top'>
                                                                 <div class='courses-image'>
                                                                      <img src=$materia[imagen] class='img-responsive tamanio' alt=$materia[materia]>
                                                                 </div>
                                                                 <div class='courses-date'>";
                                                                      $pruebasRespondidas = mysqli_fetch_array(mysqli_query($link, "select count(*) as total from examenes where puntaje != -1"));
                                                                      $pruebasAprobadas = mysqli_fetch_array(mysqli_query($link,  "select count(*) as aprobados from examenes where puntaje > 5"));
                                                                      echo "
                                                                      <span><i class='fa fa-bar-chart'></i>$pruebasRespondidas[total] pruebas respondidas en el mundo</span>
                                                                      <span><i class='fa fa-check'></i>$pruebasAprobadas[aprobados] pruebas aprobadas en el mundo</span>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class='courses-detail'>
                                                       <h3 class='Estilo2'>$materia[materia]</h3>
                                                  </div>
                                                  <div class='courses-price'>
                                                       <a href='internauta/generarPrueba.php?materia=$materia[materia]'><span>Generar Prueba</span></a>
                                                  </div>
                                             </div>
                                        ";
                                   }
                              ?>
                         </div>
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
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
     <script src="js/javaScript.js"></script>

</body>
</html>