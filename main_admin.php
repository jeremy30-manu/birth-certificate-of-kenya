<?php
session_start();
if ($_SESSION['role'] !== 'main_admin') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="main_admin.css">
    <style>
        .btn-lg {
            font-size: 1.5rem;
        }
        
    </style>
</head>
<body class="bg-light">
    <h2 class="text-primary mb-4"><marquee>Main Admin Dashboard</marquee></h2>
    <div class="container mt-5">
        <form method="POST" action="logout.php">
            <button type="submit" class="btn btn-danger btn-lg rounded-pill shadow mb-4">Logout</button>
        </form>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <a href="register.php" class="btn btn-primary btn-lg rounded-pill shadow d-block w-100">Register New User</a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="./correction_form.php" class="btn btn-secondary btn-lg rounded-pill shadow d-block w-100">Correction</a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="./log/fill.php" class="btn btn-success btn-lg rounded-pill shadow d-block w-100">Data Entry</a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="./change_roles.php" class="btn btn-info btn-lg rounded-pill shadow d-block w-100">Change Roles</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
