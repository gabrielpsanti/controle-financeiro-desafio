# Controle Financeiro - Desafio

Este projeto é um gerenciador financeiro simples, desenvolvido para o desafio de um processo seletivo. Ele permite controlar receitas e despesas, categorizá-las, e acompanhar o saldo atual.

## Requisitos

- PHP >= 7.4
- Composer
- MySQL
- Servidor Web (Apache, Nginx, etc.)
- Git

## Instalação

Siga os passos abaixo para clonar e configurar o projeto:

### 1. Clonar o repositório

```bash
git clone https://github.com/gabrielpsanti/controle-financeiro-desafio.git
```

### 2. Navegar até a pasta do projeto

```bash
cd controle-financeiro-desafio
```

### 4. Configurar o banco de dados

1. Crie um banco de dados MySQL para o projeto (basta rodar o arquivo do passo final deste tópico no MySQL).
2. Abra o arquivo `/src/Config/banco_dados.php` com um editor de texto (como o Bloco de Notas) e atualize as informações de conexão com o banco de dados:

```php
define('DB_HOST', 'localhost');
define('DB_NOME', 'despesas');
define('DB_USUARIO', 'root');
define('DB_SENHA', '');
```

3. Execute o arquivo script `/src/Config/query_geral.sql` no MySQL.


### 5. Servir a aplicação

Você pode usar o servidor embutido do PHP para testar o projeto:

```bash
php -S localhost:8000 -t public/
```

Acesse [http://localhost:8000](http://localhost:8000) no seu navegador para ver a aplicação em execução.

## Uso

- **Login/Cadastro**: Há um usuário previamente criado com o login `user@user.com` e senha `user`. O usuário pode criar uma conta (é pedido a confirmação de senhas e verificado se o e-mail já existe). Caso as credenciais estejam incorretas, uma mensagem de erro será exibida.
- **Dashboard**: Após o login bem-sucedido, o usuário é redirecionado para o dashboard, onde pode visualizar os principais dados gerais.
- **Transações**: Na aba transações, o usuário pode visualizar, criar, editar e excluir transações. Há também a opção de aplicar filtros, resetar filtros e baixar relatórios (em caso de conta premium). O usuário pode testar o sistema sem ser premium inicialmente e depois acessar uma página onde é possível mudar o nível da conta para premium, simplesmente clicando em prosseguir. Após isso, relatórios filtrados estarão disponíveis para download.
- **Relatórios**: Foi usada a biblioteca dompdf/dompdf do composer para gerar relatórios filtrados.
- **Categorias**: O usuário pode criar, editar, visualizar e excluir categorias. Caso existam transações vinculadas à categoria a ser excluída, o usuário terá a opção de trocar em massa as categorias das transações vinculadas.
- **Controle de Receitas e Despesas**: Adicione, edite ou exclua transações financeiras.
- **Categorias**: Crie e gerencie categorias para organizar melhor suas transações.

