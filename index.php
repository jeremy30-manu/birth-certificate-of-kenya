<?php
session_start();
require 'db.php';

function is_first_user() {
    $conn = get_db_connection();
    $stmt = $conn->query("SELECT * FROM users");
    $user = $stmt->fetch();
    return $user === false;
}

$is_first_user = is_first_user();

if (isset($_SESSION['role'])) {
    switch ($_SESSION['role']) {
        case 'main_admin':
            header("Location: main_admin.php");
            exit();
        case 'second_admin':
            header("Location: second_admin.php");
            exit();
        case 'user':
            header("Location: user_dashboard.php");
            exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $is_first_user ? 'Register' : 'Login'; ?> Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h2 class="text-center mb-4"><?php echo $is_first_user ? 'Register' : 'Login'; ?></h2>
                
                <?php if ($is_first_user): ?>
                    <form method="POST" action="register_first_user.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required placeholder="Enter username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill shadow">Register</button>
                    </form>
                <?php else: ?>
                    <form method="POST" action="login.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required placeholder="Enter username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-success w-100 rounded-pill shadow">Login</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
