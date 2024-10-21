<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Transações</title>
</head>
<body>
    <!-- Filtros -->
    <form action="/transacoes" method="GET">
        <div>
        <label for="dataInicio">Data Início:</label>
        <input type="date" id="dataInicio" name="dataInicio" value="<?= isset($_GET['dataInicio']) ? $_GET['dataInicio'] : date('Y-m-01') ?>">
        </div>

        <div>
        <label for="dataFim">Data Fim:</label>
        <input type="date" id="dataFim" name="dataFim" value="<?= isset($_GET['dataFim']) ?  $_GET['dataFim'] : date('Y-m-t') ?>">
        </div>
        

        <div>
        <label for="entrada">Entrada:</label>
        <select name="entrada" id="entrada">
            <option value="Todos" <?= !isset($_GET['entrada']) || $_GET['entrada'] == 'Todos' ? 'selected' : '' ?>>Todos</option>
            <option value="Receita" <?= isset($_GET['entrada']) && $_GET['entrada'] == 'Receita' ? 'selected' : '' ?>>Receita</option>
            <option value="Despesa" <?= isset($_GET['entrada']) && $_GET['entrada'] == 'Despesa' ? 'selected' : '' ?>>Despesa</option>
        </select>
        </div>


        <div>
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria">
            <option value="Todos" <?= !isset($_GET['categoria']) || $_GET['categoria'] == 'Todos' ? 'selected' : '' ?>>Todos</option>


            <option value="" disabled>--- Categorias despesa ---</option>
            <?php foreach ($categorias as $categoria): ?>
                <?php if ($categoria['tipo'] == 'Despesa'): ?>
                    <option value="<?= $categoria['id'] ?>" <?= isset($_GET['categoria']) && $_GET['categoria'] == $categoria['id'] ? 'selected' : '' ?>>
                        <?= $categoria['nome'] ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>

            
            <option value="" disabled>--- Categorias receita ---</option>
            <?php foreach ($categorias as $categoria): ?>
                <?php if ($categoria['tipo'] == 'Receita'): ?>
                    <option value="<?= $categoria['id'] ?>" <?= isset($_GET['categoria']) && $_GET['categoria'] == $categoria['id'] ? 'selected' : '' ?>>
                        <?= $categoria['nome'] ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        </div>

        <div>
        <label for="busca">Busca:</label>
        <input type="text" id="busca" name="busca" value="<?= isset($_GET['busca']) ? $_GET['busca'] : '' ?>">
        </div>

        <button type="submit">Filtrar</button>
        <a href="/transacoes">Resetar Filtros</a>
    </form>


    <!-- Resultados filtrados -->
    <h3>Entradas</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($transacoes)): ?>
            <?php foreach ($transacoes as $transacao): ?>
                <tr>
                    <td><?= $transacao['id'] ?></td>
                    <td style="color: <?= $transacao['tipo'] == 'Receita' ? 'green' : 'red' ?>"><?= $transacao['tipo'] ?></td>
                    <td><?= $transacao['descricao'] ?></td>
                    <td><?= $transacao['valor'] ?></td>
                    <td><?= $transacao['categoria_nome'] ?></td>
                    <td><?= $transacao['data_transacao'] ?></td>
                    <td>
                        <a href="/editar-transacao?id=<?= $transacao['id'] ?>"> Editar </a>
                        <a href="/deletar-transacao?id=<?= $transacao['id'] ?>"> Deletar </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Nenhuma transação encontrada</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    
    <a href="/definir-tipo-transacao">Nova Transação</a>
    <br>
    <a href="/">Voltar</a>
</body>
</html>
