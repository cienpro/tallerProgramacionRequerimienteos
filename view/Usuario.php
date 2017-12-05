<?php
require_once("./view/TwigView.php");

class Usuario extends TwigView {


  public function showIndex($datos){
      echo self::getTwig()->render('index.html', array('datos' => $datos ));
  }

  public function showLogin($datos){
      echo self::getTwig()->render('login.html', array('datos' => $datos ));
  }

  public function showBackend($sesion,$publicaciones){
      $datos['session']=$sesion;
      $datos['publicaciones']=$publicaciones;
      echo self::getTwig()->render('backend.html.twig',array('datos' => $datos ));
  }

}
?>
