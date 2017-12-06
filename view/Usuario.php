<?php
require_once("./view/TwigView.php");

class Usuario extends TwigView {

  public function showLogin($datos){
      echo self::getTwig()->render('login.html.twigs', array('datos' => $datos ));
  }

  public function showBackend($session,$publicaciones){
      //acá estaba el ERROR, dentro de render crearbas un array que en la posicion datos tenía a $datos, entonces era un array con el array de los datos.. y en backend era una paja, ahora es solo un arreglo con las 2 posiciones..
      $datos = array();
      $datos['session']=$session;
      $datos['publicaciones']=$publicaciones;
      echo self::getTwig()->render('backend.html.twig',$datos);
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
