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
    case 'iniciarSesion':
      if (isset($_POST['user']) && ($_POST['user']!="") && (isset($_POST['pass'])) && ($_POST['pass']!="")) {
        LoginController::getInstance()->verify($_POST['user'],$_POST['pass']);
      }else {
        UserController::getInstance()->showIndex();
      }
      break;
    case 'showBackend':
      $sesion= "false";
      if (isset($_SESSION['user'])){
        $sesion="true";
      }
      LoginController::getInstance()->showBackend($sesion);
      break;
    case 'destroySession':
      LoginController::getInstance()->destroySession();
      break;
  }
}else {
  UserController::getInstance()->showIndex();
}
?>
