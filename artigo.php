<?php
require 'config.php';
include 'src/Artigo.php';

$obj_artigo = new Artigo($mysql);
$artigo = $obj_artigo->encontrarPorId($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Meu Blog</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="assets/bootstrap.css" />
</head>

<body>
  <div class="container my-4">
    <div class="row p-4">
      <h1><?php echo $artigo['titulo']; ?></h1>
      <p>
        <?php echo nl2br($artigo['conteudo']); ?>
      </p>
      <div>
        <a class="btn btn-primary" href="index.php">Voltar</a>
      </div>
    </div>
  </div>
</body>

</html>