<?php

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "default_spk_saw");

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pastikan session dimulai
session_start();

// Ambil user_id dari session
$user_id = $_SESSION['user_id'];

// Query untuk mengambil data rw berdasarkan user_id
$sql = "SELECT * FROM user WHERE id_user = '$user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $_SESSION['rw'] = $row['rw'];
    

} else {
    echo "Data rw tidak ditemukan!";
}

$conn->close();
