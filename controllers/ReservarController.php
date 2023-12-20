<?php

class ReservarController {
    public $conn;

    public function __construct() {
        $db = DatabaseConnection::getInstance();
        $this->conn = $db->conn;
    }

    public function create($inputData) {
        if (isset($inputData['numAssento']) && isset($inputData['vooId'])) {
            $numAssento = validateInput($this->conn, $inputData['numAssento']);
            $vooId = $inputData['vooId'];
            $nomeCliente = $inputData['nome_cliente']; // Verifique se o nome do cliente está correto

            // Insere a reserva no banco de dados
            $reserva_query = "INSERT INTO Reserva (vooId, nomeCliente, numAssento) VALUES ('$vooId', '$nomeCliente', '$numAssento')";
            $result = $this->conn->query($reserva_query);
    
            if ($result) {
                $lastInsertId = $this->conn->insert_id; // Get the last inserted ID
    
                // Calculate discount and update final value
                $discount = $this->calculateDiscount($vooId);
                $valorPassagem = $this->getValorPassagem($vooId);
                $finalValue = $valorPassagem * (1 - $discount);
    
                // Update the discount and final value in the last inserted reservation
                $updateQuery = "UPDATE Reserva SET desconto = $discount, valorFinal = $finalValue WHERE idReserva = $lastInsertId";
                $this->conn->query($updateQuery);
    
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    
    
    
  
  public function getValorPassagem($flightId) {
    $query = "SELECT ValorPassagem FROM Voo WHERE idVoo = $flightId";
    $result = $this->conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['ValorPassagem'];
    } else {
        return 0; // or any default value based on your application logic
    }
}

    public function index() {
        $reserva_query = "SELECT * FROM reserva";
        $result = $this->conn->query($reserva_query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $reserva_id = validateInput($this->conn, $id);
        $reservaDeleteQuery = "DELETE FROM reserva WHERE idReserva='$reserva_id' LIMIT 1";
        $result = $this->conn->query($reservaDeleteQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function cancelReservation($reservationId) {
        // Get the flight ID for the canceled reservation
        $flightIdQuery = "SELECT vooId FROM reserva WHERE idReserva = $reservationId";

        $result = $this->conn->query($flightIdQuery);
        $row = $result->fetch_assoc();
        $flightId = $row['Voo_idVoo'];

        // Delete the reservation
        $deleteQuery = "DELETE FROM reserva WHERE idReserva = $reservationId";
        $this->conn->query($deleteQuery);

        // Calculate discount for the next reservation
        $this->updateDiscount($flightId);
    }

    public function updateDiscount($flightId) {
        $discount = $this->calculateDiscount($flightId);

        // Update discount and finalValue in the last inserted reservation
        $updateQuery = "UPDATE reserva SET desconto = $discount WHERE idReserva = LAST_INSERT_ID()";
        $this->conn->query($updateQuery);
    }

    public function calculateDiscount($flightId) {
        // Count the number of reservations for the given flight
        $countQuery = "SELECT COUNT(*) AS num_reservations FROM reserva WHERE vooId = $flightId";
        $result = $this->conn->query($countQuery);
        $row = $result->fetch_assoc();
        $numReservations = $row['num_reservations'];

        // Calculate discount based on the number of reservations
        if ($numReservations == 1) {
            return 0.25; // 25% discount
        } elseif ($numReservations == 2) {
            return 0.15; // 15% discount
        } elseif ($numReservations == 3) {
            return 0.05; // 5% discount
        } else {
            return 0; // No discount
        }
    }

    public function findById($id) {
        $id = validateInput($this->conn, $id);
        $query = "SELECT * FROM reserva WHERE idReserva = $id";
        $result = $this->conn->query($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    

    
}
?>
