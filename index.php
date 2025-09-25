<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="view/css/style.css">


    <title>Document</title>

</head>
<body>
    

    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
    <a class="navbar-brand" href="#">ACADEXA</a>
    <span class="navbar-text">A Smart Online Learning Platform</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav custom-nav mx-auto" >
            <li class="nav-item custom-nav-item" ><a href="index.php" class="nav-link ">Home</a></li>
            <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Courses</a></li>
            <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Payment</a></li>
            <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Profile</a></li>
            <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
        </ul>
        <ul class="navbar-nav custom-nav ml-auto" >
            <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Logout</a></li>
            <li class="nav-item custom-nav-item "><a href="#" class="nav-link">Signup</a></li>
        </ul>
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
            <h5> <i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5>
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

    <div class="container mt-5"> <!-- Start Course -->
      <h1 class="text-center">Popular Course</h1>
      
      <!-- <div class="card-deck mt-4"> //1st course cart
        <?php
        $sql = "SELECT * FROM course LIMIT 3";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ 
          while($row = $result->fetch_assoc()){
            $course_id = $row['course_id'];
            echo '
            <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
              <div class="card">
                <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar" />
                <div class="card-body">
                  <h5 class="card-title">'.$row['course_name'].'</h5>
                  <p class="card-text">'.$row['course_desc'].'</p>
                </div>
                <div class="card-footer">
                  <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#8377 '.$row['course_price'].'<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                </div>
              </div>
            </a>  ';
          }
        }
        ?>   
      </div>  
      <div class="card-deck mt-4"> //2nd cart course
        <?php
          $sql = "SELECT * FROM course LIMIT 3,3";
          $result = $conn->query($sql);
          if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
              $course_id = $row['course_id'];
              echo '
                <a href="coursedetails.php?course_id='.$course_id.'"  class="btn" style="text-align: left; padding:0px;">
                  <div class="card">
                    <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                      <h5 class="card-title">'.$row['course_name'].'</h5>
                      <p class="card-text">'.$row['course_desc'].'</p>
                    </div>
                    <div class="card-footer">
                      <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#8377 '.$row['course_price'].'<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                  </div>
                </a>  ';
            }
          }
        ?>  -->
      </div>   
      <div class="text-center m-2">
        <a class="btn btn-danger btn-sm" href="courses.php">View All Course</a> 
      </div>
    </div>  <!-- End  Course -->

     <?php 
    include('view\courses.php'); 
    ?> 


    <script src="view/js/jquery.min.js"></script>
    <script src="view/js/popper.min.js"></script>
    <script src="view/js/bootstrap.min.js"></script>
    <script src="view/js/all.min.js"></script>
</body>
</html>