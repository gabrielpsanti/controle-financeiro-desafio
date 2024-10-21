<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Categorias</title>
</head>

<body>
    <h1>Listagem Categorias</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($categorias)): ?>
            <h3>Despesas</h3>
            <?php foreach ($categorias as $categoria) : ?>
                <?php if($categoria['tipo'] == 'Despesa') : ?>
                <tr>
                    <td><?= $categoria['id'] ?></td>
                    <td><?= $categoria['nome'] ?></td>
                    <td>
                        <?php if ($categoria['id'] != 1 && $categoria['id'] != 2): ?>
                            <td><a href="editar-categoria?id=<?= $categoria['id'] ?>">Editar</a></td>
                            <td><a href="deletar-categoria?id=<?= $categoria['id'] ?>">Excluir</a></td>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>


        <?php else: ?>
            <tr>
                <td colspan="4">Nenhuma categoria de despesa registrada</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($categorias)): ?>
            <h3>Receitas</h3>
            <?php foreach ($categorias as $categoria) : ?>
                <?php if($categoria['tipo'] == 'Receita') : ?>
                <tr>
                    <td><?= $categoria['id'] ?></td>
                    <td><?= $categoria['nome'] ?></td>
                    <td>
                        <?php if ($categoria['id'] != 1 && $categoria['id'] != 2): ?>
                            <td><a href="editar-categoria?id=<?= $categoria['id'] ?>">Editar</a></td>
                            <td><a href="deletar-categoria?id=<?= $categoria['id'] ?>">Excluir</a></td>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>


        <?php else: ?>
            <tr>
                <td colspan="4">Nenhuma categoria de receita registrada</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <a href="/criar-categoria">Nova Categoria</a><br>
    <a href="/">Voltar</a>
</body>

</html>

