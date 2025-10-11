<?php
require_once '../model/Patient_Model.php';
session_start();

$patient_username = $_SESSION['user']['username'] ?? '';
if (!$patient_username) die("Patient not logged in!");

$model = new Patient_Profile_Model($conn);
$patient = $model->getPatientByUsername($patient_username);
if (!$patient) die("Patient record not found.");

$patient_id = intval($patient['patient_id']);
$data = [];

if (!empty($_POST['patientName'])) $data['full_name'] = trim($_POST['patientName']);
if (!empty($_POST['patientPhone'])) $data['contact'] = trim($_POST['patientPhone']);
if (!empty($_POST['patientGender'])) $data['gender'] = trim($_POST['patientGender']);
if (!empty($_POST['patientDOB'])) $data['dob'] = trim($_POST['patientDOB']);
if (!empty($_POST['patientBloodGroup'])) $data['blood_group'] = trim($_POST['patientBloodGroup']);
if (!empty($_POST['patientAddress'])) $data['address'] = trim($_POST['patientAddress']);

$uploadDir = __DIR__ . '/../assets/uploads/patient_documents/';
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

$fileFields = [
    'editPatientPhoto' => 'profile_image',
    'editPatientID' => 'id_proof',
    'editPatientMedical' => 'medical_record'
];

foreach ($fileFields as $inputName => $dbField) {
    if (!empty($_FILES[$inputName]['name']) && is_uploaded_file($_FILES[$inputName]['tmp_name'])) {
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
    $success = $model->updatePatient($patient_id, $patient_username, $data);
    if ($success) {
        echo "<script>alert('Profile updated successfully'); window.location.href='../view/patient_dashboard.php#profile';</script>";
    } else {
        echo "<script>alert('Failed to update profile'); window.location.href='../view/patient_dashboard.php#profile';</script>";
    }
} else {
    echo "<script>alert('No changes detected'); window.location.href='../view/patient_dashboard.php#profile';</script>";
}
