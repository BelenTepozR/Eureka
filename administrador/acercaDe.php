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
<body id="acercaDe" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
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
                         <li><a href="verEstadisticas.php#estadisticas" class="smoothScroll">Ver estadísticas</a></li>
                         <li><a href="#acercaDe" class="smoothScroll">Acerca De</a></li>
					<li><a href="../cerrarSesion.php" class="smoothScroll">Salir</a></li>
                    </ul>
               </div>
          </div>
     </section>
     <!-- INICIO -->
     <section id="team">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>¿Quiénes somos?<small>Culpa anim laboris sunt cupidatat consectetur dolor quis incididunt in commodo pariatur magna reprehenderit dolore.Fugiat laboris consectetur magna laborum ad elit fugiat ipsum aliqua duis adipisicing dolore.</small></h2>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Colaboradores</h2>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb">
                              <div class="team-image">
                                   <img src="../images/Lizbeth.jpg" class="img-responsive" alt="">
                              </div>
                              <div class="team-info">
                                   <h3 class = "Estilo2">Lizbeth Ramos</h3>
                                   <span>Ingeniera en Ciencias de la Computación</span>
                              </div>
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-github"></a></li>
                                   <li><a href="#" class="fa fa-facebook"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-envelope-o"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb">
                              <div class="team-image">
                                   <img src="../images/Belen.jpg" class="img-responsive" alt="">
                              </div>
                              <div class="team-info">
                                   <h3 class = "Estilo2">Belen Tepoz</h3>
                                   <span>Ingeniera en Ciencias de la Computación</span>
                              </div>
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-github"></a></li>
                                   <li><a href="#" class="fa fa-facebook"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-envelope-o"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb">
                              <div class="team-image">
                                   <img src="../images/Ricardo_2.jpg" class="img-responsive" alt="">
                              </div>
                              <div class="team-info">
                                   <h3 class = "Estilo2">Ricardo García</h3>
                                   <span>Ingeniero en Ciencias de la Computación</span>
                              </div>
                              <ul class="social-icon">
                                   <li><a target="_blank" href="https://github.com/Ricardo-gc" class="fa fa-github"></a></li>
                                   <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100027714413051" class="fa fa-facebook"></a></li>
                                   <li><a target="_blank" href="https://twitter.com/RGarcruz" class="fa fa-twitter "></a></li>
                                   <li><a target="_blank" href="mailto:ricardo.garcruz@gmail.com" class="fa fa-envelope-o"></a></li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     
     <!-- Contactanos-->
     <section id="contact">
          <div class="container">
               <div class="row">
                    <div class="col-md-6 col-sm-12">
                         <form id="contact-form" role="form" action="" method="post">
                              <div class="section-title">
                                   <h2>Comentarios<small>Deja tus sugerencias a continuación</small></h2>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" placeholder="Nombre Completo" name="name" required="">
                                   <input type="email" class="form-control" placeholder="Dirección de correo" name="email" required="">
                                   <textarea class="form-control" rows="6" placeholder="Deja tu mensaje" name="message" required=""></textarea>
                              </div>
                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="enviar mensaje" value="Send Message">
                              </div>
                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="../images/contact-image.jpg" class="img-responsive" alt="Smiling Two Girls">
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
     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/owl.carousel.min.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/custom.js"></script>

</body>
</html>