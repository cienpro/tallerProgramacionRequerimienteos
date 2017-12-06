<?php
require_once("../model/ModelUser.php");
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_GET['iniciar'])) {

  if ( isset($_POST['user']) && isset($_POST['pass']) ) {
    if (ModelUser::getInstance()->verificarEmail($_POST['user'])) {
      if ( ModelUser::getInstance()->verify($_POST['user'],$_POST['pass']) ) {
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['productos']=array();
        echo 'inicio';
      }else {
        echo 'password';
      }
    }else {
      echo 'usuario';
    }
  }else {
    echo 'datosError';
  }
}
?>
