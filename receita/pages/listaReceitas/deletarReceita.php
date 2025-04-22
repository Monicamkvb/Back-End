<h1>DELETAR RECEITA</h1>

<?php
$id = $_GET['id'];

// include('../db/conexao.php'); (talvez eu use isso)

$sql = "DELETE FROM culinaria WHERE id = '$id'";

$query = mysqli_query($conexao, $sql) or die("Erro ao deletar receita: " . mysqli_error($conexao));

echo "A receita foi deletada com sucesso!";
?>
