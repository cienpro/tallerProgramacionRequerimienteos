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
      UserController::getInstance()->showBackend(isset($_SESSION['user']));
      break;
    case 'showCarrito':
      UserController::getInstance()->showCarrito();
      break;
    // case 'agregarCompra':
    //   UserController::getInstance()->addCompra($_GET['total']);
    //   break;
    case 'showPago':
      if (isset($_SESSION['user'])) {
        UserController::getInstance()->showPago();
      }else {
        echo "no está seteado un monto";
      }
      break;
    case 'showPerfilServicio':
      if (isset($_GET['servicio'])) {
        UserController::getInstance()->showPerfilServicio($_GET['servicio']);
      }
      break;
    case 'destroySession':
      LoginController::getInstance()->destroySession();
      break;
    case 'agregarCarrito':
      if (isset($_SESSION['user']) && isset($_GET['servicio'])){
        UserController::getInstance()->addCarrito($_GET['servicio'],$_POST['desde'],$_POST['hasta'],$_POST['habitacion']);
      }
      break;
    case 'eliminarDelCarrito':
    if (isset($_SESSION['user']) && isset($_GET['servicio'])){
      UserController::getInstance()->eliminarDelCarrito($_GET['servicio']);
    }
      break;
    }
}else {
  UserController::getInstance()->showIndex();
}
?>
