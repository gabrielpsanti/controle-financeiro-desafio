<style>

* {
    font-family: sans-serif;
}
table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
}


</style>

    

<h1>Relátorio Geral</h1>
<p>Transações registradas na conta do usuário <b><?= $_SESSION['user_nome']?></b> de acordo com os filtros selecionados</p>
<table>
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Categoria</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($transacoes)): ?>
            <?php foreach ($transacoes as $transacao): ?>
                <tr>
                    <td>
                        <?= $transacao['tipo'] ?>
                    </td>
                    <td><?= $transacao['descricao'] ?></td>
                    <td>R$ <?= number_format($transacao['valor'], 2, ',', '.') ?></td>
                    <td><?= $transacao['categoria_nome'] ?></td>
                    <td><?= date('d-m-Y', strtotime($transacao['data_transacao'])) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Nenhuma transação encontrada</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</body>