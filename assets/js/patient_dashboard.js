const sidebar = document.getElementById('sidebar');
const appointmentsList = document.getElementById('appointmentsList');
const notificationCount = document.getElementById('notificationCount');
let appointments = [];

function toggleSidebar() {
    sidebar.classList.toggle("show");
}

function showSection(sectionId, event) {
    document.querySelectorAll(".section").forEach(sec => sec.style.display = "none");
    const sec = document.getElementById(sectionId);
    if (sec) sec.style.display = "block";

    document.querySelectorAll(".sidebar a").forEach(link => link.classList.remove("active"));
    if (event && event.currentTarget) event.currentTarget.classList.add("active");

    if (window.innerWidth <= 768) sidebar.classList.remove("show");
}

// Dashboard Appointments
function updateDashboard() {
    appointmentsList.innerHTML = appointments.length
        ? appointments.map(a => `<li>${a}</li>`).join('')
        : '<li>No appointments scheduled.</li>';
    notificationCount.textContent = appointments.length;
}

// Notifications
function showNotifications() {
    const panel = document.getElementById("notificationsPanel");
    const list = document.getElementById("notificationsList");
    if (appointments.length) {
        list.innerHTML = appointments.map((a, index) => `
            <div class="notification-item">
                <strong>${index + 1}. ${a}</strong>
                <span class="date">${new Date().toLocaleDateString()}</span>
            </div>`).join('');
    } else {
        list.innerHTML = `<div class="notification-item">No notifications at the moment.</div>`;
    }
    panel.style.display = "flex";
}

document.getElementById("closeNotifications")?.addEventListener("click", () => {
    document.getElementById("notificationsPanel").style.display = "none";
});

//book validation
const appointmentForm = document.getElementById("appointmentForm");

function showError(id, message) {
  document.getElementById(id).textContent = message;
}

function clearError(id) {
  document.getElementById(id).textContent = "";
}

function validateHospital() {
  const val = document.getElementById("hospitalSelect").value.trim();
  if (!val) {
    showError("hospitalError", "Please select a hospital.");
    return false;
  }
  clearError("hospitalError");
  return true;
}

function validateName() {
  const val = document.getElementById("patientName").value.trim();
  if (!val) {
    showError("nameError", "Name is required.");
    return false;
  } else if (!/^[a-zA-Z\s]+$/.test(val)) {
    showError("nameError", "Only letters allowed.");
    return false;
  }
  clearError("nameError");
  return true;
}

function validateDOB() {
  const val = document.getElementById("dob").value;
  if (!val) {
    showError("dobError", "Date of birth is required.");
    return false;
  }
  clearError("dobError");
  return true;
}

function validateGender() {
  const val = document.getElementById("gender").value.trim();
  if (!val) {
    showError("genderError", "Please select gender.");
    return false;
  }
  clearError("genderError");
  return true;
}

function validateContact() {
  const val = document.getElementById("contact").value.trim();
  if (!val) {
    showError("contactError", "Contact number is required.");
    return false;
  } else if (!/^\+8801[0-9]{9}$/.test(val)) {
    showError("contactError", "Must be a valid Bangladeshi number (+8801XXXXXXXXX).");
    return false;
  }
  clearError("contactError");
  return true;
}

function validateDoctor() {
  const val = document.getElementById("doctorSelect").value.trim();
  if (!val) {
    showError("doctorError", "Please select a doctor.");
    return false;
  }
  clearError("doctorError");
  return true;
}

function validateAppointmentDate() {
  const val = document.getElementById("appointmentDate").value;
  if (!val) {
    showError("appointmentDateError", "Please select appointment date.");
    return false;
  }
  clearError("appointmentDateError");
  return true;
}

// Real time validation
document.getElementById("hospitalSelect").addEventListener("change", validateHospital);
document.getElementById("patientName").addEventListener("input", validateName);
document.getElementById("dob").addEventListener("change", validateDOB);
document.getElementById("gender").addEventListener("change", validateGender);
document.getElementById("contact").addEventListener("input", validateContact);
document.getElementById("doctorSelect").addEventListener("change", validateDoctor);
document.getElementById("appointmentDate").addEventListener("change", validateAppointmentDate);

