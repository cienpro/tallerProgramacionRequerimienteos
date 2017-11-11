<?php
require_once("./view/TwigView.php");

class Visitante extends TwigView {


  public function showIndex($datos){
      echo self::getTwig()->render('index.html', array('datos' => $datos ));
  }

  public function showIniciarSesion($datos){
      echo self::getTwig()->render('iniciarSesion.html', array('datos' => $datos ));
  }

}
 ?>
