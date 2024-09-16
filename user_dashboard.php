<?php
session_start();
if ($_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit();
}
require 'db.php';

$conn = get_db_connection();
$data = $conn->query("SELECT * FROM data WHERE user_id = {$_SESSION['user_id']}")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="user_dashboard.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h2 class="text-primary mb-4">User Dashboard</h2>
                
                <div class="d-grid gap-3">
                    <a href="./log/view.php" class="btn btn-primary btn-lg rounded-pill shadow">Data Entry</a>
                    
                    <form method="POST" action="logout.php">
                        <button type="submit" class="btn btn-danger btn-lg rounded-pill shadow">Logout</button>
                    </form>
                </div>

                <!-- Display Data -->
                <?php if (!empty($data)): ?>
                    <ul class="list-group mt-4">
                        <?php foreach ($data as $row): ?>
                            <li class="list-group-item"><?php echo htmlspecialchars($row['content']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="mt-4 text-center">No data available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