// Hospital Search 
async function searchHospitalAjax() {
  try {
    const keyword = document.getElementById('searchHospitals').value;
    const res = await fetch(`../controller/hospital_search.php?keyword=${encodeURIComponent(keyword)}`);
    document.getElementById('hospitalList').innerHTML = await res.text();
  } catch (err) {
    console.error("Error fetching hospitals:", err);
  }
}

// Doctor Search 
async function searchDoctorAjax() {
  try {
    const keyword = document.getElementById('searchDoctor').value;
    const specialization = document.getElementById('doctorDepartment').value;

    const res = await fetch(
      `../controller/doctor_search.php?keyword=${encodeURIComponent(keyword)}&specialization=${encodeURIComponent(specialization)}`
    );

    document.getElementById('doctorList').innerHTML = await res.text();
  } catch (err) {
    console.error("Error fetching doctors:", err);
  }
}

document.getElementById('searchDoctor')?.addEventListener('keyup', searchDoctorAjax);
document.getElementById('doctorDepartment')?.addEventListener('change', searchDoctorAjax);

function viewHospitalDetails(button) {
    document.getElementById('modalHospitalName').innerText = button.closest('.hospital-card').querySelector('h4').innerText;
    document.getElementById('modalEmail').innerText = button.dataset.email;
    document.getElementById('modalPhone').innerText = button.dataset.phone;
    document.getElementById('modalAddress').innerText = button.dataset.address;
    document.getElementById('modalCategory').innerText = button.closest('.hospital-card').querySelector('.hospital-info p').innerText.replace('Category: ', '');
    document.getElementById('hospitalModal').style.display = 'flex';
}

function viewDoctorDetails(button) {
    const name = button.dataset.name;
    const email = button.dataset.email;
    const contact = button.dataset.contact;
    const specialization = button.dataset.specialization;
    const qualification = button.dataset.qualification;
    const fee = button.dataset.fee;
    const experience = button.dataset.experience;
    const image = button.dataset.image;
    const hospital = button.dataset.hospital; 

    document.getElementById("modalDoctorName").textContent = name;
    document.getElementById("modalEmail").textContent = email || 'N/A';
    document.getElementById("modalContact").textContent = contact || 'N/A';
    document.getElementById("modalSpecialization").textContent = specialization || 'N/A';
    document.getElementById("modalQualification").textContent = qualification || 'N/A';
    document.getElementById("modalExperience").textContent = experience || '0';
    document.getElementById("modalFee").textContent = fee || '0';
    document.getElementById("modalDoctorImage").src = `../assets/uploads/doctor_documents/${image}`;
    document.getElementById("modalHospital").textContent = hospital || 'N/A'; 

    document.getElementById("doctorModal").style.display = "flex";
}
function closeModal() {
    document.getElementById('hospitalModal').style.display = 'none';
    document.getElementById('doctorModal').style.display = 'none';
}

// Close model
window.onclick = function(event) {
    const hospitalModal = document.getElementById('hospitalModal');
    const doctorModal = document.getElementById('doctorModal');

    if (event.target === hospitalModal) {
        hospitalModal.style.display = "none";
    }

    if (event.target === doctorModal) {
        doctorModal.style.display = "none";
    }
}



// Book Appointment
function bookAppointmentFromDoctor(doctorName, hospitalName) {
    const section = document.getElementById('appointments');
    section.style.display = 'block';
    section.scrollIntoView({ behavior: 'smooth' });

    const doctorSelect = document.getElementById('doctorSelect');
    doctorSelect.innerHTML = '<option value="'+doctorName+'">'+doctorName+'</option>';
    doctorSelect.value = doctorName;

    document.getElementById('hospitalSelect').value = hospitalName;

    closeModal();
}

// Trigger
function bookAppointmentFromModal() {
    const doctorName = document.getElementById('modalDoctorName').textContent.trim();
    const hospitalName = document.getElementById('modalHospital').textContent.trim();

    bookAppointmentFromDoctor(doctorName, hospitalName);
}


