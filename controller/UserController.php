<?php

require_once("./view/Usuario.php");
require_once("./model/ModelUser.php");
require_once("./model/ModelServicios.php");

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

    public function showIndex(){
      $view = new Visitante();
      $view->showIndex(isset($_SESSION['user']));
    }

    public function showCarrito(){
      $view = new Usuario();
      if (isset($_SESSION['user'])){
        $servicios=ModelServicios::getInstance()->getServicios();
        $view->showCarrito(true,$servicios);
      }
      else {
        $view->showLogin("");
      }
    }
    public function showPago()
    {
      $view = new Usuario();
      if (isset($_SESSION['user']))
        $view->showPago("");
      else
        $view->showLogin("");

    }
    public function showBackend($session)
    {
      $publicaciones = ModelUser::getInstance()->getServicios();
      $view= new Usuario();
      $view->showBackend($session,$publicaciones);
    }
    public function addCarrito($servicio,$desde,$hasta)
    {
      $producto['desde']=$desde;
      $producto['hasta']=$hasta;
      $producto['indice']=$servicio;
      $_SESSION['productos'][$servicio]=$producto;
      header('location:index.php?action=showCarrito');
    }

    public function showPerfilServicio($servicio)
    {
      $publicacion = ModelServicios::getInstance()->getServicio($servicio);
      $view= new Usuario();
      $view->showPerfilServicio($publicacion);
    }

    public function eliminarDelCarrito($servicio)
    {
      unset($_SESSION['productos'][$_GET['servicio']]);
      header('location:index.php?action=showCarrito');
    }
}
