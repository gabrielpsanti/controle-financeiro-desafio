# Controle Financeiro - Desafio

Este projeto é um gerenciador financeiro simples, desenvolvido para o desafio. Ele permite controlar receitas e despesas, categorizá-las, gerenciar categorias, acompanhar dados gerais, gerar relatórios e testar recursos de user_level.

## Requisitos

- PHP
- Composer
- MySQL
- Git

## Instalação

Siga os passos abaixo para clonar e configurar o projeto:

### 1. Clonar o repositório

```bash
git clone https://github.com/gabrielpsanti/controle-financeiro-desafio.git
```

### 2. Configurar o banco de dados

Para criar um banco de dados MySQL para o projeto (basta rodar o arquivo do passo final deste tópico no MySQL).

1. Abra o arquivo `/src/Config/banco_dados.php` com um editor de texto (como o Bloco de Notas) e atualize as informações de conexão com o banco de dados:

```php
define('DB_HOST', 'localhost');
define('DB_NOME', 'despesasdesafio');
define('DB_USUARIO', 'root');
define('DB_SENHA', '');
```

3. Execute o arquivo script `/src/Config/query_geral.sql` em seu gerenciador MySQL.


### 3. Hospedagem local

Você pode usar o servidor embutido do PHP para testar o projeto:

```bash
cd controle-financeiro-desafio
```
```bash
php -S localhost:8000 -t public/
```

Acesse [http://localhost:8000](http://localhost:8000) no seu navegador para ver a aplicação em execução.

## Uso

- **Login/Cadastro**: Há um usuário previamente criado com o login `user@user.com` e senha `user`. O usuário pode criar uma conta (é pedido a confirmação de senhas e verificado se o e-mail já existe). Caso as credenciais estejam incorretas, uma mensagem de erro será exibida, tanto no cadastro quanto no login. Ao criar a conta, o usuário começa com 8 categorias padrão já cadastradas (4 de despesas e 4 de receita).
- **Dashboard**: Após o login bem-sucedido, o usuário é redirecionado para o dashboard, onde pode visualizar os principais dados gerais.
- **Transações**: Na aba transações, o usuário pode visualizar, criar, editar e excluir transações. Há também a opção de aplicar filtros, resetar filtros e baixar relatórios (em caso de conta Premium). O usuário pode testar o sistema sem ser premium inicialmente e depois acessar uma página onde é possível mudar o nível da conta para premium. Após isso, relatórios estarão disponíveis para download.
- **Categorias**: Na aba categorias, usuário pode criar, editar, visualizar e excluir categorias. Caso existam transações vinculadas à categoria a ser excluída, o usuário terá a opção de trocar as categorias das transações vinculadas. Além disso, há duas categorias padrão que não podem ser excluídas ou editadas. 
- **Relatórios**: Foi usada a biblioteca dompdf/dompdf do composer para gerar os relatórios filtrados.
