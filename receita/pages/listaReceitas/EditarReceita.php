<?php

$id = $_GET['id'];

echo "Essa é a receita de N° $id";

$sql = "SELECT * FROM culinaria WHERE id = {$id}";
$query = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta: " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($query);
?>

<h1>EDITAR RECEITA</h1>

<form action="dbEditarReceita.php" method="post">
    <div class="form-group">
       <label for="id">Nº:</label>
       <input value="<?=$dados['id']?>" type="text" id="id" name="id" readonly>
    </div>
    <div class="form-group">
       <label for="titulo">Título:</label>
       <input value="<?=$dados['titulo']?>" type="text" id="titulo" name="titulo">
    </div>
    <div class="form-group">
       <label for="descricao">Descrição:</label>
       <input value="<?=$dados['descricao']?>" type="text" id="descricao" name="descricao">
    </div>
    <div class="form-group">
       <label for="receitaTexto">Texto da Receita:</label>
       <textarea id="receitaTexto" name="receitaTexto"><?=$dados['receita_texto']?></textarea>
    </div>
    <div class="form-group">
       <label for="autor">Autor:</label>
       <input value="<?=$dados['autor']?>" type="text" id="autor" name="autor">
    </div>
    <div class="form-group">
       <label for="tipo">Tipo de Receita:</label>
       <input value="<?=$dados['tipo_receita']?>" type="text" id="tipo" name="tipo">
    </div>
    <button type="submit">EDITAR</button>
</form>
