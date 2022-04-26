<?php
require '../config.php';
require '../src/Artigo.php';

$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Página administrativa</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap.css" />
</head>

<body>
  <div class="container my-5 p-4">
    <h1>Página Administrativa</h1>
    <?php foreach ($artigos as $artigo) : ?>
      <div class="row">
        <div class="col-md-9">
          <p><?php echo $artigo['titulo'] ?></p>
        </div>
        <nav class="col-md-3">
          <a class="btn btn-primary" href="editar-artigo.php?id=<?php echo $artigo['id']; ?>">Editar</a>
          <a class="btn btn-primary" href="excluir-artigo.php?id=<?php echo $artigo['id']; ?>">Excluir</a>
        </nav>
      </div>
      <br />
    <?php endforeach ?>
    <div class="row py-3">
      <div class="col-md-3">
        <a class="btn btn-primary" href="adicionar-artigo.php">Adicionar Artigo</a>
      </div>
    </div>
  </div>
</body>

</html>