window.addEventListener('DOMContentLoaded', () => {
    searchHospitalAjax();
    searchDoctorAjax();
    loadAppointments(); 
    loadHistory();
});

// Change Password 
    function togglePassword(fieldId) {
      const input = document.getElementById(fieldId);
      const toggle = input.nextElementSibling;
      if (input.type === "password") {
        input.type = "text";
        toggle.textContent = "Hide";
      } else {
        input.type = "password";
        toggle.textContent = "Show";
      }
    }

    const currentPassword = document.getElementById("currentPassword");
    const newPassword = document.getElementById("newPassword");
    const confirmPassword = document.getElementById("confirmPassword");

    const currentError = document.getElementById("currentError");
    const newError = document.getElementById("newError");
    const confirmError = document.getElementById("confirmError");
    const message = document.getElementById("passwordMessage");

    function validateCurrent() {
      if (!currentPassword.value.trim()) {
        currentError.textContent = "Current password is required.";
      } else {
        currentError.textContent = "";
      }
    }

   function validateNew() {
  const newVal = newPassword.value.trim();

  if (!newVal) {
    newError.textContent = "New password is required.";
  } 
  else if (
    newVal.length < 6 ||               
    !/[A-Z]/.test(newVal) ||          
    !/[a-z]/.test(newVal) ||          
    !/\d/.test(newVal) ||         
    !/[@$!%*?&]/.test(newVal)         
  ) {
    newError.textContent = "Password must include upper, lower, number, special char & 6+ chars.";
  } 
  else if (newVal === currentPassword.value.trim() && newVal !== "") {
    newError.textContent = "New password cannot be the same as current.";
  } 
  else {
    newError.textContent = "";
  }

  validateConfirm(); 
}


    function validateConfirm() {
      const newVal = newPassword.value.trim();
      const confirmVal = confirmPassword.value.trim();
      if (!confirmVal) {
        confirmError.textContent = "Confirm password is required.";
      } else if (newVal !== confirmVal) {
        confirmError.textContent = "Passwords do not match.";
      } else {
        confirmError.textContent = "";
      }
    }

    currentPassword.addEventListener("input", validateCurrent);
    newPassword.addEventListener("input", validateNew);
    confirmPassword.addEventListener("input", validateConfirm);

    document.getElementById("changePasswordForm").addEventListener("submit", function(e) {
      e.preventDefault();

      validateCurrent();
      validateNew();
      validateConfirm();

      if (!currentError.textContent && !newError.textContent && !confirmError.textContent) {
        message.textContent = "Password updated successfully!";
        message.style.color = "green";
        this.reset();
      } else {
        message.textContent = "Please fix the errors above.";
        message.style.color = "red";
      }
    });


// appointments data
let my_appointments = [
    { id: 1, doctor: "Dr. Rockey", department: "Cardiology", hospital: "City Hospital", address: "123 Main St", date: "2025-09-20", time: "10:00 AM", status: "Confirmed" },
    { id: 2, doctor: "Dr. Nafiz", department: "Dermatology", hospital: "Green Clinic", address: "45 Park Ave", date: "2025-09-22", time: "02:30 PM", status: "Pending" },
    { id: 3, doctor: "Dr. Rafi", department: "Neurology", hospital: "Central Hospital", address: "78 High St", date: "2025-09-25", time: "11:15 AM", status: "Cancelled" }
];

function loadAppointments() {
    const tbody = document.getElementById("appointmentsBody");
    tbody.innerHTML = "";

    my_appointments.forEach((app, index) => {
        let statusClass = app.status.toLowerCase();
        tbody.innerHTML += `
            <tr>
                <td>${index + 1}</td>
                <td>${app.doctor}</td>
                <td>${app.department}</td>
                <td>${app.hospital}</td>
                <td>${app.address}</td>
                <td>${app.date}</td>
                <td>${app.time}</td>
                <td><span class="status-${statusClass}">${app.status}</span></td>
                <td>
                    <button class="app-btn app-btn-view" onclick="viewAppointment(${app.id})">View</button>
                    <button class="app-btn app-btn-cancel" onclick="cancelAppointment(${app.id})">Cancel</button>
                </td>
            </tr>
        `;
    });
}

