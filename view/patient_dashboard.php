<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['usertype'] !== 'patient') {
    header("Location: ../view/signin_signup.php");
    exit();

}
$patientUsername = $_SESSION['user']['username']; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HNMS Patient Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link rel="icon" href="../assets/image/HNMS.png?v=2" type="image/png" sizes="32x32">
</head>

<body>
  <div class="sidebar" id="sidebar">
    <div class="logo">
      <img src="../assets/image/HNMS.png" alt="HNMS Logo">
      <span class="logo-text">HEALTH NAVIGATION MANAGEMENT SYSTEM</span>
    </div>
    <a href="#" class="active" onclick="showSection('dashboard')">Dashboard</a>
    <a href="#" onclick="showSection('hospitals')">Hospitals</a>
    <a href="#" onclick="showSection('doctors')">Find Doctors</a>
    <a href="#" onclick="showSection('appointmentsSection')">My Appointments</a>
    <a href="#" onclick="showSection('historySection')">History</a>
    <a href="#" onclick="showSection('profileSection')">My Profile</a>
    <a href="../controller/logout.php" class="log-out" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
  </div>

  <div class="main">
    <div class="navbar">
      <div class="menubar" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
      </div>
      <div class="navbar-logo">
        <img src="../assets/image/HNMS.png" alt="HNMS Logo">
        <span>HNMS</span>
      </div>
      <div class="navbar-links">
        <a href="#" onclick="showSection('doctors')">Find Doctor</a>
        <a href="#" onclick="showSection('appointmentsSection')">My Appointments</a>
      </div>
      <div class="navbar-right">
        <div class="profile">
          <img src="Profile.jpg" alt="Profile Picture" onclick="showProfile()">
          <p>Welcome,</p>
          <span class="" id="" onclick="showSection('profileSection')">
        <?php echo htmlspecialchars($patientUsername); ?>
           </span>
        </div>
        <div class="notification" onclick="showNotifications()">
          <i class="fa fa-bell"></i>
          <span class="notification-count" id="notificationCount">0</span>
        </div>
        <div class="settings">
          <a href="#" onclick="showSection('changePassword')">
            <i class="fa fa-cog"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="content">
      <?php include "../view/pdash_section.php"; ?>
      <?php include "../view/patient_Find_Hospital.php"; ?>
      <?php include "../view/find_Doctor.php"; ?>
      <?php include "../view/book_Appointment.php"; ?>
      <?php include "../view/my_appointments.php"; ?>
      <?php include "../view/patient_history.php"; ?>
      <?php include "../view/patient_Profile.php"; ?>
    </div>
      <?php include "../view/change_Password.php"; ?>
      <?php include "../view/notification_panel.php"; ?>
  </div>
  <script src="../assets/js/patient_dashboard.js"></script>
</body>
</html>
