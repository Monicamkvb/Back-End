<h3>Editar Receita</h3>

<?php

$id = mysqli_real_escape_string($conexao, $_POST['id']);
$titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
$receita_texto = mysqli_real_escape_string($conexao, $_POST['receita_texto']);
$autor = mysqli_real_escape_string($conexao, $_POST['autor']);
$tipo_receita = mysqli_real_escape_string($conexao, $_POST['tipo_receita']);

$sql = "UPDATE culinaria SET
    titulo = '{$titulo}',
    descricao = '{$descricao}',
    receita_texto = '{$receita_texto}',
    autor = '{$autor}',
    tipo_receita = '{$tipo_receita}'
    WHERE id = '{$id}'";

mysqli_query($conexao, $sql) or die("Erro ao atualizar: " . mysqli_error($conexao));

echo "A receita foi atualizada com sucesso!";
?>
