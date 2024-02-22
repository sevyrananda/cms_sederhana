<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "admin") {
    header("Location: login.php");
    exit();
}

require_once "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Admin Dashboard - 84_Sevyra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/img/logo.png" class="d-inline-block align-top" width="30" height="30">
                Admin - Dasboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item" style="margin-right: 10px;">
                        <a class="nav-link" href="activity.php">Kelola Activity</a>
                    </li>
                </ul>
                <?php
                if (isset($_SESSION["username"])) {
                    echo '
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i> Hi, ' . $_SESSION["username"] . '
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item logout-btn" href="#">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </div>';
                }
                ?>

            </div>
        </div>
    </nav>

    <!-- Cover -->
    <div class="cover d-flex align-items-center justify-content-center text-center text-white" style="background-color: #313866; background-size: cover; background-position: center; height: 250px;">
        <div>
            <h1>Dashboard</h1>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Welcome, Admin!</h2>
        <p>This section is about total activity and total user</p>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Activity Lists</h5>
                    <?php
                    $sqlTotalActivities = "SELECT COUNT(*) AS total_activities FROM activities";
                    $resultTotalActivities = $conn->query($sqlTotalActivities);
                    if ($resultTotalActivities && $resultTotalActivities->num_rows > 0) {
                        $rowTotalActivities = $resultTotalActivities->fetch_assoc();
                        echo "<p class='card-text'>" . $rowTotalActivities["total_activities"] . " activities</p>";
                    } else {
                        echo "<p class='card-text'>No activities found.</p>";
                    }
                    ?>
                </div>
                <img src="assets/img/act.png" alt="Activity Icon" class="mx-auto mt-3">
                <br>
                <div class="card-footer text-center">
                    <a href="activity.php" class="btn btn-primary btn-sm">View Activities</a>
                </div>
            </div>
        </div>
    </div>


    <footer class="mt-5 py-4 bg-dark text-light">
        <div class="container d-flex justify-content-between align-items-center">
            <p>&copy; <?php echo date("Y"); ?> BPSDMP Kominfo Surabaya. All rights reserved.</p>
            <p>Made with 💙 by 84_Sevyra</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        //alert logout
        document.addEventListener("DOMContentLoaded", function() {
            // Logout button
            const logoutButton = document.querySelector(".logout-btn");

            // Add event listener for the logout button
            logoutButton.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent the default link behavior

                Swal.fire({
                    title: "Logout",
                    text: "Are you sure you want to log out?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, Logout"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to logout page
                        window.location.href = "logout.php";
                    }
                });
            });
        });
    </script>

</body>

</html>