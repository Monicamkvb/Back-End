<h1>DELETAR CARRO</h1>

<?php
$id = $_GET['idCarro'];

$sql ="DELETE FROM carro WHERE idCarro = '$id'";

$query = mysqli_query($conexao,$sql) or die("Erro ao deletar carro".mysqli_error(($conexao)));

echo"O carro foi deletado com sucesso!";

?>
