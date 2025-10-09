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