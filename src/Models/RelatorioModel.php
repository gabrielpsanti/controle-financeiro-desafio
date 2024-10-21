<?php

namespace App\Models;

use PDO;
use PDOException;
use App\Config\ConexaoBD;

class RelatorioModel
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = ConexaoBD::criarConexao();
    }

    public function modificarUserLevel($id)
    {
        $sql = 'UPDATE usuarios SET user_level = 3 WHERE id = :id';
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $_SESSION['user_level'] = 3;
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar categoria: " . $e->getMessage();
            return false;
        }
    }
}
