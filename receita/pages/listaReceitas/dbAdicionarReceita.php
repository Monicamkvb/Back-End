<?php

$titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
$receita_texto = mysqli_real_escape_string($conexao, $_POST['receitaTexto']);
$autor = mysqli_real_escape_string($conexao, $_POST['autor']);
$tipo_receita = mysqli_real_escape_string($conexao, $_POST['tipo']);

$sql = "INSERT INTO culinaria (
    titulo,
    descricao,
    receita_texto,
    autor,
    tipo_receita
) VALUES (
    '{$titulo}',
    '{$descricao}',
    '{$receita_texto}',
    '{$autor}',
    '{$tipo_receita}'
)";

mysqli_query($conexao, $sql) or die("Erro ao adicionar receita: " . mysqli_error($conexao));

echo "A receita '{$titulo}' foi adicionada com sucesso!";
?>
