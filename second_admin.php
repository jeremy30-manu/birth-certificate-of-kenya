<?php
session_start();
if ($_SESSION['role'] !== 'second_admin') {
    header("Location: index.php");
    exit();
}
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $content = $_POST['content'];

    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO data (user_id, content) VALUES (:user_id, :content)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':content', $content);
    $stmt->execute();
}

$conn = get_db_connection();
$data = $conn->query("SELECT * FROM data WHERE user_id = {$_SESSION['user_id']}")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="second_admin.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h2 class="text-primary mb-4"> Second Admin Dashboard</h2>

                <div class="d-grid gap-3 mb-4">
                    <a href="register.php" class="btn btn-success btn-lg rounded-pill shadow">Register New User</a>
                    <a href="./log/fill.php" class="btn btn-warning btn-lg rounded-pill shadow">Data Entry</a>
                </div>

                <form method="POST" action="logout.php" class="mb-4">
                    <button type="submit" class="btn btn-danger btn-lg rounded-pill shadow">Logout</button>
                </form>

                <!-- <h3 class="text-secondary mb-3">Enter Data</h3>
                <form method="POST" action="" class="mb-4">
                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea id="content" name="content" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill shadow">Submit</button>
                </form>

                <h3 class="text-secondary mb-3">Your Data</h3>
                <?php if (!empty($data)): ?>
                    <ul class="list-group">
                        <?php foreach ($data as $row): ?>
                            <li class="list-group-item"><?php echo htmlspecialchars($row['content']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-center">No data available.</p>
                <?php endif; ?>
            </div> -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
