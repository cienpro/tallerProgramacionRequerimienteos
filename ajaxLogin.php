<?php
require_once("./model/ModelUser.php");
if ( isset($_POST['user']) && isset($_POST['pass']) ) {
  if (ModelUser::getInstance()->verificarEmail($_POST['user'])) {
    if ( ModelUser::getInstance()->verify($_POST['user'],$_POST['pass']) ) {
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

?>
