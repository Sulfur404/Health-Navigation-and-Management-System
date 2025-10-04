<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS: keep relative paths (no leading /) -->
    <link rel="stylesheet" href="view/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="view/css/style.css">
    <title>ACADEXA</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
        <a class="navbar-brand" href="#">ACADEXA</a>
        <span class="navbar-text">A Smart Online Learning Platform</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav custom-nav mx-auto">
                <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Courses</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Payment</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Profile</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
            </ul>
            <ul class="navbar-nav custom-nav ml-auto">
                <li class="nav-item custom-nav-item"><a href="#login" class="nav-link">Login</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a></li>
            </ul>
            <!-- ai jiaga sesion use kore login check korte hobe -->
        </div>
    </nav>

    <div class="container-fluid remove-vid-marg">
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
                <source src="asset/video/bashboradvideo.mp4" type="video/mp4" />
            </video>
            <div class="vid-overlay"></div>
            <div class="vid-content">
                <h1 class="my-content">Welcome to Acadexa</h1>
                <small class="my-content">Unlock Your Potential with Every Lesson</small><br />
                <a href="#" class="get-start-btn">Get Start</a>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-danger txt-banner">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-rupee-sign mr-3"></i> Money Back Guarantee*</h5>
            </div>
        </div>
    </div>

    <!-- Ai kkahne couse gula show korate hobe -->
    <?php 
        include __DIR__ . '/view/contact.php';
    ?> 

    <!-- Student feedback ar jonno code korte hobe and kisu external css and js apply korte hobe -->

    <div class="container-fluid bg-danger">
        <div class="row text-white text-center p-1">
            <div class="col-sm">
                <a class="text-white social-hover" href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#"><i class="fab fa-twitter"></i> Twitter</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#"><i class="fab fa-instagram"></i> Instagram</a>
            </div>
        </div>
    </div>

    <div class="container-fluid p-4" style="background-color:#E9ECEF">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About Us</h5>
                    <p>Acadexa provides smart online learning solutions, offering access to quality courses for students across Bangladesh and beyond.</p>
                </div>
                <div class="col-sm">
                    <h5>Category</h5>
                    <a class="text-dark" href="#">Web Development</a><br>
                    <a class="text-dark" href="#">Web Designing</a><br>
                    <a class="text-dark" href="#">Android App Development</a><br>
                    <a class="text-dark" href="#">iOS Development</a><br>
                    <a class="text-dark" href="#">Data Analysis</a><br>
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>
                        Acadexa<br>
                        Dhaka, Bangladesh<br>
                        Phone: +880123456789<br>
                        www.acadexa.com
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php
        include __DIR__ . '/view/footer.php';
    ?>
</body>
</html>
