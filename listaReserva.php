<?php
include('includes/footer.php');
?>
<?php
include('config/app.php');
include('includes/header.php');
include('includes/navbar.php');
include_once('controllers/ReservarController.php');
?>

<div class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <?php include('message.php')?>
        <div class="card">
          <div class="card-header">
            <h4>Lista de Reservas</h4>
          </div>
          <div class="card-body">
            
            <form action="" method="POST" class="mb-3">
              <label for="searchId">Pesquisar por ID:</label>
              <input type="text" name="searchId" id="searchId" class="form-control">
              <button type="submit" class="btn btn-primary mt-2">Pesquisar</button>
            </form>

            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID:</th>
                    <th>Cod. Vôo:</th>
                    <th>Cliente:</th>
                    <th>Assento:</th>
                    <th>Valor do desconto:</th>
                    <th>Valor Final:</th>
                    <th>Deletar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $reservas = new ReservarController;

                  if (isset($_POST['searchId'])) {
                    $searchId = $_POST['searchId'];
                    $result = $reservas->findById($searchId);

                    if ($result) {
                  ?>
                      <tr>
                        <td><?= $result['idReserva'] ?></td>
                        <td><?= $result['vooId'] ?></td>
                        <td><?= $result['nomeCliente'] ?></td>
                        <td><?= $result['numAssento'] ?></td>
                        <td><?= $result['desconto'] ?></td>
                        <td><?= $result['valorFinal'] ?></td>
                        <td>
                          <form action="codes/reservar_code.php" method="POST">
                            <button type="submit" name="deletarReserva" value="<?= $result['idReserva'] ?>" class="btn btn-danger">Deletar</button>
                          </form>
                        </td>
                      </tr>
                  <?php
                    } else {
                      echo "<tr><td colspan='7'>Nenhum registro encontrado</td></tr>";
                    }
                  } else {
                    $result = $reservas->index();
                    if ($result) {
                      foreach ($result as $row) {
                  ?>
                        <tr>
                          <td><?= $row['idReserva'] ?></td>
                          <td><?= $row['vooId'] ?></td>
                          <td><?= $row['nomeCliente'] ?></td>
                          <td><?= $row['numAssento'] ?></td>
                          <td><?= $row['desconto'] ?></td>
                          <td><?= $row['valorFinal'] ?></td>
                          <td>
                            <form action="codes/reservar_code.php" method="POST">
                              <button type="submit" name="deletarReserva" value="<?= $row['idReserva'] ?>" class="btn btn-danger">Deletar</button>
                            </form>
                          </td>
                        </tr>
                  <?php
                      }
                    } else {
                      echo "<tr><td colspan='7'>Nenhum registro encontrado</td></tr>";
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('includes/footer.php');
?>