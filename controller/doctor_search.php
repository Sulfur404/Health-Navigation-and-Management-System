<?php
include "../config/db_connection.php";
include "../model/DoctorModel.php";

$keyword = $_GET['keyword'] ?? '';
$specialization = $_GET['specialization'] ?? '';

$doctorModel = new DoctorModel($conn);
$doctors = $doctorModel->searchDoctors($keyword, $specialization);

foreach ($doctors as $doc) {
    $defaults = [
        'profile_image' => 'doc1.png', 'doctor_name' => 'Unknown', 'qualification' => 'N/A',
        'specialization' => 'N/A', 'experience_years' => '0', 'consultation_fee' => '0',
        'email' => 'N/A', 'contact' => 'N/A', 'hospital_username' => 'N/A'
    ];
    $doc = array_merge($defaults, $doc);

    $name = htmlspecialchars($doc['doctor_name']);
    $img = htmlspecialchars($doc['profile_image']);
    $qual = htmlspecialchars($doc['qualification']);
    $spec = htmlspecialchars($doc['specialization']);
    $exp = htmlspecialchars($doc['experience_years']);
    $fee = htmlspecialchars($doc['consultation_fee']);
    $email = htmlspecialchars($doc['email']);
    $contact = htmlspecialchars($doc['contact']);
    $hospital = htmlspecialchars($doc['hospital_username']);

    echo "
    <div class='doctor-card'>
        <img src='../assets/uploads/doctor_documents/$img' alt='$name'>
        <div class='doctor-info'>
            <h4>$name</h4>
            <p><strong>$qual</strong></p>
            <p class='designation'>$spec<br>Experience: $exp yrs</p>
            <p>Consultation Fee: ৳$fee</p>
            <p style='color:green;font-size:16px;'><strong>Hospital: $hospital</strong></p>
        </div>
        <div class='button-group'>
            <button class='btn-primary' onclick=\"bookAppointmentFromDoctor('$name','$hospital')\">Request Appointment</button>
            <button class='btn-secondary' onclick='viewDoctorDetails(this)'
                data-name='$name' data-email='$email' data-contact='$contact'
                data-specialization='$spec' data-qualification='$qual'
                data-fee='$fee' data-experience='$exp' data-image='$img' data-hospital='$hospital'>
                View Details
            </button>
        </div>
    </div>";
}
?>
