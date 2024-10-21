<?php

namespace App\Controllers;

use App\Models\TransacaoModel;
use App\Models\RelatorioModel;

class RelatorioController 
{
    private TransacaoModel $transacaoModel;
    private RelatorioModel $relatorioModel;

    public function __construct() {
        $this->transacaoModel = new TransacaoModel();
        $this->relatorioModel = new RelatorioModel();
    }

    public function gerarRelatorioFiltros() 
    {

        if($_SESSION['user_id'] == 2) {
            header('Location: /premium');
            exit;
        }
        $filtros = [
            'dataInicio' => isset($_GET['dataInicio']) ? $_GET['dataInicio'] : date('Y-m-01'),
            'dataFim' => isset($_GET['dataFim']) ? $_GET['dataFim'] : date('Y-m-t'),
            'entrada' => isset($_GET['entrada']) ? $_GET['entrada'] : 'Todos',
            'categoria' => isset($_GET['categoria']) ? $_GET['categoria'] : 'Todos',
            'busca' => isset($_GET['busca']) ? $_GET['busca'] : ''
        ];

        $transacoes = $this->transacaoModel->buscarComFiltros($filtros);
        require __DIR__ . '/../Views/Relatorios/gerador_relatorio.php';
    }

    public function pagamentoAprovado() 
    {
        $id = $_SESSION['user_id'];

        $this->relatorioModel->modificarUserLevel($id);

        require __DIR__ . '/../Views/Relatorios/seja_premium.php';
    }

    public function mostrarPaginaPremium()
    {
        require __DIR__ . '/../Views/Relatorios/seja_premium.php';
    }

    
    public function mostrarPaginaRelatorio()
    {
        require __DIR__ . '/../Views/Relatorios/relatorios.php';
    }
}