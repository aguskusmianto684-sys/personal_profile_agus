<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    echo "<script>
        alert('Anda sudah login');
        window.location.href='../../pages/dashboard/index.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin</title>
    <link rel="stylesheet" href="../../template-admin/template/src/assets/css/styles.min.css">
    <link rel="shortcut icon" href="../../template-admin/template/src/assets/images/profile/user-1.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e90ff, #0d6efd, #0a58ca);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            color: white;
            text-align: center;
            padding: 20px;
        }

        .form-control {
            border-radius: 10px;
        }

        .input-group-text {
            background-color: #f0f4ff;
            border: none;
        }

        .btn-primary {
            border-radius: 10px;
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0a58ca, #084298);
            transform: translateY(-1px);
        }

        .alert-danger {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="card" style="width: 370px;">
        <div class="card-header">
            <h4 class="mb-0"><i class="bi bi-shield-lock-fill me-2"></i>Login Admin</h4>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <form action="../../actions/auth/login_proses.php" method="POST">
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill text-primary"></i></span>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="passwordInput" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill text-primary"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required />
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="bi bi-eye-slash" id="iconEye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Login
                </button>
            </form>
            <p class="text-center mt-3">Belum punya akun? <a href="register.php"><u>Register di sini</u></a></p>
        </div>
    </div>

    <script>
        const toggle = document.getElementById("togglePassword");
        const password = document.getElementById("password");
        const icon = document.getElementById("iconEye");

        toggle.addEventListener("click", () => {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            icon.classList.toggle("bi-eye");
            icon.classList.toggle("bi-eye-slash");
        });
    </script>
</body>

</html>
