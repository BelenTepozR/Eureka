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
<body id="estadisticas" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     <?php
          session_start();
          if (!$_SESSION['id'] || $_SESSION['tipoUsuario'] != 0){
               header ("Location: ../index.php");
          }
     ?>
     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <!-- lOGO TEXT HERE -->
                    <a href="administrarReactivos.php#administrar" class="navbar-brand">Eureka</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="administrarReactivos.php#administrar" class="smoothScroll">Administrar reactivos</a></li>
                         <li><a href="administrarMaterias.php#administrarM" class="smoothScroll">Administrar materias</a></li>
                         <li><a href="#estadisticas" class="smoothScroll">Ver estadísticas</a></li>
                         <li><a href="acercaDe.php#acercaDe" class="smoothScroll">Acerca De</a></li>
					<li><a href="../cerrarSesion.php" class="smoothScroll">Salir</a></li>
                    </ul>
               </div>
          </div>
     </section>


     <!-- INICIO -->
     <section>
          <div class="container">
               <div class="row">
					<h2>En ésta sección el Administrador puede ver las estadísticas del sistema y 
                              las estadisticas de cada uno de los usuarios del sistema</h2>
					<br>
					<h3>La pantalla se muestra al Administrador.</h3>
					<h3>El Administrador puede ver las gráficas de los temas más solicitados.</h3>
					<h3>El Administrador puede ver la cantidad de pruebas generadas por el sistema especificando 
                              en cada una de ellas los temas y los niveles</h3>
					<h3>El Administrador puede ver los temas es los que mas ha fallado.</h3>
					<h3>El Administrador puede ver los resultados de las diferentes pruebas que ha realizado.</h3>
                         <h3>El administrador puede ver estadisticas de los temas por dificultad</h3>
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