
<?php

class RegisterController{
  public $conn;
  public function __construct(){
    $db = DatabaseConnection::getInstance();
    $this->conn = $db->conn;
  }
  public function create($inputData){
    $data = "'". implode("','", $inputData) ."'";
    $register_query = "INSERT INTO voo (Origem,Destino,AssentosDisponiveis,ValorPassagem) VALUES ($data)";
    $result = $this->conn->query($register_query);

    if($result){
      return true;
    }else{
      return false;
    }
  }

  
}



?>
