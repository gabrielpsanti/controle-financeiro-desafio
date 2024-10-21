<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transações</title>
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
                    <li class="nav__superior selecionado"></i><a href="/transacoes"><i
                                class="fa-solid fa-arrow-right-arrow-left"></i> &nbspTransações</a></li>
                    <li class="nav__superior"><a href="/categorias"><i class="fa-solid fa-tags"></i> &nbspCategorias</a>
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

        <section class="corpo tipo">
            <form action="/criar-transacao" method="POST">


                <div class="botoes-vinculadas definir-tipo">
                    <div>
                        <a class="botao-voltar" href="/transacoes"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <button class="botao-confirmar proximo" type="submit" value="Confirmar">Próximo <i class="fa-solid fa-arrow-right"></i></button>
                </div>



                <div class="corpo-tipo">
                    <h3>Qual vai ser o tipo de transação?</h3>

                    <div class="selecao-tipo">
                        <label class="radio-label" style="color: var(--cor-receita)">
                            <input type="radio" name="tipo" value="Receita" required> Receita
                        </label>
                        <label class="radio-label" style="color: red">
                            <input type="radio" name="tipo" value="Despesa" required> Despesa
                        </label>
                    </div>
                </div>



            </form>



        </section>
    </main>

</body>

</html>