<?php

function redirecionamento(string $url)
{
  header("location: $url");
  die();
}
