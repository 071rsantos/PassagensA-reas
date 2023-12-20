<?php include_once('config/app.php'); ?>
<link rel="stylesheet" href="style.css">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-nav">
    <a class="navbar-brand" href="index.php">PROc Passagens</a>
    <img src="img/aviao.png" width="30px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('/index.php') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/reservar.php') ?>">Vender Passagem</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/register.php') ?>">Registrar Vôo</a>
        </li>

      </ul>
  
    </div>
  </div>
</nav>