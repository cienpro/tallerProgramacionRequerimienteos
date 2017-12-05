<?php
require_once("./model/ModelUser.php");
if ( isset($_POST['user']) && ($_POST['user'])!=0 && isset($_POST['pass']) && ($_POST['pass'])!=0 ) {
  if (ModelUser::getInstance()->verificarEmail($user)) {
    if ( ModelUser::getInstance()->verify($user,$pass) ) {
      echo 'inicio';
    }else {
      echo 'password';
    }
  }else {
    echo 'usuario';
  }
}

?>
