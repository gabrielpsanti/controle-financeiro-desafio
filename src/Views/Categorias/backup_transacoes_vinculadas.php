<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transações Vinculadas à Categoria</title>
</head>

<body>
    <h1>Transações Vinculadas à Categoria</h1>
    <p><strong>Categoria:</strong> <?= $categoria['nome'] ?></p>
    <p><strong>Tipo:</strong> <?= $categoria['tipo'] ?></p>
    
    <h2>Transações Vinculadas</h2>
    <form action="/confirmar-exclusao-categoria" method="POST">
        <input type="hidden" name="id" value="<?= $categoria['id'] ?>">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($transacoes)): ?>
                    <?php foreach ($transacoes as $transacao): ?>
                        <tr>
                            <td><?= $transacao['id'] ?></td>
                            <td><?= $transcao['tipo'] ?></td>
                            <td><?= $transacao['descricao'] ?></td>
                            <td><?= $transacao['valor'] ?></td>
                            <td><?= date('d/m/Y', strtotime($transacao['data_transacao'])) ?></td>
                            <td>
                                <select name="categorias[<?= $transacao['id'] ?>]" required>
                                    <?php foreach ($categorias as $opcaoCategoria): ?>
                                        <?php if ($opcaoCategoria['tipo'] == $transacao['tipo'] && $opcaoCategoria['id'] != $transacao['categoria_id']): ?>
                                            <option value="<?= $opcaoCategoria['id'] ?>"><?= $opcaoCategoria['nome'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Nenhuma transação vinculada a essa categoria</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

            <p>**Clique no botão abaixo para confirmar as alterações nas transações vinculadas à categoria <?= $categoria['nome'] ?> (caso haja) e prosseguir com a exclusão da mesma.</p>
            <input type="submit" value="Confirmar">
    </form>
    <a href="/categorias">Voltar</a>
</body>

</html>
