<?php

require_once("./view/Visitante.php");

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

    public function showIniciarSesion()
    {
      $view = new Visitante();
      $view->showIndex("");
    }
}
?>
