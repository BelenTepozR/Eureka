<!DOCTYPE html>
<html lang="en">
<head>

     <title>¡Eureka!</title>
<!-- 

Known Template 

https://templatemo.com/tm-516-known

-->
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
          ob_start();
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

     <section id="fomulario">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <form id="fomulario-form" role="form" method="post">
                            <?php
                                $id = $_REQUEST['id_pregunta'];
                                $link=mysqli_connect("localhost","root","");
                                $link->query("SET NAMES 'utf8'");
                                mysqli_select_db($link, "eureka");
                                $datos_pregunta =mysqli_fetch_array(mysqli_query($link, "select * from preguntas where id_pregunta = $id"));
                            ?>
                              <div class="section-title">
                                   <h2>Actualizar pregunta<small>Modifica los campos de la pregunta que se muesran a continuación </small></h2>
                                   <h3>ID de la pregunta: <?php echo $datos_pregunta['id_pregunta']?></h3>
                              </div>
                              <table class="col-md-12">
                                   <tr>
                                        <td class="col-md-3"><h3>Materia</h3></td>
                                        <td class="col-md-9 col-sm-12"><select  class="form-control" NAME="materia" id="" required>
                                             <option value="" selected>Seleccionar Materias</option>
                                             <?php
                                                  $result = mysqli_query($link, "select * from materias");
                                                  while ($row=mysqli_fetch_array($result)) {
                                                       $id_materia = $row['id_materia'];
                                                       $materia = $row ['materia'];
                                                       if ($id_materia == $datos_pregunta['id_materia']) {
                                                       echo "<option class='form-control' value='$id_materia' selected>$materia</option>";
                                                       }else
                                                       echo "<option class='form-control' value='$id_materia'>$materia</option>";
                                                  }
                                                  mysqli_free_result($result);
                                                  mysqli_close($link);
                                             ?>
                                        </select></td>
                                   </tr>
                                   <tr>
                                        <td class="col-md-3"><h3>Nivel</h3></td>
                                        <td class="col-md-9 col-sm-12"><select class="form-control" NAME="nivel" id="" required>
                                             <?php
                                             for ($i=1; $i <= 3; $i++) { 
                                                  switch ($i) {
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
                                                  if ($i == $datos_pregunta['nivel']) {
                                                       echo "<option class='form-control' value='$i' selected>$nivel_</option>";
                                                  }else
                                                       echo "<option class='form-control' value='$i'>$nivel_</option>";
                                             }
                                             ?>
                                        </select></td>
                                   </tr>
                                   <tr>
                                        <td class="col-md-3"><h3>Pregunta</h3></td>
                                        <td class="col-md-9 col-sm-12"><textarea type="text" rows="3" class="form-control" NAME="pregunta" ><?php echo $datos_pregunta['pregunta']?></textarea></td>
                                   </tr>
                                   <tr>
                                        <td class="col-md-3"><h3>Opción 1</h3></td>
                                        <td class="col-md-9 col-sm-12"><textarea type="text" rows="3" class="form-control" NAME="respuesta1"><?php echo $datos_pregunta['respuesta1']?></textarea></td>
                                   </tr>
                                   <tr>
                                        <td class="col-md-3"><h3>Opcion 2</h3></td>
                                        <td class="col-md-9 col-sm-12"><textarea type="text" rows="3" class="form-control" NAME="respuesta2"><?php echo $datos_pregunta['respuesta2']?></textarea></td>
                                   </tr>
                                   <tr>
                                        <td class="col-md-3"><h3>Opcion 3</h3></td>
                                        <td class="col-md-9 col-sm-12"><textarea type="text" rows="3" class="form-control" NAME="respuesta3"><?php echo $datos_pregunta['respuesta3']?></textarea></td>
                                   </tr>
                                   <tr>
                                        <td class="col-md-3"><h3>Respuesta correcta</h3></div></td>
                                        <td class="col-md-9 col-sm-12"><textarea type="text" rows="3" class="form-control" NAME="respuesta_correcta"><?php echo $datos_pregunta['respuesta_correcta']?></textarea></td>
                                   </tr>
                              </table>
                              <div class="col-md-4"></div>
                              <div class="col-md-4">
                                   <button type="reset" class="form-control" onclick="location.href='administrarReactivos.php#administrar'"> Cancelar</button>
                              </div>
                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="enviar" value="Envíar modificaciones">
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

     <?php
          $link=mysqli_connect("localhost","root","");
          $link->query("SET NAMES 'utf8'");
          mysqli_select_db($link, "eureka");
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
               $materia_ = $_REQUEST['materia'];
               $nivel_ = $_REQUEST['nivel'];
               $pregunta_ = $_REQUEST['pregunta'];
               $respuesta1_ = $_REQUEST['respuesta1'];
               $respuesta2_ = $_REQUEST['respuesta2'];
               $respuesta3_ = $_REQUEST['respuesta3'];
               $respuesta_correcta_ = $_REQUEST['respuesta_correcta'];
               $id_materia = mysqli_fetch_array(mysqli_query($link, "select id_materia from materias where materia = $materia_"));
          
               $consulta = "UPDATE preguntas SET id_materia = '$materia_', nivel = '$nivel_' ,
               pregunta = '$pregunta_', respuesta1 = '$respuesta1_', respuesta2 = '$respuesta2_',
               respuesta3 = '$respuesta3_', respuesta_correcta = '$respuesta_correcta_' 
               WHERE id_pregunta = '$id'";
               mysqli_query($link,$consulta);
               header("Location: administrarReactivos.php"); 
          }
     ?>
     <!-- SCRIPTS -->
     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/owl.carousel.min.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/custom.js"></script>
     <script src="../js/javaScript.js"></script>

</body>
</html>