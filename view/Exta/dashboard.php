<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - LMS</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

    <nav class="navbar">
        <a href="#" class="navbar-brand">Acadexa</a>
        <ul class="navbar-nav">
            <li><a href="dashboard.html" class="nav-link active">Dashboard</a></li>
            <li><a href="courses.html" class="nav-link">Courses</a></li>
            <li><a href="#" class="nav-link">Grades</a></li>
            <li><a href="#" class="nav-link">Messages</a></li>
        </ul>
        <div>
            <a href="#" class="btn btn-secondary">My Profile</a>
            <a href="#" class="btn btn-primary">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-header">Welcome, Alex!</h1>

        <div class="row" style="grid-template-columns: 2fr 1fr; align-items: flex-start;">

            <!-- Left Column: My Courses -->
            <div style="display: flex; flex-direction: column; gap: 2rem;">
                <div class="widget">
                    <h2 class="widget-title">My Courses</h2>
                    <div class="row">
                        <!-- Enrolled Course Card 1 -->
                        <div class="card">
                            <img src="https://placehold.co/400x200/1a7431/white?text=Web+Dev" alt="Course Image" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">Web Development Bootcamp</h3>
                                <p class="card-text">Keep up the great work! Next assignment is due Friday.</p>
                                <a href="#" class="btn btn-primary">Continue</a>
                            </div>
                        </div>
                        <!-- Enrolled Course Card 2 -->
                        <div class="card">
                            <img src="https://placehold.co/400x200/0056b3/white?text=Calculus" alt="Course Image" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">Introduction to Calculus</h3>
                                <p class="card-text">You have a quiz next week. Start preparing now!</p>
                                <a href="#" class="btn btn-primary">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 2rem;">
                <!-- Upcoming Deadlines Widget -->
                <div class="widget">
                    <h2 class="widget-title">Upcoming Deadlines</h2>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span>Web Dev - Project 2</span>
                            <span class="badge badge-warning">Oct 25</span>
                        </li>
                        <li class="list-group-item">
                            <span>Calculus - Quiz 4</span>
                            <span class="badge badge-warning">Oct 28</span>
                        </li>
                        <li class="list-group-item">
                            <span>Web Dev - Final Exam</span>
                            <span class="badge badge-warning">Nov 5</span>
                        </li>
                    </ul>
                </div>

                <div class="widget">
                    <h2 class="widget-title">Recent Grades</h2>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span>Web Dev - Project 1</span>
                            <span class="badge badge-success">A</span>
                        </li>
                        <li class="list-group-item">
                            <span>Calculus - Midterm</span>
                            <span class="badge badge-success">B+</span>
                        </li>
                         <li class="list-group-item">
                            <span>Physics - Assignment 1</span>
                            <span class="badge badge-success">A-</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Acadexa. All Rights Reserved.</p>
    </footer>

</body>
</html>
