<?php

namespace App\Config;

use PDO;
use PDOException;

require_once __DIR__ . '/banco_dados.php';

class ConexaoBD {
    public static function criarConexao() {
        try {
            $conexao = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NOME, DB_USUARIO, DB_SENHA);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexao;
        } catch (PDOException $e) {
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
            die();
        }
    }
}
