
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link rel="stylesheet" href="style.css">
    <script src="doctor.js" defer></script>
</head>
<body>
<div id="doctors" class="section">
    <h3>Search Doctor</h3>
    <div class="doctor-search">
        <select id="doctorDepartment">
            <option value="">Select department</option>
            
        </select>
        <input type="text" id="searchDoctor" placeholder="Search by doctor name" onkeyup="searchDoctorAjax()">
    </div>

    
</div>


<div id="doctorModal" class="modal">
    <div class="modal-content">
        <img id="modalDoctorImage" src="../assets/uploads/doctor_documents/doc1.png" alt="Doctor Image">
        <h3 id="modalDoctorName">Doctor Name</h3>
        <div class="modal-info">
            <p><strong>Email:</strong> <span id="modalEmail">N/A</span></p>
            <p><strong>Contact:</strong> <span id="modalContact">N/A</span></p>
            <p><strong>Specialization:</strong> <span id="modalSpecialization">N/A</span></p>
            <p><strong>Qualification:</strong> <span id="modalQualification">N/A</span></p>
            <p><strong>Experience:</strong> <span id="modalExperience">0</span> yrs</p>
            <p><strong>Consultation Fee:</strong> ৳<span id="modalFee">0</span></p>
            <p><strong>Hospital:</strong> <span id="modalHospital">N/A</span></p>
        </div>
        <div class="modal-buttons">
            <button class="btn-primary" onclick="bookAppointmentFromModal()">Book Appointment</button>
            <button class="btn-secondary" onclick="closeModal()">Close</button>
        </div>
    </div>
</div>
</body>
</html>
