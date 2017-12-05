<?php

require_once("./view/Visitante.php");
require_once("./model/ModelUser.php");

if (!isset($_SESSION)) {
  session_start();
}

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

    public function showBackend($sesion)
    {
      $view= new Visitante();
      $view->showBackend($sesion);
    }

  public function destroySession()
  {
    session_destroy();
    $view= new Visitante();
    $view->showIndex("");

  }
}
?>
