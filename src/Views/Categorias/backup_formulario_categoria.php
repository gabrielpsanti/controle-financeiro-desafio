<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if($path == '/editar-categoria' && $categoria['usuario_id'] != $_SESSION['user_id']) {
    header('Location: /categorias');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
</head>
<body>
    <h1><?= isset($categoria) ? 'Editar' : 'Nova' ?> Categoria</h1>
    <form action="<?= isset($categoria) ? 'atualizar-categoria' : 'salvar-categoria' ?>" method="POST">
        <?php if (isset($categoria)): ?>
            <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
            <input type="hidden" name="tipo" value="<?= $categoria['tipo'] ?>">
        <?php endif; ?>
        
        <label for="tipo">Tipo</label>
        <select id="tipo" name="tipo" required <?= isset($categoria) ? 'disabled' : '' ?>>
            <option value="Despesa" <?= isset($categoria) && $categoria['tipo'] == 'Despesa' ? 'selected' : '' ?>>Despesa</option>
            <option value="Receita" <?= isset($categoria) && $categoria['tipo'] == 'Receita' ? 'selected' : '' ?>>Receita</option>
        </select>

        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?= isset($categoria['nome']) ? $categoria['nome'] : '' ?>" <?= $categoria['id'] == 1 || $categoria['id'] == 2 ? 'disabled' : '' ?> required>
        
        
        <input type="submit" value="Salvar">
    </form>
    <a href="/categorias">Voltar</a>
</body>
</html>
