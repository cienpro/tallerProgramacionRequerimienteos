<?php
require_once("./view/TwigView.php");

class Visitante extends TwigView {


  public function showIndex($session){
      echo self::getTwig()->render('index.html', array('session' => $session ));
  }

  public function showLogin($datos){
      echo self::getTwig()->render('login.html', array('datos' => $datos ));
  }

  public function showBackend($sesion){
      $datos['session']=$sesion;
      echo self::getTwig()->render('backend.html.twig',array('datos' => $datos ));
  }

}
 ?>
