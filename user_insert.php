<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gescolar_db"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $email = $passwordInput = "";
$nameErr = $emailErr = $passwordErr = $successMsg = $errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Nome é obrigatório";
        $valid = false;
    } else {
        $name = $conn->real_escape_string($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email é obrigatório";
        $valid = false;
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato de email inválido";
        $valid = false;
    } else {
        $email = $conn->real_escape_string($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Senha é obrigatória";
        $valid = false;
    } else {
        $passwordInput = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }

    if ($valid) {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$passwordInput')";
        if ($conn->query($sql) === TRUE) {
            $successMsg = "Usuário inserido com sucesso!";
            $name = $email = $passwordInput = "";
        } else {
            $errorMsg = "Erro ao inserir usuário: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inserir Usuário</title>
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
                    <a class="nav-link" href="user_management.php">Gestão de Usuário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="user_insert.php">Inserir Usuário</a>
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
            <h1>Inserir Usuário</h1>

            <?php if ($successMsg): ?>
                <div class="alert alert-success"><?php echo $successMsg; ?></div>
            <?php endif; ?>
            <?php if ($errorMsg): ?>
                <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
            <?php endif; ?>

            <form method="post" action="user_insert.php" novalidate>
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control <?php echo $nameErr ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" />
                    <div class="invalid-feedback"><?php echo $nameErr; ?></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?php echo $emailErr ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" />
                    <div class="invalid-feedback"><?php echo $emailErr; ?></div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control <?php echo $passwordErr ? 'is-invalid' : ''; ?>" id="password" name="password" />
                    <div class="invalid-feedback"><?php echo $passwordErr; ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Inserir Usuário</button>
            </form>
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
