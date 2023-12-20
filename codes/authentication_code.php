
 <?php
 
 include('../config/app.php');
 include_once('../controllers/RegisterController.php');

  if(isset($_POST['cadastrar-btn'])){
    
    $inputData = [
      'Origem' => validateInput($db->conn,$_POST['origem']),
      'Destino' => validateInput($db->conn,$_POST['destino']),
      'AssentosDisponiveis' => validateInput($db->conn,$_POST['qtdeassentos']),
      'valorPassagem' => validateInput($db->conn,$_POST['valor']),
    ];

    $register = new RegisterController;
    $result = $register->create($inputData);
    
    if($result){
      redirect("Vôo adicionado com sucesso!","/index.php");
    }else{
      redirect("Vôo não foi adicionado","/index.php");
    }
  }
?>