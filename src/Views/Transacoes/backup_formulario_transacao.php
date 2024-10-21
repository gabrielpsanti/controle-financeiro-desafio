<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Descobri na última hora que um usuário podia alterar transação de outro
if($path == '/editar-transacao' && $transacao['usuario_id'] != $_SESSION['user_id']) {
    header('Location: /transacoes');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transação</title>
</head>

<body>
    <h1><?= isset($transacao) ? 'Editar' : 'Nova' ?> Transação</h1>
    <form action="<?= isset($transacao) ? 'atualizar-transacao' : 'salvar-transacao' ?>" method="POST">
        <?php if (isset($transacao)): ?>
            <input type="hidden" name="id" value="<?= $transacao['id'] ?>">
        <?php endif; ?>
        <input type="hidden" name="tipo" value="<?= $tipo ?>">

        <label for="tipo">Tipo</label>
        <input type="text" id="tipo" name='tipo' value="<?= $tipo ?>" disabled>

        <label for="descricao">Descrição</label>
        <input type="text" id="descricao" name="descricao" value="<?= $transacao['descricao'] ?? '' ?>" required>
        
        <label for="valor">Valor</label>
        <input type="number" id="valor" name="valor" step="0.01" value="<?= $transacao['valor'] ?? '' ?>" required>

        <label for="categoria_id">Categoria</label>
        <select id="categoria_id" name="categoria_id" required>
            <?php foreach ($categorias as $categoria): ?>
                <?php if ($categoria['tipo'] == $tipo) : ?>
                <option value="<?= $categoria['id'] ?>" <?= isset($transacao) && $transacao['categoria_id'] == $categoria['id'] ? 'selected' : '' ?>><?= $categoria['nome'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>

        <label for="data_transacao">Data</label>
        <input type="date" id="data_transacao" name="data_transacao" value="<?= isset($transacao) ? date('Y-m-d', strtotime($transacao['data_transacao'])) : date('Y-m-d') ?>" required>
        
        <input type="submit" value="Salvar">
    </form>
    <a href="/transacoes">Voltar</a>
</body>

</html>
