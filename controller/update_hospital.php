<?php
require_once '../model/Hospital_Profile_Model.php';
session_start();

$hospital_username = $_SESSION['user']['username'] ?? '';
if (!$hospital_username) die("Hospital not logged in!");

$model = new Hospital_Profile_Model($conn);

$hospital = $model->getHospitalByUsername($hospital_username);
if (!$hospital) die("Hospital record not found.");

$hospital_id = intval($hospital['hospital_id']);

$data = [];
if (!empty($_POST['hospitalName'])) $data['hospital_name'] = trim($_POST['hospitalName']);
if (!empty($_POST['hospitalPhone'])) $data['phone'] = trim($_POST['hospitalPhone']);
if (!empty($_POST['hospitalAddress'])) $data['address'] = trim($_POST['hospitalAddress']);
if (!empty($_POST['hospitalCategory'])) $data['category'] = trim($_POST['hospitalCategory']);

$uploadDir = __DIR__ . '/../assets/uploads/hospital_documents/';
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

$fileFields = [
    'profileImage' => 'profile_image',
    'licenseFile' => 'license_file',
    'accreditationFile' => 'accreditation_file',
    'vatFile' => 'vat_file'
];


foreach ($fileFields as $inputName => $dbField) {
    if (!empty($_FILES[$inputName]['name']) && is_uploaded_file($_FILES[$inputName]['tmp_name'])) {
        // Get the original uploaded name
        $originalName = basename($_FILES[$inputName]['name']); 

        $filename = preg_replace('/[^A-Za-z0-9._-]/', '_', $originalName);

        $target = $uploadDir . $filename;

        $counter = 1;
        $fileInfo = pathinfo($filename);
        while (file_exists($target)) {
            $filename = $fileInfo['filename'] . '_' . $counter . '.' . $fileInfo['extension'];
            $target = $uploadDir . $filename;
            $counter++;
        }

        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $target)) {
            $data[$dbField] = $filename;
        }
    }
}


if (!empty($data)) {
    $success = $model->updateHospital($hospital_id, $hospital_username, $data);
    if ($success) {
        echo "<script>alert('Profile updated successfully'); window.location.href='../view/hospital_dashboard.php#profile';</script>";
    } else {
        echo "<script>alert('Failed to update profile'); window.location.href='../view/hospital_dashboard.php#profile';</script>";
    }
} else {
    echo "<script>alert('No changes detected'); window.location.href='../view/hospital_dashboard.php#profile';</script>";
}
