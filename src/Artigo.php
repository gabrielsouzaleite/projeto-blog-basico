<?php

class Artigo
{
  private $myslq;

  public function __construct(mysqli $mysql)
  {
    $this->myslq = $mysql;
  }
  public function exibirTodos(): array
  {

    $resultado = $this->myslq->query('SELECT * FROM artigos');
    $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

    return $artigos;
  }

  public function encontrarPorId(string $id): array
  {
    $selecionaArtigo = $this->myslq->prepare('SELECT * FROM artigos WHERE id = ?');
    $selecionaArtigo->bind_param('s', $id);
    $selecionaArtigo->execute();
    $artigo = $selecionaArtigo->get_result()->fetch_assoc();
    return $artigo;
  }

  public function adicionar(string $titulo, string $conteudo): void
  {
    $insereArtigo = $this->myslq->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?);');
    $insereArtigo->bind_param('ss', $titulo, $conteudo);
    $insereArtigo->execute();
  }

  public function remover(string $id): void
  {
    $removeArtigo = $this->myslq->prepare('DELETE FROM artigos WHERE id=?;');
    $removeArtigo->bind_param('s', $id);
    $removeArtigo->execute();
  }

  public function editar(string $id, string $titulo, string $conteudo): void
  {
    $editarArtigo = $this->myslq->prepare('UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?');
    $editarArtigo->bind_param('sss', $titulo, $conteudo, $id);
    $editarArtigo->execute();
  }
}
