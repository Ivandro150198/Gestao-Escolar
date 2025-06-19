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

// Queries to get counts
$userCount = 0;
$studentCount = 0;
$employeeCount = 0;
$financeCount = 0;
$resultsCount = 0;

$userResult = $conn->query("SELECT COUNT(*) as count FROM users");
if ($userResult) {
    $row = $userResult->fetch_assoc();
    $userCount = $row['count'];
}

$studentResult = $conn->query("SELECT COUNT(*) as count FROM alunos");
if ($studentResult) {
    $row = $studentResult->fetch_assoc();
    $studentCount = $row['count'];
}

$employeeResult = $conn->query("SELECT COUNT(*) as count FROM funcionarios");
if ($employeeResult) {
    $row = $employeeResult->fetch_assoc();
    $employeeCount = $row['count'];
}

$financeResult = $conn->query("SELECT COUNT(*) as count FROM financeiro");
if ($financeResult) {
    $row = $financeResult->fetch_assoc();
    $financeCount = $row['count'];
}

$resultsResult = $conn->query("SELECT COUNT(*) as count FROM resultados");
if ($resultsResult) {
    $row = $resultsResult->fetch_assoc();
    $resultsCount = $row['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AdminLTE Dashboard</title>
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
        /* Dashboard boxes */
        .dashboard-box {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .dashboard-box h3 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .dashboard-box p {
            font-size: 1.2rem;
            color: #666;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_management.php">Gestão de Usuário</a>
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
            <h1>Dashboard</h1>
            <p>Welcome to the AdminLTE Dashboard. Use the navigation menu to access different functionalities.</p>
            <div class="row">
                <div class="col-md-2 dashboard-box">
                    <h3><?php echo $userCount; ?></h3>
                    <p>Usuários</p>
                </div>
                <div class="col-md-2 dashboard-box">
                    <h3><?php echo $studentCount; ?></h3>
                    <p>Alunos</p>
                </div>
                <div class="col-md-2 dashboard-box">
                    <h3><?php echo $employeeCount; ?></h3>
                    <p>Funcionários</p>
                </div>
                <div class="col-md-2 dashboard-box">
                    <h3><?php echo $financeCount; ?></h3>
                    <p>Registros Financeiros</p>
                </div>
                <div class="col-md-2 dashboard-box">
                    <h3><?php echo $resultsCount; ?></h3>
                    <p>Resultados</p>
                </div>
            </div>
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
