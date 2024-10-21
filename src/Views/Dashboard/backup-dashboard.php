

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Receita Total</th>
                <th>Despesa Total</th>
                <th>Saldo Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $receitaTotal ?></td>
                <td><?= $despesaTotal ?></td>
                <td><?= $saldoTotal ?></td>
            </tr>
        </tbody>
    </table>

    <table border="1">
        <thead>
            <tr>
                <th></th>
                <th>Maior Receita</th>
                <th>Maior Despesa</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Descrição</td>
                <td><?= !empty($maiorReceita) ? $maiorReceita['descricao'] : 'Nenhuma receita cadastrada' ?></td>
                <td><?= !empty($maiorDespesa) ? $maiorDespesa['descricao'] : 'Nenhuma despesa cadastrada' ?></td>
            </tr>
            <tr>
                <td>Valor</td>
                <td><?= !empty($maiorReceita) ? $maiorReceita['valor'] : '-' ?></td>
                <td><?= !empty($maiorDespesa) ? $maiorDespesa['valor'] : '-' ?></td>
            </tr>
        </tbody>
    </table>

    <?php for($i = 0 ; $i < 3; $i++) : ?>
        <div class="bloco-transacoes">
        <?php if(!isset($ultimasDespesas[$i])) : ?> 
            <div>Nenhuma transação encontrada</div>
        <?php endif; ?>
        <?php if (isset($ultimasDespesas[$i])) : ?>
            <div class="transacao-unitaria-esquerda">
                <?= $ultimasDespesas[$i]['descricao'] ?>
                <div class="sub-descricao">
                    <span><?= $ultimasDespesas[$i]['data_transacao'] ?> </span>
                    |
                    <span> <?= $ultimasDespesas[$i]['categoria'] ?></span>
                </div>
            </div>
            <div class="transacao-unitaria-direita">
                <div>
                    <span> <?= $ultimasDespesas[$i]['valor'] ?></span>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endfor; ?>

    <?php for($i = 0 ; $i < 3; $i++) : ?>
        <div class="bloco-transacoes">
        <?php if(!isset($ultimasReceitas[$i])) : ?> 
            <div>Nenhuma transação encontrada</div>
        <?php endif; ?>
        <?php if (isset($ultimasReceitas[$i])) : ?>
            <div class="transacao-unitaria-esquerda">
                <?= $ultimasReceitas[$i]['descricao'] ?>
                <div class="sub-descricao">
                    <span><?= $ultimasReceitas[$i]['data_transacao'] ?> </span>
                    |
                    <span> <?= $ultimasReceitas[$i]['categoria'] ?></span>
                </div>
            </div>
            <div class="transacao-unitaria-direita">
                <div>
                    <span> <?= $ultimasReceitas[$i]['valor'] ?></span>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endfor; ?>
    <a href="/transacoes">Ver Transações</a><br>
    <a href="/categorias">Gerenciar Categorias</a>
</body>
</html>
