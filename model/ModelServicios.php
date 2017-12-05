<?php
require_once("/opt/lampp/htdocs/taller/model/PDOConnection.php");

class ModelServicios{
  private static $instance;

  function __construct(){
  }

  private function consulta($query){
    $model = new PDOConnection;
    $connection = $model->getConnection();
    $stmt = $connection->prepare($query);
    if ($stmt) {
      $stmt->execute();
      $resultado = $stmt->fetchAll();
         return ($resultado);
    }
  }

  public function getInstance(){
    if(!isset(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
  }
  public function getServicios(){
    $query = "SELECT * FROM servicio";
    return ($this->consulta($query));
  }

  public function getServicio($idServicio)
  {
    $query = "SELECT * FROM servicio WHERE idServicio='$idServicio'";
    return ($this->consulta($query)[0]);
  }
}
