<?php
     if(isset($_GET['t'])){
		$consulta = $_GET['t'];
	} else {
          $consulta = "select * from preguntas;";
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>¡Eureka!</title>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
<body id="administrar" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     
     <?php
          session_start();
          if (!$_SESSION['id'] || $_SESSION['tipoUsuario'] != 0){
               header ("Location: ../index.php");
          }
          $link=mysqli_connect("localhost","root","");
          $link->query("SET NAMES 'utf8'");
          mysqli_select_db($link, "eureka");
          $result = mysqli_query($link, "select nombre from usuarios where id_usuario=$_SESSION[id]");
          if($row=mysqli_fetch_array($result)){
               $nombre = $row['nombre'];
          }else{
               echo "Error en la consulta";
          }
     ?>
     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">
               <div class="navbar-header">
                    <!-- lOGO TEXT HERE -->
                    <a href="#administrar" class="navbar-brand">Eureka</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#administrar" class="smoothScroll">Administrar reactivos</a></li>
                         <li><a href="administrarMaterias.php#administrarM" class="smoothScroll">Administrar materias</a></li>
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
          <div class="item">
               <div class="tst-image">
                    <img src="../images/admin.png" class="img-responsive" alt="admin">
               </div>
               <div class="tst-author">
                    <h3 class = "Estilo2"><?php echo "$nombre"; ?></h3>
                    <span><?php echo "Administrador."; ?></span>
               </div>
              
          </div>
     </div>
     <section>
          <div class="col-md-9"></div>
          <div class="col-md-3" id="informacion1">
               <figure>
                    <span><a href="agregarPreguntas.php"><i class="fa fa-plus"></i></a></span>
                    <figcaption>
                         <h4>Agregar pregunta.</h4>
                    </figcaption>
               </figure>
          </div>
          <div class="container">
               <form class="form" action='consulta.php' method='POST'>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                         <div>
                              <select  class="select-css" name="materia" id="" required>
                                   <option value="">Seleccionar Materias</option>
                                   <option value="-1">Todas las materias</option>
                                   <?php
                                        $link=mysqli_connect("localhost","root","");
                                        $link->query("SET NAMES 'utf8'");
                                        mysqli_select_db($link, "eureka");
                                        $result = mysqli_query($link, "select * from materias");
                                        while ($row=mysqli_fetch_array($result)) {
                                             $id_materia = $row['id_materia'];
                                             $materia = $row ['materia'];
                                             echo "<option class='form-control' value='$id_materia'>$materia</option>";
                                        }
                                        mysqli_free_result($result);
                                        mysqli_close($link);
                                   ?>
                              </select>

                         </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                         <div>
                              <select class="select-css" name="nivel" id="" required>
                                   <option value="">Seleccionar nivel</option>
                                   <option value="-1">Todos los niveles</option>
                                   <option value="1">Básico</option>
                                   <option value="2">Intermedio</option>
                                   <option value="3">Avanzado</option>
                              </select>
                         </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1 "> 
                         <button class="btn-formularios" id="form-submit">Filtrar</button>
                    </div>
               </form>
               <div class="col-md-12" id="informacion1">
                    <table class="table">
                         <div class="col-md-12">
                              <div class="col-md-1">
                                   <th>ID</th>
                              </div>
                              <div class="col-md-1">
                                   <th>Materia y Nivel</th>
                              </div>
                              <div class="col-md-2">
                                   <th>Pregunta</th>
                              </div>
                              <div class="col-md-2">
                                   <th>Opción 1</th>
                              </div>
                              <div class="col-md-2">
                                   <th>Opción 2</th>
                              </div>
                              <div class="col-md-2">
                                   <th>Opción 3</th>
                              </div>
                              <div class="col-md-2">
                                   <th>Respuesta</th>
                              </div>
                              <div class="col-md-1">
                                   <th>Eliminar Pregunta</th>
                              </div>
                              <div class="col-md-1">
                                   <th>Modificar Pregunta</th>
                              </div>
                         </div>
                         <?php
                         $link=mysqli_connect("localhost","root","");
                         $link->query("SET NAMES 'utf8'");
                         mysqli_select_db($link, "eureka");
                         $result = mysqli_query($link, $consulta);
                         echo "<br>";
                         while($row=mysqli_fetch_array($result)){
                              if ($row['pregunta_activa'] == 1) {
                                   $id_pregunta=$row['id_pregunta'];
                                   $id_materia=$row['id_materia'];
                                   $nivel=$row['nivel'];
                                   $pregunta=$row['pregunta'];
                                   $respuesta_1 = $row['respuesta1'];
                                   $respuesta_2 = $row['respuesta2'];
                                   $respuesta_3 = $row['respuesta3'];
                                   $respuesta_correcta=$row['respuesta_correcta'];
                                   $row2 = mysqli_fetch_array(mysqli_query($link, "select materia from materias where id_materia = $id_materia"));
                                   switch ($nivel) {
                                        case '1':
                                             $nivel_ = "Básico";
                                             break;
                                        case '2':
                                             $nivel_ = "Intermedio";
                                             break;
                                        case '3':
                                             $nivel_ = "Avanzado";
                                             break;
                                        default:
                                             $nivel_ = "No asignado";
                                             break;
                                   }
                                   echo "
                                        <tr><td>$id_pregunta</td>
                                        <td>$row2[materia] - <b>$nivel_</b></b></td>
                                        <td>$pregunta</td>
                                        <td>$respuesta_1</td>
                                        <td>$respuesta_2</td>
                                        <td>$respuesta_3</td>
                                        <td>$respuesta_correcta</td>
                                        <td>
                                             <figure>
                                                  <span><a onclick=\"return confirmarAccion('¿Seguro que quieres eliminar la pregunta $pregunta?')\"href=\"eliminarPregunta.php?id_pregunta=$id_pregunta\"><i class='fa fa-remove'></i></a></span>
                                             </figure>
                                        </td>
                                        <td>
                                             <figure>
                                                  <span><a href='actualizarPreguntas.php?id_pregunta=$id_pregunta'><i class='fa fa-refresh'></i></a></span>
                                             </figure>
                                        </td>
                                        </tr> ";
                              }
                         } 
                         mysqli_free_result($result);
                         mysqli_close($link); 
                         ?>
                    </table>
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
     <script src="../js/javaScript.js"></script>

</body>
</html>