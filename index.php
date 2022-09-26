<?php
require('Database.php');
$database = new Database();

$clientes = $database->executaQuery('SELECT * FROM cliente');

$cliente = [];

if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
  $cliente = $database->executaQuery('SELECT * FROM cliente where cod_cliente = '.$_GET['id']);
  $cliente = mysqli_fetch_row($cliente);
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de clientes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <div class="container">
  <?php if(isset($_GET['menssagem'])): ?>
    <div class="alert alert-primary" role="alert">
      <?= $_GET['menssagem']?>
    </div>
  <?php endif;?>
  
    <form action="./functions.php" method="GET">
      <h1 class="text-center">Formulario de Cliestes</h1>
      <div class="mb-3">
        <label for="nomeCompleto" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" name="nome" value="<?= isset($cliente[1])?$cliente[1]:''?>">
      </div>
      <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control" name="cpf" value="<?= isset($cliente[2])?$cliente[2]:''?>">
      </div>
      <div class="mb-3">
        <label for="endereco" class="form-label">Endereço</label>
        <input type="text" class="form-control" name="endereco" value="<?= isset($cliente[3])?$cliente[3]:''?>">
      </div>
      <div class="mb-3">
        <label for="idade" class="form-label">Idade</label>
        <input type="number" class="form-control" name="Idade" value="<?= isset($cliente[4])?$cliente[4]:''?>">
      </div>

      <?php if(isset($_GET['acao']) && $_GET['acao'] == 'editar'):?>
        <button type="submit" class="btn btn-warning">Editar</button>
        <input type="hidden" name="id" value="<?= $_GET['id']?>">
        <input type="hidden" name="acao" value="editar">
      <?php else:?>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <input type="hidden" name="acao" value="cadastrar">
      <?php endif;?>

      
    </form>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Cpf</th>
          <th scope="col">Endereço</th>
          <th scope="col">Idade</th>
        </tr>
      </thead>
      <tbody>

      <?php 
      
      while ($row = $clientes->fetch_array(MYSQLI_NUM)) :?>
        <tr>
          <th scope="row"><?= $row[0]?></th>
          <td><?= $row[1]?></td>
          <td><?= $row[2]?></td>
          <td><?= $row[3]?></td>
          <td><?= $row[4]?></td>
          <td>
            <a type="button" class="btn btn-danger" href="./functions.php?acao=excluir&id=<?=$row[0]?>">Excluir</a>
            <a type="button" class="btn btn-warning" href="./index.php?acao=editar&id=<?=$row[0]?>">editar</a>
          </td>
        </tr>
      <?php  endwhile;?>
      </tbody>
    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
</body>

</html>