<?php
include('config/app.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <h4>Vender Reserva</h4>
          </div>
          <form action="codes/reservar_code.php" method="POST">
            <div class="card-body">
              <div class="form-group mb-3">
                <label>Cod. Vôo</label>
                <input type="text" name="idVoo-fk" required placeholder="Digite código" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Nome do Cliente</label>
                <input type="text" name="nomeCliente" required  placeholder="Digite o nome do Cliente" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Assento Reservado</label>
                <input type="text" name="numAssento" required placeholder="Digite número do assento" class="form-control">
              </div>
              <div class="form-group mb-3">
                <button type="submit" name="reservar-btn" required class="btn btn-primary">Reservar Passagem</button>
              </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php
include('includes/footer.php');
?>