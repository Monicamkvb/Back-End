<h1>ADICIONAR NOVA RECEITA</h1>


<form action="index.php?menu=dbAdicionarReceita" method="post">
    <div class="form-group">
       <label for="titulo">Título:</label>
       <input type="text" id="titulo" name="titulo" required>
    </div>

    <div class="form-group">
       <label for="descricao">Descrição:</label>
       <input type="text" id="descricao" name="descricao" required>
    </div>

    <div class="form-group">
       <label for="receita">Receita:</label>
       <textarea id="receita" name="receitaTexto" rows="5" required></textarea>
    </div>

    <div class="form-group">
       <label for="autor">Autor:</label>
       <input type="text" id="autor" name="autor" required>
    </div>

    <div class="form-group">
       <label for="tipo">Tipo da Receita:</label>
       <select id="tipo" name="tipo">
           <option value="Doce">Doce</option>
           <option value="Salgado">Salgado</option>
           <option value="Outro">Outro</option>
       </select>
    </div>

    <button type="submit">CADASTRAR</button>
</form>
