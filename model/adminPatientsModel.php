<?php
require_once(dirname(__FILE__) . '/../config/db_connection.php');

class AdminPatientsModel {
    public function getAllPatients() {
        global $conn;
        $sql = "SELECT * FROM patients";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addPatient($data) {
        global $conn;

        mysqli_begin_transaction($conn);

        try {
            $username = mysqli_real_escape_string($conn, $data['username']);
            $full_name = mysqli_real_escape_string($conn, $data['full_name']);
            $email = mysqli_real_escape_string($conn, $data['email']);
            $gender = mysqli_real_escape_string($conn, $data['gender']);
            $dob = mysqli_real_escape_string($conn, $data['dob']);
            $profile_image = mysqli_real_escape_string($conn, $data['profile_image']);

            $sql1 = "INSERT INTO patients (username, full_name, email, gender, dob, profile_image) VALUES ('$username', '$full_name', '$email', '$gender', '$dob', '$profile_image')";
            $result1 = mysqli_query($conn, $sql1);

            if (!$result1) {
                throw new Exception('Error inserting into patients table.');
            }

            $usertype = 'patient';
            $password = 'Default';
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $clearance_status = 'approved';

            $sql2 = "INSERT INTO users (username, email, usertype, password_hash, clearance_status) VALUES ('$username', '$email', '$usertype', '$password_hash', '$clearance_status')";
            $result2 = mysqli_query($conn, $sql2);

            if (!$result2) {
                throw new Exception('Error inserting into users table.');
            }

            mysqli_commit($conn);
            return ['success' => true];

        } catch (Exception $e) {
            mysqli_rollback($conn);
            $error_message = $e->getMessage() . " (DB Error: " . mysqli_error($conn) . ")";
            return ['success' => false, 'message' => $error_message];
        }
    }

    public function deletePatient($username) {
        global $conn;

        mysqli_begin_transaction($conn);

        try {
            $username_safe = mysqli_real_escape_string($conn, $username);

            $sql1 = "DELETE FROM users WHERE username = '$username_safe'";
            $result1 = mysqli_query($conn, $sql1);

            if (!$result1) {
                throw new Exception("Error deleting from users table.");
            }

            $sql2 = "DELETE FROM patients WHERE username = '$username_safe'";
            $result2 = mysqli_query($conn, $sql2);

            if (!$result2) {
                throw new Exception("Error deleting from patients table.");
            }

            mysqli_commit($conn);
            return true;

        } catch (Exception $e) {
            mysqli_rollback($conn);
            return false;
        }
    }

    public function searchPatients($term) {
        global $conn;
        $term = mysqli_real_escape_string($conn, $term);
        $sql = "SELECT * FROM patients WHERE username LIKE '%$term%' OR full_name LIKE '%$term%' OR email LIKE '%$term%'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>