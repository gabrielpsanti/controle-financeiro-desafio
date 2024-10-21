<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>


    <aside>
        <div class="logo">
            <a href="/"><img src="logo.png" class="logo" alt=""></a>
        </div>

        <div class="navegadores">
            <nav class="nav__superior">
                <ul>
                    <li class="nav__superior"><a href="/"><i class="fa-solid fa-chart-simple"></i> &nbspDashboard</a>
                    </li>
                    <li class="nav__superior "></i><a href="/transacoes"><i
                                class="fa-solid fa-arrow-right-arrow-left"></i> &nbspTransações</a></li>
                    <li class="nav__superior selecionado"><a href="/categorias"><i class="fa-solid fa-tags"></i> &nbspCategorias</a>
                    </li>
                    <li class="nav__superior"><a href="/relatorios"><i class="fa-solid fa-file-lines"></i> &nbspRelatórios</a>
                    </li>
                    <!-- <li class="nav__superior"><a href="#"><i class="fa-solid fa-download"></i>
                            &nbspImportar/Exportar</a></li> -->
                    <li class="nav__superior premium"><a class="premium" href="/premium"><i class="fa-solid fa-crown"></i>
                            &nbsp<?= $_SESSION['user_level'] == 2 ? "Seja " : "Conta " ?>Premium</a></li>
                </ul>
            </nav>
            <nav class="nav__inferior">
                <ul>
                    <!-- <li class="nav__inferior minha-conta"><a class="minha-conta" href="#"><i
                                class="fa-solid fa-user"></i>
                            &nbspMinha Conta</a></li> -->
                    <li class="nav__inferior logout"><a href="/logout"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i>
                            &nbspLogout</a></li>
                </ul>
            </nav>
        </div>


    </aside>



    <main>

        <section class="corpo">
            <div>
                <a class="botao-voltar" href="/categorias"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <h1>Transações Vinculadas à Categoria</h1><br>
            <form action="/confirmar-exclusao-categoria" method="POST">
                <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
            <p><strong>Categoria:</strong> <?= $categoria['nome'] ?></p>
            <p><strong>Tipo:</strong> <?= $categoria['tipo'] ?></p><br>
            


            <div class="titulo-transacoes">
                <h3>Transações Vinculadas</h3>
                <button class="botao-confirmar" type="submit" value="Confirmar">Confirmar</button>
            </div>


                <div class="table-lista vinculadas">
                    <table>
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>Tipo</th>
                                <th>Descrição</th>
                                <th>Valor</th>
                                <th>Data</th>
                                <th>Trocar categoria para:</th>
                            </tr>
                        </thead>
                        <tbody class="acao">
                            <?php if (!empty($transacoes)): ?>
                                <?php foreach ($transacoes as $transacao): ?>
                                    <tr>
                                        <!-- <td><?= $transacao['id'] ?></td> -->
                                        <td
                                            style="color: <?= $transacao['tipo'] == 'Receita' ? 'var(--cor-receita)' : 'red' ?>">
                                            <?= $transacao['tipo'] ?>
                                        </td>
                                        <td><?= $transacao['descricao'] ?></td>
                                        <td>R$ <?= number_format($transacao['valor'], 2, ',', '.') ?></td>
                                        <td><?= date('d-m-Y', strtotime($transacao['data_transacao'])) ?></td>
                                        <td class="acao__option">
                                            <select class="acao" name="categorias[<?= $transacao['id'] ?>]" required>
                                                <?php foreach ($categorias as $opcaoCategoria): ?>
                                                    <?php if ($opcaoCategoria['tipo'] == $transacao['tipo'] && $opcaoCategoria['id'] != $transacao['categoria_id']): ?>
                                                        <option value="<?= $opcaoCategoria['id'] ?>"><?= $opcaoCategoria['nome'] ?>
                                                        </option>
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

                    </div>

            </form>

        </section>
    </main>

</body>

</html>