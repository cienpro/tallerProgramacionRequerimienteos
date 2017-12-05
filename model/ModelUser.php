<?php
require_once("model/PDOConnection.php");

class ModelUser{
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

  public function verify($email, $password){
    $model = new PDOConnection();
    $connection = $model->getConnection();
    $query = "SELECT * FROM usuario WHERE mail =:mail AND password=:pass";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':mail',$email);
    $stmt->bindParam(':pass',$password);
    if($stmt){
      $stmt->execute();
      return ( $stmt->rowCount() != 0 );
    }
  }

  public function verificarEmail($email)
  {
    $model = new PDOConnection();
    $connection = $model -> getConnection();
    $query = "SELECT * FROM usuario WHERE mail = :mail";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':mail',$email);
    $stmt->execute();
    return ($stmt->rowCount() != 0 );
  }



}


?>
