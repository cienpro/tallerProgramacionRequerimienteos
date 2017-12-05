<?php
require_once("/opt/lampp/htdocs/taller/view/TwigView.php");
require_once("/opt/lampp/htdocs/taller/model/ModelServicios.php");


class Visitante extends TwigView {


  public function showIndex($session){
      echo self::getTwig()->render('index.html.twig', array('session' => $session ));
  }

  public function showLogin($datos){
      echo self::getTwig()->render('login.html.twig', array('datos' => $datos ));
  }

  public function showBackend($sesion){
      $datos = array();
      $datos['session']=$sesion;
      $datos['servicios']=modelServicios::getInstance()->getServicios();
      var_dump($datos);
      echo self::getTwig()->render('backend.html.twig',$datos);
  }

}
 ?>
