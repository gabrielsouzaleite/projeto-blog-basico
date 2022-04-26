<?php
require '../config.php';
require '../src/Artigo.php';
require '../src/redirecionamento.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $artigo = new Artigo($mysql);
  $artigo->remover($_POST['id']);

  redirecionamento('index.php');
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap.css" />
  <meta charset="UTF-8" />
  <title>Excluir Artigo</title>
</head>

<body>
  <div class="container my-5 p-3">
    <div class="row">
      <h1>Você realmente deseja excluir o artigo?</h1>
      <form method="post" action="excluir-artigo.php">
        <p>
          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
          <button class="btn btn-primary">Excluir</button>
        </p>
      </form>
    </div>
  </div>
</body>

</html>