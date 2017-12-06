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

  // public function addCompra($productos,$idUser)
  // {
  //
  //   $model = new PDOConnection;
  //   $connection = $model->getConnection();
  //   $connection->beginTransaction();
  //   $queryDemograficos = "INSERT INTO compra (idCompra,idUsuario,fechaInicio,fechaFin,totalCosto) VALUES (NULL,'$idUser','$productos[1]['desde']','$productos[1]['hasta']','$productos[1]['total']')";
  //   $stmt = $connection->prepare($queryDemograficos);
  //   $stmt->execute();
  //   $ultimos_datos = $connection->lastInsertId();
  //
  //   foreach ($productos as $each){
  //   if ($each['total'] == NULL) {
  //   $query = "INSERT INTO compraTieneServicio (idCompra,idServicio) VALUES ('$ultimos_datos','$each['indice']')";
  //   $stmt2 = $connection->prepare($query);
  //   $stmt2->execute();
  //     }
  //   }
  //   $connection->commit();
  // }

  public function getServicio($idServicio)
  {
    $query = "SELECT * FROM servicio WHERE idServicio='$idServicio'";
    return ($this->consulta($query)[0]);
  }

  public function getHabitaciones($idServicio)
  {
    $query = "SELECT nombre FROM Habitacion INNER JOIN servicioTieneHabitacion ON Habitacion.idTipoHabitacion = servicioTieneHabitacion.idTipoHabitacion WHERE idServicio='$idServicio'";
    return ($this->consulta($query));
  }

}
