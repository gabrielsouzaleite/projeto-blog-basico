<?php
require '../config.php';
require '../src/Artigo.php';
require '../src/redirecionamento.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $artigo = new Artigo($mysql);
  $artigo->adicionar($_POST['titulo'], $_POST['conteudo']);

  redirecionamento('index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap.css" />
  <meta charset="UTF-8" />
  <title>Adicionar Artigo</title>
</head>

<body>
  <div class="container my-5">
    <div class="row">
      <h1>Adicionar Artigo</h1>
      <form action="adicionar-artigo.php" method="post">
        <p>
          <label class="form-label" for="titulo">Digite o título do artigo</label>
          <input class="form-control" type="text" name="titulo" id="titulo" />
        </p>
        <p>
          <label class="form-label" for="conteudo">Digite o conteúdo do artigo</label>
          <textarea class="form-control" type="text" name="conteudo" id="conteudo"></textarea>
        </p>
        <p>
          <button class="btn btn-primary">Criar Artigo</button>
        </p>
      </form>
    </div>
  </div>
</body>

</html>