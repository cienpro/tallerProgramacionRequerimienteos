<?php
require_once("./view/TwigView.php");

class Usuario extends TwigView {

  public function showLogin($datos){
      echo self::getTwig()->render('login.html.twigs', array('datos' => $datos ));
  }

  public function showCarrito($sesion){
      $datos['session']=$sesion;
      echo self::getTwig()->render('carrito.html.twig',array('datos' => $datos ));
  }
  public function showPago($monto){
    if (isset($_SESSION['user'])) {
      $datos = array('session' => true,'monto' => $monto);
    }
    echo self::getTwig()->render('pagar.html.twig',$datos);
  }
}
?>