function viewAppointment(id){
    alert("View details for appointment #" + id);
}

function cancelAppointment(id){
    alert("Cancel appointment #" + id);
}

function showAppointments(){
    showSection("appointmentsSection"); 
    loadAppointments();
}

// patient data
let my_history = [
    { id: 1, doctor: "Dr. Rockey", department: "Cardiology", hospital: "City Hospital", address: "123 Main St", date: "2025-01-15", diagnosis: "Hypertension", treatment: "Medication", status: "Completed" },
    { id: 2, doctor: "Dr. Nafiz", department: "Dermatology", hospital: "Green Clinic", address: "45 Park Ave", date: "2025-03-10", diagnosis: "Acne", treatment: "Topical Cream", status: "Completed" },
    { id: 3, doctor: "Dr. Rafi", department: "Neurology", hospital: "Central Hospital", address: "78 High St", date: "2025-08-05", diagnosis: "Migraine", treatment: "Prescription", status: "Ongoing" }
];

function loadHistory() {
    const tbody = document.getElementById("historyBody");
    tbody.innerHTML = "";

    my_history.forEach((item, index) => {
        let statusClass = item.status.toLowerCase();
        tbody.innerHTML += `
            <tr>
                <td>${index + 1}</td>
                <td>${item.doctor}</td>
                <td>${item.department}</td>
                <td>${item.hospital}</td>
                <td>${item.address}</td>
                <td>${item.date}</td>
                <td>${item.diagnosis}</td>
                <td>${item.treatment}</td>
                <td><span class="status-${statusClass}">${item.status}</span></td>
            </tr>
        `;
    });
}

function showHistory() {
    showSection("historySection");
    loadHistory();
}

// Patient Profile
function showProfile() { 
    showSection("profileSection"); 
    loadProfile(); 
}

function loadProfile() {
    document.getElementById("profileName").value = patientProfile.name || "";
    document.getElementById("profileEmail").value = patientProfile.email || "";
    document.getElementById("username").value = patientProfile.username || "";
    document.getElementById("profilePhone").value = patientProfile.phone || "";
    document.getElementById("navbarProfileName").innerText = patientProfile.name || patientProfile.username;
}


// Edit Field
function disableAllFields() {
    document.querySelectorAll('#editPatientForm input, #editPatientForm select,#editPatientDocsContainer input, #editPatientDocsContainer button').forEach(el => {
        if(!el.classList.contains('editbtn')) {
            el.setAttribute('disabled', true);
        }
    });

    document.getElementById("editPatientUsername").setAttribute("readonly", true);
    document.getElementById("editPatientEmail").setAttribute("readonly", true);
}

function enableAllFields() {
    document.querySelectorAll('#editPatientForm input, #editPatientForm select, #editPatientDocsContainer input , #editPatientDocsContainer button').forEach(el => {
        if(el.id !== "editPatientUsername" && el.id !== "editPatientEmail" && !el.classList.contains('editbtn')) {
            el.removeAttribute('disabled');
        }
    });

    document.getElementById("editPatientUsername").setAttribute("readonly", true);
    document.getElementById("editPatientEmail").setAttribute("readonly", true);

    alert("You can now edit your profile (except username and email)!");
}

window.onload = disableAllFields;


// Image Upload
const profileImageInput = document.getElementById('profileImageInput');
const profileImagePreview = document.getElementById('profileImagePreview');

// Upload Document
function uploadProfileDoc(inputId) {
    const fileInput = document.getElementById(inputId);
    if (fileInput) {
        fileInput.click();
    } else {
        console.error("No file input found with id:", inputId);
    }
}

profileImageInput.addEventListener('change', e => {
    const file = e.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = ev => {
            profileImagePreview.src = ev.target.result;
            patientProfile.profileImage = ev.target.result;
        };
        reader.readAsDataURL(file);
    }
});

updateDashboard();