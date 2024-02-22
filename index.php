<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
    <title>84_Sevyra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .read-more-link {
            color: #3498db;
            cursor: pointer;
            display: inline-block;
            margin-top: 5px;
        }

        .container[id] {
            scroll-margin-top: 80px;
        }

        .card-img-top {
            transition: transform 0.3s ease-in-out;
        }

        .card-img-top:hover {
            transform: scale(0.9);
        }
        
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/img/logo.png" class="d-inline-block align-top" width="30" height="30">
                BPSDMP Kominfo Surabaya
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <a class="nav-link" href="login.php" style="margin-left: 15px;">
                    <button class="btn btn-primary">Login Administrator</button>
                </a>
            </div>
        </div>
    </nav>

    <!-- Cover -->
    <div class="cover d-flex align-items-center justify-content-center text-center text-white" style="background-color: #3498db; background-image: url('path/to/your/cover-image.jpg'); background-size: cover; background-position: center; height: 500px;">
        <div>
            <h1>Welcome to BPSDMP Kominfo Surabaya</h1>
        </div>
    </div>

    <!-- Content Home -->
    <div class="container mt-5" id="home">
        <h2>Upcoming Activities</h2>
        <div id="activityCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                require_once "koneksi.php";

                $sql = "SELECT * FROM activities ORDER BY activity_date DESC";
                $result = $conn->query($sql);

                $cardCounter = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($cardCounter % 3 == 0) {
                            $activeClass = ($cardCounter === 0) ? 'active' : '';
                            echo "<div class='carousel-item $activeClass'>";
                            echo "<div class='row'>";
                        }
                        echo "<div class='col-md-4 mb-4'>";
                        echo "<div class='card h-100'>";
                        if (!empty($row["activity_image"])) {
                            echo "<img src='" . $row["activity_image"] . "' class='card-img-top' alt='Activity Image'>";
                        }
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $row["activity_title"] . "</h5>";
                        echo "<p class='card-text'>" . substr($row["activity_description"], 0, 100) . "<span class='read-more-content' style='display:none;'>" . $row["activity_description"] . "</span></p>";
                        echo "<a href='#' class='read-more-link'>Read More</a>";
                        echo "<p class='card-text'><small class='text-muted'><i class='far fa-calendar-alt'></i> " . $row["activity_date"] . "</small></p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        if (($cardCounter + 1) % 3 == 0 || $cardCounter + 1 == $result->num_rows) {
                            echo "</div>";
                            echo "</div>";
                        }

                        $cardCounter++;
                    }
                } else {
                    echo "<div class='col-md-12'>No activities found.</div>";
                }

                $conn->close();
                ?>
            </div>
        </div>
        <div class="mt-4">
            <p>Next or Previous</p>
            <button class="btn btn-primary prev-slide" data-bs-target="#activityCarousel" data-bs-slide="prev"><</button>
            <button class="btn btn-primary next-slide" data-bs-target="#activityCarousel" data-bs-slide="next">></button>
        </div>
    </div>

    <!-- Content About -->
    <div class="container mt-5" id="about">
        <h2>About BPSDMP Kominfo Surabaya</h2>
        <div class="row">
            <div class="col-md-6">
                <img src="assets/img/logo.jpg" alt="BPSDMP Kominfo Surabaya" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p class="text-justify">
                    BPSDMP Kominfo Surabaya is a leading training and development center in the field of information and communication technology. We are dedicated to providing high-quality training programs, workshops, and seminars to empower individuals with the latest skills and knowledge in the digital world.
                </p>
                <p class="text-justify">
                    Our mission is to bridge the digital skills gap and contribute to the growth of the IT industry in the region. With a team of experienced professionals and state-of-the-art facilities, we strive to equip our participants with the tools they need to excel in the fast-paced tech landscape.
                </p>
                <p class="text-justify">
                    Join us in our journey to shape the future of technology education and innovation. Whether you're a beginner or an experienced professional, BPSDMP Kominfo Surabaya has a program that will help you thrive in the digital era.
                </p>
                <p class="text-justify">
                    Our commitment to excellence and continuous learning sets us apart as a premier institute in the field of ICT education. Explore the opportunities we offer and take a step towards a successful and fulfilling tech career.
                </p>
                <a href="https://balitbangsdm.kominfo.go.id/upt/surabaya/" class="btn btn-outline-primary" target="_blank" rel="noopener noreferrer">More Info</a>
            </div>
        </div>
    </div>

    <!-- Content Contact -->
    <div class="container mt-5" id="contact">
        <h3>Contact Information</h3>
        <p>Balai Pengembangan Sumber Daya Manusia dan Penelitian Komunikasi dan Informatika Surabaya
            Badan Penelitian dan Pengembangan Sumber Daya Manusia - Kementerian Komunikasi dan Informatika Republik Indonesia</p>
        <p>
            Address: Jl. Raya Ketajen No.36, Ketajen, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254
        </p>
        <div style="width: 100%; height: 400px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1971.3621288617187!2d112.62546922962585!3d-7.443406699270727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fe3e0c24eb37%3A0x4a4aa48eaaee16a5!2sJl.%20Raya%20Ketajen%20No.36%2C%20Ketajen%2C%20Kec.%20Gedangan%2C%20Kabupaten%20Sidoarjo%2C%20Jawa%20Timur%2061254%2C%20Indonesia!5e0!3m2!1sen!2s!4v1629122993373!5m2!1sen!2s" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
        const readMoreLinks = document.querySelectorAll('.read-more-link');

        readMoreLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const cardText = this.parentNode.querySelector('.card-text');
                const readMoreContent = this.parentNode.querySelector('.read-more-content');

                if (cardText && readMoreContent) {
                    if (readMoreContent.style.display === 'none') {
                        readMoreContent.style.display = 'block';
                        this.textContent = 'Read Less';
                    } else {
                        readMoreContent.style.display = 'none';
                        this.textContent = 'Read More';
                    }
                }
            });
        });
    </script>

</body>

</html>