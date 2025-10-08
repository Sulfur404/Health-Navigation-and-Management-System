<div class="hospitals-container">
    <div class="hospitals-table-container">
        <h2>Patients List</h2>
        <div class="search-container">
            <input type="text" id="patientSearchInput" placeholder="Search by username, name, or email...">
        </div>
        <table class="hospitals-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Profile Image</th>
                    <th>Delete</th>
                </tr>
            
        </table>
    </div>
    <div class="add-hospital-form-container">
        <h2>Add Patient</h2>
        <form action="../controller/adminPatientsController.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="gender" placeholder="Gender" required>
            <input type="date" name="dob" placeholder="Date of Birth" required>
            Profile Picture:
            <input type="file" name="profile_image" required>
            <button type="submit" name="add_patient" class="add-btn">Add Patient</button>
        </form>
    </div>
</div>