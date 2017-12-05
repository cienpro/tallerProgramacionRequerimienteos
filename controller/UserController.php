<?php

require_once("./view/Usuario.php");
require_once("./model/ModelUser.php");

if (!isset($_SESSION)) {
  session_start();
}

class UserController {

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

    public function showIndex()
    {
      $view = new Visitante();
      $view->showIndex(isset($_SESSION['user']));
    }
}
