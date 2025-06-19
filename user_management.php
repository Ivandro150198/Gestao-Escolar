<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestão de Usuário</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="path-to/adminlte.min.css" />
    <style>
        /* Custom nav bar color overrides */
        .main-header.navbar {
            background-color: #004080 !important; /* Dark blue background */
            color: #ffffff !important; /* White text */
        }
        .main-header.navbar .nav-link {
            color: #ffffff !important; /* White text for nav links */
        }
        .main-header.navbar .nav-link.active {
            font-weight: bold;
            color: #ffcc00 !important; /* Highlight active link with yellow */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="user_management.php">Gestão de Usuário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aluno.php">Aluno</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="funcionario.php">Funcionário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="financeiro.php">Financeiro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="resultados.php">Resultados</a>
                </li>
            </ul>
        </nav>

        <!-- Content Wrapper -->
        <div class="content-wrapper p-3">
            <h1>Gestão de Usuário</h1>
            <p>Esta é a tela de gestão de usuários. Aqui você pode adicionar, editar e remover usuários.</p>
            <a href="user_insert.php" class="btn btn-success mb-3">Adicionar Usuário</a>
            <!-- Example table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>João Silva</td>
                        <td>joao@example.com</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">Editar</a>
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </td>
                    </tr>
                    <!-- More rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE JS -->
    <script src="path-to/adminlte.min.js"></script>
</body>
</html>
