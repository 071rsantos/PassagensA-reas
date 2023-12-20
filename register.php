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
            <h4>Cadastro de vôo</h4>
          </div>
          <form action="codes/authentication_code.php" method="POST">
            <div class="card-body">
              <div class="form-group mb-3">
                <label>Origem</label>
                <input type="text" name="origem" placeholder="Digite a origem" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Destino</label>
                <input type="text" name="destino" placeholder="Digite o destino" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Quantidade de assentos</label>
                <input type="text" name="qtdeassentos" placeholder="Digite a quantidade de assentos" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Valor da Passagem</label>
                <input type="text" name="valor" placeholder="Digite o valor da passagem" class="form-control">
              </div>
              <div class="form-group mb-3">
                <button type="submit" name="cadastrar-btn" class="btn btn-primary">Cadastrar</button>
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