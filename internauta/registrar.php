<?php
	session_start();
	$id = "";
	if(isset($_GET['msg'])){
		$id = $_GET['msg'];
	}

?>
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
<body id="registrarse" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- MENU<a href="../index.php#inicio" class= "navbar-logo" ><img  src="../images/logo.png" alt="Eureka" width="140" height="90" /> </a> -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <!-- lOGO TEXT HERE -->
                    <a href="../index.php#inicio" class="navbar-brand">Eureka</a>
               </div>
             
               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
				     <li><a href="#registrarse" class="smoothScroll">Registrarse</a></li>
                         <li><a href="generarPrueba.php#prueba" class="smoothScroll">Generar Prueba</a></li>
                         <li><a href="verEstadisticas.php#estadisticas" class="smoothScroll">Ver estadísticas</a></li>
                         <li><a href="acercaDe.php#testimonial#acercaDe" class="smoothScroll">Acerca De</a></li>
                                                
                    </ul>
               </div>
          </div>
     </section>


    <section id="about">
          <div class="container">
               <div class="row">
                    <div class="col-md-5 col-sm-12">
                         <div class="entry-form2">
                              <form action="agregarUsuario.php" method="post">
                                   <h2>Registrarse</h2>
                                   <input type="text" name="nombre"  class="form-control" placeholder="Ingresa nombre de usuario" required="">
                                   <input type="email" name="correo" class="form-control" placeholder="Ingresa correo electrónico" required="">
                                   <input type="password" name="contrasenia" minlength="8" maxlength="32" class="form-control" placeholder="Ingresa contraseña" required="">
                                   <input type="password" name="contrasenia_c"minlength="8" maxlength="32" class="form-control" placeholder="Confirma contraseña" required="">
                                   <button class="submit-btn form-control" id="form-submit">Registrarse</button>
                                   <p><a href="../index.php#inicio" >Iniciar Sesión</a></h2>
                                   <h5  style="color:#3f51b5";><?php echo $id; ?> </h5>
								   
                              </form>
                         </div>
                    </div>

			   	<div class="col-md-offset-1 col-md-6 col-sm-12">
                    	<div class="about-info">
                              <h1>Empieza a usar ¡EUREKA!</h1>
                              <figure>            
                                   <figcaption>
                                        <h4>Registrate y disfruta de fantásticas funciones que tenemos preparadas para ti.<br><br>Si te registras tendrás acceso a: </h4>
                                   </figcaption>
                              </figure>
						<figure>
                                   <div class="feature-thumb">
                                   <span>1</span>
                                   <h3>Responder Pruebas.</h3>
                                   <h4>Genera pruebas sobre el nivel y tema que mas te interese. 
                                        Podrás responder la prueba que hayas generado al momento.</h4>
                                   </div>       
                              </figure>
                              <figure>
                                   <div class="feature-thumb">
                                   <span>2</span>
                                   <h3>Envío por Correo electrónico.</h3>
                                   <h4>Una vez que hayas generada la prueba, puedes enviarla a tu correo electronico de una manera sencilla.</h4>
                                   </div>       
                              </figure>
                              <figure>
                                   <div class="feature-thumb">
                                   <span>3</span>
                                   <h3>Ver Estadisticas personalizadas.</h3>
                                   <h4>Nos interesa que aumentes tu nivel de aprendizaje, es por eso que te ofrecemos un análisis de los diferentes resultados de tus pruebas.</h4>
                                   </div>       
                              </figure>
                              <figure>
                                   <div class="feature-thumb">
                                   <span>4</span>
                                   <h3>Libre Acceso a respuestas</h3>
                                   <h4>En Eureka no te limitamos, es por eso que te ofrecemos la oportunidad de conocer las respuestas correctas de tus pruebas.</h4>
                                   </div>       
                              </figure>
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