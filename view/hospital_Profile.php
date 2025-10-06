<?php
require_once '../model/Hospital_Profile_Model.php';

$hospital_username = $_SESSION['user']['username'] ?? '';
if (!$hospital_username) die("Hospital not logged in!");

$model = new Hospital_Profile_Model($conn);
$hospital = $model->getHospitalByUsername($hospital_username);

if (!$hospital) die("Hospital record not found.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Hospital Profile</title>
</head>
<body>

<div id="hospitalProfile" class="section" style="display:none;">
  <h3>Hospital Profile</h3>
  <div class="profile-container">

    <div id="hospitalInfoContainer" class="profile-box">
      <h4>Profile Information</h4><br>
      <form id="hospitalProfileForm" action="../controller/update_hospital.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="hospitalId" name="hospitalId" value="<?= htmlspecialchars($hospital['username']) ?>">
        <div class="file-input-container">
          <img id="profileImagePreview"
             src="<?= !empty($hospital['profile_image']) ? "../assets/uploads/hospital_documents/" . htmlspecialchars($hospital['profile_image']) : "default-profile.png" ?>"
             alt="Profile Image" class="doc-preview">
        </div>
        <div class="profile-field">
          <label>Username:</label>
          <input type="text" id="hospitalUsername" value="<?= htmlspecialchars($hospital['username']) ?>" readonly>
        </div>

        <div class="profile-field">
          <label>Hospital Name:</label>
          <input type="text" id="hospitalName" name="hospitalName" value="<?= htmlspecialchars($hospital['hospital_name']) ?>">
        </div>
        <div class="profile-field">
          <label>Email:</label>
          <input type="email" id="hospitalEmail" name="hospitalEmail" value="<?= htmlspecialchars($hospital['email']) ?>" readonly>
        </div>
        <div class="profile-field">
          <label>Phone:</label>
          <input type="text" id="hospitalPhone" name="hospitalPhone" value="<?= htmlspecialchars($hospital['phone']) ?>">
        </div>
        <div class="profile-field">
          <label>Address:</label>
          <input type="text" id="hospitalAddress" name="hospitalAddress" value="<?= htmlspecialchars($hospital['address']) ?>">
        </div>

        <div class="profile-field">
          <label>Category:</label>
          <select id="hospitalCategory" name="hospitalCategory">
            <option value="general" <?= $hospital['category'] == 'general' ? 'selected' : '' ?>>General</option>
            <option value="specialized" <?= $hospital['category'] == 'specialized' ? 'selected' : '' ?>>Specialized</option>
            <option value="teaching" <?= $hospital['category'] == 'teaching' ? 'selected' : '' ?>>Teaching</option>
          </select>
        </div>
    </div>