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

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/owl.carousel.css">
     <link rel="stylesheet" href="../css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" type="text/css" href="../css/templatemo-style.css?ts=<?=time()?>"/>

</head>
<body id="inicioUsuario" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     <?php
          session_start();
          if (!$_SESSION['id'] || $_SESSION['tipoUsuario'] != 1){
               header ("Location: ../index.php");
          }
          $link=mysqli_connect("localhost","root","");
          $link->query("SET NAMES 'utf8'");
          mysqli_select_db($link, "eureka");
          $datosUsuario = mysqli_query($link, "select nombre from usuarios where id_usuario=$_SESSION[id]");
          if($row=mysqli_fetch_array($datosUsuario)){
               $nombre = $row['nombre'];
          }else{
               echo "Error en la consulta";
          }
          $result = mysqli_query($link, "select * from materias");
     ?>
     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">
               <div class="navbar-header">
                    <!-- lOGO TEXT HERE -->
                    <a href="inicioUsuario.php#inicioUsuario" class="navbar-brand">Eureka</a>
               </div>
               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#inicioUsuario" class="smoothScroll">Inicio Usuario</a></li>
                         <li><a href="generarPrueba.php#prueba" class="smoothScroll">Generar Prueba</a></li>
                         <li><a href="verEstadisticas.php#estadisticas" class="smoothScroll">Ver estadísticas</a></li>
                         <li><a href="acercaDe.php#acercaDe" class="smoothScroll">Acerca De</a></li>
				     <li><a href="../cerrarSesion.php" class="smoothScroll">Salir</a></li>
                    </ul>
               </div>
          </div>
     </section>
     <!-- INICIO -->
     <div class="col-md-4 col-sm-6"></div>
     <div class="col-md-3 col-sm-6"></div>
     <div class="col-md-5 col-sm-6">
          <br>
          <h3><i><?php echo "Bienvenido: $nombre"; ?></i></h3>
          <br>     
     </div>
     <section id="courses">
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
                                                       <a href='generarPrueba.php?materia=$materia[materia]'><span>Generar Prueba</span></a>
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
     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/owl.carousel.min.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/custom.js"></script>

</body>
</html>