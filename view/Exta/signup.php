<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Acadexa</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

    <nav class="navbar">
        <a href="courses.html" class="navbar-brand">Acadexa</a>
        <ul class="navbar-nav">
            <li><a href="courses.html" class="nav-link">Home</a></li>
            <li><a href="courses.html" class="nav-link">Courses</a></li>
            <li><a href="#" class="nav-link">About</a></li>
            <li><a href="#" class="nav-link">Contact</a></li>
        </ul>
        <div>
            <a href="login.html" class="btn btn-secondary">Login</a>
            <a href="signup.html" class="btn btn-primary">Register</a>
        </div>
    </nav>

    <div class="container">
        <div class="form-container">
            <h1 class="page-header" style="text-align: center; margin-bottom: 1.5rem;">Create Your Account</h1>
            <form>
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label for="role">I am a...</label>
                    <select id="role" class="form-control">
                        <option value="student">Student</option>
                        <option value="parent">Parent/Guardian</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 4px;">Create Account</button>
                <p class="form-text">
                    Already have an account? <a href="login.html">Log In</a>
                </p>
            </form>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Acadexa. All Rights Reserved.</p>
    </footer>

</body>
</html>
