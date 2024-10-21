<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\TransacaoModel;

class CategoriaController 
{
    private CategoriaModel $categoriaModel;
    private TransacaoModel $transacaoModel;

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
        $this->transacaoModel = new TransacaoModel();
    }

    public function listarCategorias()
    {
        $categorias = $this->categoriaModel->listar();
        require __DIR__ . '/../Views/Categorias/listar_categorias.php';
    }

    public function criarCategoria()
    {
        require __DIR__ . '/../Views/Categorias/formulario_categoria.php';
    }

    public function salvarCategoria()
    {
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];

        if ($nome && $tipo) {
            $this->categoriaModel->salvar($nome, $tipo);
        }

        header('Location: /categorias');
    }

    public function editarCategoria()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id && is_numeric($id)) {
            $categoria = $this->categoriaModel->buscarPorId($id);
            require __DIR__ . '/../Views/Categorias/formulario_categoria.php';
        }
    }

    public function atualizarCategoria()
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];

        if ($id && is_numeric($id) && $nome && $tipo) {
            $this->categoriaModel->atualizar($id, $nome, $tipo);
        }

        header('Location: /categorias');
    }


    public function prepararExclusaoCategoria()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id && is_numeric($id)) {
            $transacoes = $this->transacaoModel->buscarPorCategoria($id);
            $categorias = $this->categoriaModel->listar();
            $categoria = $this->categoriaModel->buscarPorId($id);

            if ($categoria && $categoria['id'] != 1 && $categoria['id'] != 2) {
                require __DIR__ . '/../Views/Categorias/transacoes_vinculadas.php';
                exit;
            }
        }

        
        header('Location: /categorias');
    }

    public function confirmarExclusaoCategoria()
    {
        $id = isset($_POST['id']);

        if ($id && is_numeric($id)) {
            $categoria = $this->categoriaModel->buscarPorId($id);
            $transacoes = $this->transacaoModel->buscarPorCategoria($id);


            if ($categoria && $categoria['id'] != 1 && $categoria['id'] != 2) {
                if (!empty($transacoes)) {
                    foreach ($transacoes as $key => $transacao) {
                        $novaCategoriaId = $_POST['categorias'][$transacao['id']];
                        
                        $this->transacaoModel->atualizarCategoriaTransacao($transacao['id'], $novaCategoriaId);   
                    }
                }
                
                $this->categoriaModel->deletar($id);
            }
        }

        header('Location: /categorias');
    }


}
