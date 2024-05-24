<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Gerenciamento de Livros

Este é um projeto de gerenciamento de livros desenvolvido com Laravel. A aplicação permite adicionar, listar, editar e excluir livros.

## Requisitos

- PHP >= 7.4
- Composer
- Laravel >= 8.x
- Banco de Dados MySQL do Xampp

## Instalação

1. Clone o repositório para sua máquina local:

    ```bash
    git clone https://github.com/alessandravgs/crud-laravel.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd nome-do-repositorio
    ```

3. Instale as dependências do Composer:

    ```bash
    composer install
    ```

4. Copie o arquivo `.env.example` para `.env` e configure suas variáveis de ambiente, incluindo as configurações do banco de dados:

    ```bash
    cp .env.example .env
    ```

5. Gere a chave da aplicação:

    ```bash
    php artisan key:generate
    ```

6. Execute as migrações para criar as tabelas do banco de dados:

    ```bash
    php artisan migrate
    ```

## Uso

1. Inicie o servidor de desenvolvimento do Laravel:

    ```bash
    php artisan serve
    ```

2. Abra seu navegador e acesse `http://localhost:8000` para ver a aplicação em ação.

## Funcionalidades

- **Adicionar Livro**: Preencha o formulário com o título, gênero e autor do livro e clique em "Inserir Livro".
- **Listar Livros**: Veja a lista de livros adicionados na coluna da direita.
- **Editar Livro**: Clique no botão "Editar" ao lado de um livro na lista. Os dados do livro serão preenchidos no formulário, permitindo que sejam editados. Após as edições, clique em "Atualizar Livro".
- **Deletar Livro**: Clique no botão "Deletar" ao lado de um livro na lista para removê-lo do banco de dados.

## Estrutura do Projeto

- **Controller**: `LivroController.php` gerencia as operações CRUD para os livros.
- **Model**: `Livro.php` representa o modelo do livro.
- **Views**: 
  - `index.blade.php` contém a interface principal para adicionar, listar, editar e excluir livros.
- **Routes**: Definidas no arquivo `web.php`.

## Rotas

- **GET /livros**: Lista todos os livros.
- **POST /livros**: Adiciona um novo livro.
- **PUT /livros/{id}**: Atualiza um livro existente.
- **DELETE /livros/{id}**: Deleta um livro existente.
