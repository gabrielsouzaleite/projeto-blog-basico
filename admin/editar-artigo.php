<?php
require '../config.php';
require '../src/Artigo.php';
require '../src/redirecionamento.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $artigo = new Artigo($mysql);
  $artigo->editar($_POST['id'], $_POST['titulo'], $_POST['conteudo']);

  redirecionamento('index.php');
}

$artigo = new Artigo($mysql);
$art = $artigo->encontrarPorId($_GET['id']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap.css" />
  <meta charset="UTF-8" />
  <title>Editar Artigo</title>
</head>

<body>
  <div class="container my-5 p-3">
    <h1>Editar Artigo</h1>
    <form action="editar-artigo.php" method="post">
      <p>
        <label class="form-label" for="titulo">Digite o novo título do artigo</label>
        <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $art['titulo'] ?>" />
      </p>
      <p>
        <label class="form-label" for="conteudo">Digite o novo conteúdo do artigo</label>
        <textarea class="form-control" type="text" name="conteudo" id="titulo"><?php echo $art['titulo'] ?><?php echo $art['conteudo'] ?></textarea>
      </p>
      <p>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
      </p>
      <p>
        <button class="btn btn-primary">Editar Artigo</button>
      </p>
    </form>
  </div>
</body>

</html>