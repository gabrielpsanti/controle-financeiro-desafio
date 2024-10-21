CREATE DATABASE IF NOT EXISTS despesasteste;
USE despesasteste;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    user_level INT DEFAULT 2
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(100) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE transacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(100) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
	valor DECIMAL(10,2) NOT NULL,
    categoria_id INT,
    usuario_id INT,
    data_transacao TIMESTAMP NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

INSERT INTO usuarios (id, nome, senha, email, user_level) VALUES 
(1, 'admin', '$2b$12$eaBEWF7ATOkC1nt/wpfsV.18V7kLit7yLu6yRRIIX4eni/iTu8fh6', 'admin@admin.com', 1),
(999, 'global', '$2b$12$LNjB9Yf8LMn4qHXMZ7zdneNRpMTwi.xVuIeFgMQufTeeIs.s5/imW', 'global@global.com', 999),
(1000, 'user', '$2b$12$JdFoAlvMY0Bs9u/TUwu37OcvgXtj1LbUUN7PtExuj29X17BpFoFyq', 'user@user.com', 2), 
(1001, 'premium', '$2b$12$j4lIOfiEheeCGBxfip4HN.7bpV8.DhG1zKMFhxK6/YZoNCePWLS/W', 'premium@premium.com', 3);

INSERT INTO categorias (id, nome, tipo, usuario_id) VALUES 
(1, 'Despesa sem categoria', 'Despesa', 999),
(2, 'Receita sem categoria', 'Receita', 999),
(3, 'Alimentação', 'Despesa', 1000),
(4, 'Saúde', 'Despesa', 1000),
(5, 'Educação', 'Despesa', 1000),
(6, 'Outros', 'Despesa', 1000),
(7, 'Salário', 'Receita', 1000),
(8, 'Investimento', 'Receita', 1000),
(9, 'Extra', 'Receita', 1000),
(10, 'Outros', 'Receita', 1000);

INSERT INTO transacoes (tipo, descricao, valor, categoria_id, usuario_id, data_transacao) VALUES
('Despesa', 'Compra de supermercado', 120.50, 1, 1000, '2024-09-05 14:30:00'),
('Despesa', 'Pagamento de energia elétrica', 85.30, 1, 1000, '2024-09-10 12:00:00'),
('Receita', 'Salário mensal', 2500.00, 2, 1000, '2024-09-25 09:00:00'),
('Despesa', 'Manutenção do carro', 350.75, 1, 1000, '2024-09-30 16:15:00'),
('Despesa', 'Aluguel de apartamento', 1000.00, 1, 1000, '2024-10-01 10:00:00'),
('Receita', 'Freelance de design gráfico', 400.00, 2, 1000, '2024-10-03 18:45:00'),
('Despesa', 'Compra de roupas', 150.00, 1, 1000, '2024-10-08 11:30:00'),
('Despesa', 'Compra de eletrônicos', 800.00, 1, 1000, '2024-10-12 14:00:00'),
('Receita', 'Venda de produtos usados', 200.00, 2, 1000, '2024-10-15 09:15:00'),
('Despesa', 'Assinatura de streaming', 45.90, 1, 1000, '2024-10-16 20:00:00'),
('Despesa', 'Jantar em restaurante', 95.60, 1, 1001, '2024-09-08 19:30:00'),
('Despesa', 'Abastecimento de combustível', 220.00, 1, 1001, '2024-09-14 10:15:00'),
('Receita', 'Comissão de vendas', 600.00, 2, 1001, '2024-09-20 11:00:00'),
('Despesa', 'Compra de material de escritório', 180.50, 1, 1001, '2024-09-26 13:00:00'),
('Receita', 'Reembolso de despesas', 150.00, 2, 1001, '2024-10-05 15:00:00'),
('Despesa', 'Curso online', 300.00, 1, 1001, '2024-10-07 09:00:00'),
('Despesa', 'Manutenção de eletrodomésticos', 95.75, 1, 1001, '2024-10-10 14:45:00'),
('Receita', 'Pagamento de projeto freelance', 800.00, 2, 1001, '2024-10-14 17:30:00'),
('Despesa', 'Compra de móveis', 1200.00, 1, 1001, '2024-10-09 12:00:00'),
('Receita', 'Aluguel de imóvel', 1200.00, 2, 1001, '2024-10-13 08:30:00');
