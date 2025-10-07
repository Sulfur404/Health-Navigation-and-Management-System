<?php
require_once(dirname(__FILE__) . '/../config/db_connection.php');

class AdminHospitalsModel {
    public function getAllHospitals() {
        global $conn;
        $sql = "SELECT * FROM hospitals";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addHospital($data) {
        global $conn;

        mysqli_begin_transaction($conn);

        try {
            $username = mysqli_real_escape_string($conn, $data['username']);
            $hospital_name = mysqli_real_escape_string($conn, $data['hospital_name']);
            $email = mysqli_real_escape_string($conn, $data['email']);
            $phone = mysqli_real_escape_string($conn, $data['phone']);
            $address = mysqli_real_escape_string($conn, $data['address']);
            $profile_image = mysqli_real_escape_string($conn, $data['profile_image']);

            $sql1 = "INSERT INTO hospitals (username, hospital_name, email, phone, address, profile_image) VALUES ('$username', '$hospital_name', '$email', '$phone', '$address', '$profile_image')";
            $result1 = mysqli_query($conn, $sql1);

            if (!$result1) {
                throw new Exception('Error inserting into hospitals table.');
            }

            $usertype = 'hospital';
            $password = 'default123';
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

    public function deleteHospital($username) {
        global $conn;

        mysqli_begin_transaction($conn);

        try {
            $username_safe = mysqli_real_escape_string($conn, $username);

            $sql1 = "DELETE FROM users WHERE username = '$username_safe'";
            $result1 = mysqli_query($conn, $sql1);

            if (!$result1) {
                throw new Exception("Error deleting from users table.");
            }

            $sql2 = "DELETE FROM hospitals WHERE username = '$username_safe'";
            $result2 = mysqli_query($conn, $sql2);

            if (!$result2) {
                throw new Exception("Error deleting from hospitals table.");
            }

            mysqli_commit($conn);
            return true;

        } catch (Exception $e) {
            mysqli_rollback($conn);
            return false;
        }
    }

    public function searchHospitals($term) {
        global $conn;
        $term = mysqli_real_escape_string($conn, $term);
        $sql = "SELECT * FROM hospitals WHERE username LIKE '%$term%' OR hospital_name LIKE '%$term%' OR address LIKE '%$term%'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>