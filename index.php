<?php
require_once("./view/Visitante.php");
require_once("./controller/LoginController.php");
require_once("./controller/UserController.php");


if (!isset($_SESSION)) {
  session_start();
}

if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'showLogin':
      $view = new Visitante();
      $view->showLogin("");
      break;
    case 'showBackend':
      LoginController::getInstance()->showBackend( isset($_SESSION['user']) );
      break;
    case 'showCarrito':
      UserController::getInstance()->showCarrito();
      break;
    case 'showPago':
      if (isset($_SESSION['user'])) {
        UserController::getInstance()->showPago();
      }else {
        echo "no está seteado un monto";
      }
      break;
    case 'destroySession':
      LoginController::getInstance()->destroySession();
      break;
  }
}else {
  UserController::getInstance()->showIndex();
}
?>
