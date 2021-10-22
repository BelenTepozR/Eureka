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
    $consulta = "select * from materias;";
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
<body id="administrarM" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     
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
                         <li><a href="#administrarM" class="smoothScroll">Administrar materias</a></li>                         
                         <li><a href="verEstadisticas.php#estadisticas" class="smoothScroll">Ver estadísticas</a></li>
                         <li><a href="acercaDe.php#acercaDe" class="smoothScroll">Acerca De</a></li>
					<li><a href="../cerrarSesion.php" class="smoothScroll">Salir</a></li>
                    </ul>
               </div>
          </div>
     </section>


     <!-- FORMULARIO -->
     <section id="fomulario">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <form id="fomulario-form" role="form" method="post">
                            <?php
                                $id = $_REQUEST['id_materia'];
                                $link=mysqli_connect("localhost","root","");
                                $link->query("SET NAMES 'utf8'");
                                mysqli_select_db($link, "eureka");
                                $datos_materia =mysqli_fetch_array(mysqli_query($link, "select * from materias where id_materia = $id"));
                            ?>
                              <div class="section-title">
                                   <h2>Actualizar materia<small>Modifica los campos de la materia que se muestran a continuación </small></h2>
                                   <h3>ID de la materia: <?php echo $datos_materia['id_materia']?></h3>
                              </div>
                              <table class="col-md-12">
                                   <tr>
                                        <td class="col-md-3">
                                             <h3>Nombre de la materia</h3>
                                        </td>
                                        <td class="col-md-9 col-sm-12">
                                             <input type="text" class="form-control" NAME="materia" value="<?php echo $datos_materia['materia']?>">
                                        </td>
                                   </tr>
                                   <tr>
                                        <td class="col-md-3">
                                                  <h3>URL de la imagen</h3>
                                        </td>
                                        <td class="col-md-9 col-sm-12">
                                                  <input type="text" rows="2" class="form-control" NAME="url" value="<?php echo $datos_materia['imagen']?>">
                                        </td>
                                   </tr>
                              </table>
                              <div class="col-md-4"></div>
                              <div class="col-md-4">
                                   <button type="reset" class="form-control" onclick="location.href='administrarMaterias.php#administrarM'"> Cancelar</button>
                              </div>
                              <div class="col-md-4">
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
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $materia = $_REQUEST['materia'];
          $imagen = $_REQUEST['url'];
          $resultado = mysqli_query($link, "select * from materias where materia = '$materia'");

          if ($row = mysqli_fetch_array($resultado)){
               if ($row['id_materia'] != $id)
                    echo "<script> alert('La materia $materia ya se encuentra en la base de datos');</script>";
               else{
                    $consulta = "update materias set materia = '$materia', imagen = '$imagen' where id_materia = '$id'";
                    mysqli_query($link,$consulta);
                    header('Location: administrarMaterias.php');
               }
          }else{
               $consulta = "update materias set materia = '$materia', imagen = '$imagen' where id_materia = '$id'";
               mysqli_query($link,$consulta);
               header('Location: administrarMaterias.php');
          }
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