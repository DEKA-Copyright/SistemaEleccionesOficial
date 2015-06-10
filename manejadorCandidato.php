<?php session_start(); ?>
<?php 
    if (isset($_SESSION['usuario'])) {
        
    

 ?>
<html>
    <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
    <script src="./libs/jquery-2.1.0.js"></script>
    <link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
    <script src="./libs/validacion/jquery.validate.min.js"></script>
    <script src="./libs/validacion/messages.js"></script>
    <script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    </head>
    <body>
<?php
include './clases/Coneccion.php';
include './clases/candidato.php';
include './clases/candidatoControlador.php';

$alumnoA = new CandidatoControlador();

$accion= $_REQUEST['accion'];
switch ($accion) {
    case 'save':
        if(isset($_REQUEST['bot'])){
           $alumnoA->setId('NULL');
           $alumnoA->setDui($_REQUEST['dui']);
           $alumnoA->setApellido($_REQUEST['apellido']);
           $alumnoA->setNombre($_REQUEST['nombre']);
           $alumnoA->setDepa($_REQUEST['depa']);
           $alumnoA->setMuni($_REQUEST['muni']);
           $alumnoA->setOpcion($_REQUEST['opcion']);
           $alumnoA->setPartidario($_REQUEST['partidario']);
           $alumnoA->setDepas($_REQUEST['depas']);
           $alumnoA->setMunis($_REQUEST['munis']);
           $alumnoA->setCargo($_REQUEST['cargo']);
           $datosObj=array($alumnoA->getId(),
                           $alumnoA->getDui(),
                           $alumnoA->getApellido(),
                           $alumnoA->getNombre(),
                           $alumnoA->getDepa(),
                           $alumnoA->getMuni(),
                           $alumnoA->getOpcion(),
                           $alumnoA->getPartidario(),
                           $alumnoA->getDepas(),
                           $alumnoA->getMunis(),
                           $alumnoA->getCargo());
           print $alumnoA->guardarDatos($con,$datosObj);
           print '<a href=\'manejadorCandidato.php?accion=con\'>Ver datos</a>';
       }else{
           print 'No se ha enviado datos ';
       }
        break;
    case 'con':        
        $sql = 'SELECT * FROM candidato';
        $datoss =  consultaD($con, $sql);

        print imprimetabla($datoss,"candidato","table table-bordered table-striped",1);
        break;
        default:
        print 'No hay Accion que realizar';
        break;
      }
 ?> 
 
 <center><a href="menu.php">Menu Principal</a></center> 
     </body>
</html>
 <?php }else{
    header("Location:index.php");
 } ?>