<?php
// Pastikan Anda sudah memasukkan informasi koneksi.php di sini
include "../models/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Tangkap data dari formulir registrasi
  $nama = bersihkanInput($_POST['nama']);
  $email = bersihkanInput($_POST['email']);
  $password = bersihkanInput($_POST['password']);

  // Hash password sebelum menyimpan ke database (gunakan metode keamanan yang lebih aman)
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  if ($nama . $email . $password) {
    // Query untuk memasukkan data pengguna baru ke dalam tabel users
    $query = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$hashedPassword')";
  }
  // Eksekusi query
  if ($koneksi->query($query) === TRUE) {

    $user_id = $koneksi->insert_id;

    $bio = bersihkanInput($_POST['bio']);
    $jk = bersihkanInput($_POST['jk']);

    $query_profile = "INSERT INTO profiles (user_id, bio, jk) VALUES ('$user_id', '$bio', '$jk')";

    if ($koneksi->query($query_profile) === TRUE) {

      echo '<script>alert("Berhasil registrasi akun");</script>';
      echo '<script>window.location.href = "/insight/src/views/login.php";</script>';
      exit();
    } else {
      echo '<script>alert("Profile gagal dibuat!");</script>';
    }
  } else {
    // Registrasi gagal, tampilkan pesan kesalahan atau lakukan sesuatu yang sesuai dengan kebutuhan Anda
    echo "Error: " . $query . "<br>" . $koneksi->error;
  }
}

// Tutup koneksi (jika menggunakan mysqli)
$koneksi->close();