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
                    <li class="nav__superior"><a href="/relatorios"><i class="fa-solid fa-file-lines"></i>
                            &nbspRelatórios</a>
                    </li>
                    <!-- <li class="nav__superior"><a href="#"><i class="fa-solid fa-download"></i>
                            &nbspImportar/Exportar</a></li> -->
                    <li class="nav__superior premium selecionado"><a class="premium " href="/premium"><i
                                class="fa-solid fa-crown"></i>
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

        <section class="corpo relatorios">
            <ol style="margin-left: 20px;">
                <li>
                    Tenha certeza de que é um Membro Premium.
                    <a href="/premium">Clique aqui para se tornar Premium</a>
                </li>
                <li>
                    Acesse a página de <a href="/transacoes" >Transações</a>
                </li>
                <li>Selecione os filtros desejados</li>
                <li>Clique em <strong>Filtrar</strong></li>
                <li>Clique em <strong>Gerar Relatório</strong></li>
            </ol>


        </section>
    </main>

</body>

</html>