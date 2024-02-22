<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "admin";
    $password = "bpsdmp";

    if ($_POST["username"] == $username && $_POST["password"] == $password) {
        $_SESSION["username"] = $username;
        $loginSuccess = "Login successful. Redirecting to dashboard.";
        echo '<div class="alert alert-success">' . $loginSuccess . '</div>';
        echo '<script>setTimeout(function(){ window.location.href = "dashboard.php"; }, 2000);</script>';
    } else {
        $loginError = "Invalid credentials!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Login - 84_Sevyra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card col-md-4">
            <div class="card-body">
                <h2 class="card-title text-center">Administrator Login</h2>
                <div class="text-center">
                    <img src="assets/img/logo.jpg" alt="BPSDMP Kominfo Logo" class="img-fluid mt-3">
                </div>
                <?php if (isset($loginError)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $loginError ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                            <span class="input-group-text">
                                <i class="far fa-eye" id="togglePassword"></i>
                            </span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="index.php">Back to Landing Page</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="bg-light text-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <p>&copy; <?php echo date("Y"); ?> BPSDMP Kominfo Surabaya. All rights reserved.</p>
            <p>Made with 💙 by 84_Sevyra</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const togglePasswordIcon = document.getElementById("togglePassword");

            togglePasswordIcon.addEventListener("click", function() {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    togglePasswordIcon.classList.remove("far", "fa-eye");
                    togglePasswordIcon.classList.add("fas", "fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    togglePasswordIcon.classList.remove("fas", "fa-eye-slash");
                    togglePasswordIcon.classList.add("far", "fa-eye");
                }
            });
        });
    </script>
</body>

</html>