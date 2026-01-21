<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

session_start();

if (isset($_SESSION['mensagem'])) {
  echo '<div class="container mt-2 alert alert-' . $_SESSION['tipo'] . ' alert-dismissible fade show text-center" role="alert">' . $_SESSION['mensagem'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';

  // Limpa a mensagem para não reaparecer ao atualizar 
  unset($_SESSION['mensagem']);
  unset($_SESSION['tipo']);
} ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de Produto</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        <h4>Registro de Produto</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="registro_repository.php">
          <!-- Campo Nome do Produto -->
          <div class="mb-3">
            <label for="nomeProduto" class="form-label">Nome e descrição breve do Produto</label>
            <input type="text" name="nomeProduto" class="form-control" id="nomeProduto" placeholder="Saco de lixo - 15L">
          </div>

          <!-- Botões -->
          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Enviar</button>
            <button type="reset" class="btn btn-warning">Limpar</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='index.html'">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    //Seleciona todos os alerts
    const alerts = document.querySelectorAll('.alert');

    alerts.forEach(alert => {
      //Define o tempo (em ms) para desaparecer
      setTimeout(() => {
        alert.classList.remove('show');
        alert.classList.add('fade');
        setTimeout(() => {
          alert.remove();
        }, 500)
      }, 4000)
    });
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>