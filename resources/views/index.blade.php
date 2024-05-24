<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros CRUD</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2847/2847502.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <!-- NavBar -->
    <nav class="navbar bg-light border-bottom border-body" data-bs-theme="light">
        <div class="container-fluid">
            <div class="navbar-brand">
                <img src="https://cdn-icons-png.flaticon.com/512/2847/2847502.png" alt="logo" width="30" height="24">
                <span>Administrar Livros</span>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="row">
            <!-- Coluna da esquerda inserir livros -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header" style="display: flex; align-items: center;">
                        <img src="https://cdn-icons-png.flaticon.com/512/1004/1004733.png" alt="logo" width="30" height="24" style="margin-right: 10px;">
                        <h5 class="mb-0">Inserir Novo Livro</h5>
                    </div>
                    <div class="card-body">
                        <form id="livro-form" action="{{ route('livro.store') }}" method="POST">
                            @csrf
                            <input type="hidden" id="livro-id" name="livro_id">
                            <input type="hidden" id="form-method" name="_method" value="POST">
                            <div class="form-group">
                                <label for="nome">Título</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="form-group">
                                <label for="genero">Gênero</label>
                                <input type="text" class="form-control" id="genero" name="genero" required>
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input type="text" class="form-control" id="autor" name="autor" required>
                            </div>
                            <button type="submit" class="btn btn-success">Inserir Livro</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Coluna da direita listagem de livros -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header" style="display: flex; align-items: center;">
                        <img src="https://cdn-icons-png.flaticon.com/512/1518/1518972.png" alt="logo2" width="30" height="24" style="margin-right: 10px;">
                        <h5 class="mb-0">Livros</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Título</th>
                                    <th>Gênero</th>
                                    <th>Autor</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($livros as $livro)
                                    <tr>
                                        <td>{{ $livro->nome }}</td>
                                        <td>{{ $livro->genero }}</td>
                                        <td>{{ $livro->autor }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm edit-btn"
                                                    campo-id="{{ $livro->id }}"
                                                    campo-nome="{{ $livro->nome }}"
                                                    campo-genero="{{ $livro->genero }}"
                                                    campo-autor="{{ $livro->autor }}">
                                                Editar
                                            </button>
                                            <form action="{{ route('livro.destroy', $livro->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--Script para carregar dados de livro para atualizar-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-btn');
            const form = document.getElementById('livro-form');
            const formMethod = document.getElementById('form-method');

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const livroId = this.getAttribute('campo-id');
                    const nome = this.getAttribute('campo-nome');
                    const genero = this.getAttribute('campo-genero');
                    const autor = this.getAttribute('campo-autor');

                    form.action = `/livros/${livroId}`;
                    formMethod.value = 'PUT';
                    form.querySelector('#livro-id').value = livroId;
                    form.querySelector('#nome').value = nome;
                    form.querySelector('#genero').value = genero;
                    form.querySelector('#autor').value = autor;
                    form.querySelector('button[type="submit"]').textContent = 'Atualizar Livro';
                });
            });
        });
    </script>
</body>
</html>
