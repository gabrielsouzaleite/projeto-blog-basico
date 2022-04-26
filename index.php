<?php

require 'config.php';
include 'src/Artigo.php';

$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();
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
    <h1 class="py-2">Meu Blog</h1>
    <?php foreach ($artigos as $artigo) : ?>
      <div class="row py-2">
        <h2>
          <a href="artigo.php?id=<?php echo $artigo['id']; ?>">
            <?php echo $artigo['titulo']; ?>
          </a>
        </h2>
        <p>
          <?php echo nl2br($artigo['conteudo']); ?>
        </p>
      </div>
    <?php endforeach ?>
  </div>
</body>

</html>