<?php

require_once("./view/Visitante.php");
require_once("./model/ModelUser.php");


class LoginController {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
      @session_start();
    }

    public function verify($user, $pass)
    {
      if (ModelUser::getInstance()->verificarEmail($user)) {
        if ( ModelUser::getInstance()->verify($user,$pass) ) {
          return 200;
        }else {
          echo "Contraseña Incorrecta";
        }
      }else {
        echo "Email Incorrecto";
      }
    }
}
?>
