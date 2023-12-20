<?php
include('config/app.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<a class="btn btn-primary" href="<?= base_url('/listaReserva.php') ?>">Listar Reservas</a>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include('message.php')?>

                <div class="container my-5">
                    <h2>PESQUISE UMA RESERVA</h2>
                    <form method="POST">
                        <input type="text" placeholder="Pesquisar reserva" name="pesquisar">
                        <button class="btn btn-dark btn-sm" name="enviar">Pesquisar</button>
                    </form>
                    <div class="container my-5">
                        <table class="table">
                            <?php
                            if(isset($_POST['enviar'])){
                                $pesquisar = validateInput($db->conn, $_POST['pesquisar']);
                                $sql = "SELECT * FROM `reserva` where idReserva='$pesquisar'";
                                $result = mysqli_query($db->conn, $sql);

                                if(mysqli_num_rows($result) > 0) {
                                    echo '<thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Voo ID</th>
                                                <th>Nome do Cliente</th>
                                                <th>Assento</th>
                                                <th>Desconto</th>
                                                <th>Valor Final</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                                                <td>'.$row['idReserva'].'</td>
                                                <td>'.$row['vooId'].'</td>
                                                <td>'.$row['nomeCliente'].'</td>
                                                <td>'.$row['numAssento'].'</td>
                                                <td>'.$row['desconto'].'</td>
                                                <td>'.$row['valorFinal'].'</td>
                                            </tr>';
                                    }
                                    echo '</tbody>';
                                } else {
                                    echo '<p>Nenhum resultado encontrado.</p>';
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
