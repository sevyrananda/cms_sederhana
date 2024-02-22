<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "admin") {
    header("Location: login.php");
    exit();
}

require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_activity"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $date = $_POST["date"];

    // Handle uploaded image
    $targetDir = "uploads/";
    $imagePath = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

    $sql = "INSERT INTO activities (activity_title, activity_description, activity_date, activity_image) 
            VALUES ('$title', '$description', '$date', '$imagePath')";

    $conn->query($sql);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_activity"])) {
    $editId = $_POST["edit_id"];
    $editTitle = $_POST["edit_title"];
    $editDescription = $_POST["edit_description"];
    $editDate = $_POST["edit_date"]; // Make sure the correct name attribute is used

    // Handle updated image if a new image was provided
    $editImagePath = ""; // Initialize the image path variable

    if ($_FILES["edit_image"]["size"] > 0) {
        $targetDir = "uploads/";
        $editImagePath = $targetDir . basename($_FILES["edit_image"]["name"]);
        move_uploaded_file($_FILES["edit_image"]["tmp_name"], $editImagePath);
    }

    // Update activity in the database including the image if provided
    if (!empty($editImagePath)) {
        $sql = "UPDATE activities 
                SET activity_title='$editTitle', activity_description='$editDescription', activity_date='$editDate', activity_image='$editImagePath'
                WHERE id='$editId'";
    } else {
        $sql = "UPDATE activities 
                SET activity_title='$editTitle', activity_description='$editDescription', activity_date='$editDate'
                WHERE id='$editId'";
    }

    $conn->query($sql);
}

if (isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];
    $sql = "DELETE FROM activities WHERE id='$delete_id'";
    $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Kelola Activity - 84_Sevyra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/img/logo.png" class="d-inline-block align-top" width="30" height="30">
                Admin - Kelola Activity
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
    <div class="cover d-flex align-items-center justify-content-center text-center text-white" style="background-color: #900C3F; background-size: cover; background-position: center; height: 250px;">
        <div>
            <h1>Kelola Activity</h1>
        </div>
    </div>

    <div class="container mt-5">
        <h3>Activity List</h3>
        <!-- Add New Activity Button -->
        <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addActivityModal">
            Add New Activity
        </button>
        <br>

        <!-- Success Alerts Area -->
        <div id="success-alerts">
            <?php
            // Display success alerts here
            if (isset($_POST["add_activity"])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Activity Added: The activity has been successfully added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }

            if (isset($_POST["update_activity"])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Activity Edited: The activity has been successfully edited.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }

            ?>
        </div>

        <br>
        <br>
        <?php
        $sql = "SELECT * FROM activities ORDER BY activity_date DESC";
        $result = $conn->query($sql);

        echo "<table class='table table-bordered'>";
        echo "<thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
            </thead>";
        echo "<tbody>";

        if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                // echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["activity_title"] . "</td>";
                echo "<td>" . $row["activity_description"] . "</td>";
                echo "<td>" . $row["activity_date"] . "</td>";
                echo "<td><img src='" . $row["activity_image"] . "' width='100' alt='Activity Image'></td>";
                echo "<td>
                            <button class='btn btn-warning edit-btn' data-id='" . $row["id"] . "' data-title='" . $row["activity_title"] . "' data-description='" . $row["activity_description"] . "' data-date='" . $row["activity_date"] . "' data-bs-toggle='modal' data-bs-target='#editActivityModal'>
                                <i class='fas fa-edit'></i>
                            </button>
                            <button class='btn btn-danger delete-btn' data-id='" . $row["id"] . "'>
                                <i class='fas fa-trash'></i>
                            </button>
                        </td>";
                echo "</tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='6'>No activities found.</td></tr>";
        }

        echo "</tbody></table>";

        $conn->close();
        ?>

        <!-- Add New Activity Modal -->
        <div class="modal fade" id="addActivityModal" tabindex="-1" aria-labelledby="addActivityModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addActivityModalLabel">Add New Activity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="add_activity">Add Activity</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Activity Modal -->
        <div class="modal fade" id="editActivityModal" tabindex="-1" aria-labelledby="editActivityModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editActivityModalLabel">Edit Activity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Edit Activity Form -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="editTitle" name="edit_title" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="editDescription" name="edit_description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="editDate" name="edit_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="editImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="editImage" name="edit_image" accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="editActivityId" name="edit_id">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update_activity">Update Activity</button>
                        </div>
                    </form>
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
        //alert delete
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll(".delete-btn");

            deleteButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const activityId = this.getAttribute("data-id");
                    Swal.fire({
                        title: "Are you sure?",
                        text: "This action cannot be undone.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to delete URL
                            window.location.href = `activity.php?delete_id=${activityId}`;
                        } else {
                            // Handle cancel or dismiss actions here
                        }
                    }).then(() => {
                        // Display Bootstrap alert for successful deletion
                        const deleteSuccessAlert = document.createElement("div");
                        deleteSuccessAlert.className = "alert alert-success alert-dismissible fade show";
                        deleteSuccessAlert.role = "alert";
                        deleteSuccessAlert.textContent = "Data berhasil dihapus.";
                        const successAlertsContainer = document.getElementById("success-alerts");
                        successAlertsContainer.appendChild(deleteSuccessAlert);
                    });
                });
            });
        });


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

        //edit modal
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".edit-btn");
            const editTitleInput = document.getElementById("editTitle");
            const editDescriptionInput = document.getElementById("editDescription");
            const editDateInput = document.getElementById("editDate");
            const editActivityIdInput = document.getElementById("editActivityId");

            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const activityId = this.getAttribute("data-id");
                    const title = this.getAttribute("data-title");
                    const description = this.getAttribute("data-description");
                    const date = this.getAttribute("data-date");

                    // Populate form fields
                    editTitleInput.value = title;
                    editDescriptionInput.value = description;
                    editDateInput.value = date;
                    editActivityIdInput.value = activityId;
                });
            });
        });
    </script>

</body>

</html>