
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium</title>
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
                    <li class="nav__superior "><a href="/"><i class="fa-solid fa-chart-simple"></i> &nbspDashboard</a>
                    </li>
                    <li class="nav__superior "></i><a href="/transacoes"><i
                                class="fa-solid fa-arrow-right-arrow-left"></i> &nbspTransações</a></li>
                    <li class="nav__superior"><a href="/categorias"><i class="fa-solid fa-tags"></i> &nbspCategorias</a>
                    </li>
                    <li class="nav__superior"><a href="/relatorios"><i class="fa-solid fa-file-lines"></i> &nbspRelatórios</a>
                    </li>
                    <!-- <li class="nav__superior"><a href="#"><i class="fa-solid fa-download"></i>
                            &nbspImportar/Exportar</a></li> -->
                    <li class="nav__superior premium selecionado"><a class="premium " href="/premium"><i class="fa-solid fa-crown"></i>
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

        <section class="corpo form-transacao">
            <?php if($_SESSION['user_level'] == 2) : ?>

            <form action="/validar-pagamento" method="POST">
                <div class="botoes-vinculadas definir-tipo">
                    <div>
                        <a class="botao-voltar" href="/transacoes"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <button class="botao-confirmar proximo" type="submit" value="Confirmar">Prosseguir <i class="fa-solid fa-arrow-right"></i></button>
                </div>

                <div class="out-form">
                    <div class="corpo-form-transacao">

                        <h4>Seja Premium para usar os relatórios:</h4><br>

                        <?php if (isset($transacao)): ?>
                            <input type="hidden" name="id" value="<?= $transacao['id'] ?>">
                        <?php endif; ?>
                        <input type="hidden" name="tipo" value="<?= $tipo ?>">

                        <div class="tipoecategoria">
                            <div class="tipo-form">
                                <label for="numero-cartao">Número do cartao</label>
                                <input type="text" id="numero-cartao" name='numero-cartao' value="0123 4567 8910 1234">
                            </div>

                        </div>

                        <div class="descricao">
                            <label for="nome-cartao">Nome titular</label><br>
                            <input type="text" id="nome-cartao" name="nome-cartao" value="GASTIFICA MENOS"
                                required>
                        </div>

                        <div class="valoredata">
                        <div class="data-form">
                                <label for="data_transacao">Data Expiração</label>
                                <input type="text" id="data_transacao" name="data_transacao"
                                    value="10/2024"
                                    required>
                            </div>

                            <div class="valor-form">
                                <label for="codigo">Código</label>
                                <input type="text" id="codigo" name="codigo" step="0.01" value="123"
                                    required>
                            </div>



                        </div>
                        <br><p style="font-size: 18px">A titulo de estudo, apenas clique em prosseguir.</p>
                    </div>
                </div>



            </form>
            <?php endif; ?>
            <?php if ($_SESSION['user_level'] != 2) : ?>
            <div class="botoes-vinculadas definir-tipo">
                <div>
                    <a class="botao-voltar" href="/"><i class="fa-solid fa-arrow-left"></i></a>
                </div>
            </div>

            <br><p>Obrigado por ser um Membro Premium! <i class="fa-regular fa-face-smile-wink"></i></p>

            <?php endif; ?>

        </section>
    </main>

</body>

</html>