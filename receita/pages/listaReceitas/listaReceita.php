<h1>VOCÊ ESTÁ NA LISTA DE RECEITAS</h1>

<a href="index.php?menu=adicionarReceita">
    <button type="button">ADICIONAR RECEITA</button>
</a>

<form action="index.php?menu=listaReceita" method="post">
    <input type="text" name="pesquisa" id="pesquisa">
    <button type="submit">PESQUISAR</button>
</form>

<table class="table">
    <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th>Receita</th>
        <th>Autor</th>
        <th>Tipo</th>
    </tr>
<?php

    if(isset($_POST['pesquisa'])){
        $termoPesquisado = mysqli_real_escape_string($conexao, $_POST['pesquisa']);
    } else {
        $termoPesquisado = "";
    }

    $sql = "SELECT id,
        UPPER(titulo) AS titulo,
        UPPER(descricao) AS descricao,
         UPPER(receita_texto) AS receita_texto,
        UPPER(autor) AS autor,
        UPPER(tipo_receita) AS tipo_receita
        FROM culinaria
        WHERE id = '$termoPesquisado' OR
              titulo LIKE '%$termoPesquisado%'
        ORDER BY titulo ASC";

    $query = mysqli_query($conexao, $sql) or die("Erro na requisição: " . mysqli_error($conexao));

    while($dados = mysqli_fetch_assoc($query)){
?>
        <tr>
            <td><?=$dados['titulo']?></td>
            <td><?=$dados['descricao']?></td>
            <td><?=$dados['receita_texto']?></td>
            <td><?=$dados['autor']?></td>
            <td><?=$dados['tipo_receita']?></td>
            <td>
                <a href="index.php?menu=EditarReceita&id=<?=$dados['id']?>" class="btn btn-primary">EDITAR</a>
                <a href="index.php?menu=deletarReceita&id=<?=$dados['id']?>" class="btn btn-danger">DELETAR</a>
            </td>
        </tr>
<?php
    }
?>
</table>
