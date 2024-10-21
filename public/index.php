<?php

require_once __DIR__ . '/../helpers/autenticador_sessao.php';
require_once __DIR__ . '/../helpers/helper.php';
require_once __DIR__ . '/../src/Config/ConexaoBD.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\CategoriaController;
use App\Controllers\TransacaoController;
use App\Controllers\DashboardController;
use App\Controllers\UsuarioController;
use App\Controllers\RelatorioController;

// dd($_SESSION);

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        $dashboardController = new DashboardController();
        $dashboardController->exibirDashboard();
        break;
    case '/login':
        $usuarioController = new UsuarioController();
        $usuarioController->paginaLogin();
        break;
    case '/validar-login':
        $usuarioController = new UsuarioController();
        $usuarioController->validarLogin();
        break;
    case '/logout':
        $usuarioController = new UsuarioController();
        $usuarioController->logout();
        break;
    case '/cadastro':
        $usuarioController = new UsuarioController();
        $usuarioController->paginaCadastro();
        break;
    case '/criar-conta':
        $usuarioController = new UsuarioController();
        $usuarioController->salvarConta();
        break;
    case '/categorias':
        $categoriaController = new CategoriaController();
        $categoriaController->listarCategorias();
        break;
    case '/criar-categoria':
        $categoriaController = new CategoriaController();
        $categoriaController->criarCategoria();
        break;
    case '/salvar-categoria':
        $categoriaController = new CategoriaController();
        $categoriaController->salvarCategoria();
        break;
    case '/editar-categoria':
        $categoriaController = new CategoriaController();
        $categoriaController->editarCategoria();
        break;
    case '/atualizar-categoria':
        $categoriaController = new CategoriaController();
        $categoriaController->atualizarCategoria();
        break;
    case '/deletar-categoria':
        $categoriaController = new CategoriaController();
        $categoriaController->prepararExclusaoCategoria();
        break;
    case '/confirmar-exclusao-categoria':
        $categoriaController = new CategoriaController();
        $categoriaController->confirmarExclusaoCategoria();
    case '/transacoes':
        $transacaoController = new TransacaoController();
        $transacaoController->listarTransacoes();
        break;
    case '/definir-tipo-transacao':
        $transacaoController = new TransacaoController();
        $transacaoController->definirTipoTransacao();
        break;
    case '/criar-transacao':
        $transacaoController = new TransacaoController();
        $transacaoController->criarTransacao();
        break;
    case '/salvar-transacao':
        $transacaoController = new TransacaoController();
        $transacaoController->salvarTransacao();
        break;
    case '/editar-transacao':
        $transacaoController = new TransacaoController();
        $transacaoController->editarTransacao();
        break;
    case '/atualizar-transacao':
        $transacaoController = new TransacaoController();
        $transacaoController->atualizarTransacao();
        break;
    case '/deletar-transacao':
        $transacaoController = new TransacaoController();
        $transacaoController->deletarTransacao();
        break;
    case '/gerar-relatorio':
        $relatorioController = new RelatorioController();
        $relatorioController->gerarRelatorioFiltros();
        break;
    case '/premium':
        $relatorioController = new RelatorioController();
        $relatorioController->mostrarPaginaPremium();
        break;
    case '/validar-pagamento':
        $relatorioController = new RelatorioController();
        $relatorioController->pagamentoAprovado();
        break;
    case '/relatorios':
        $relatorioController = new RelatorioController();
        $relatorioController->mostrarPaginaRelatorio();
        break;
    default:
        echo 'Página não encontrada';
        break;
}
