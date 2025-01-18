<?php
include "../models/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = bersihkanInput($_POST["email"]);
  $password = bersihkanInput($_POST['password']);

  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = $koneksi->query($query);

  if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();

    if (password_verify($password, $user_data['password'])) {
      $_SESSION['user_id'] = $user_data['id'];
      $_SESSION['nama'] = $user_data['nama'];
      $_SESSION['email'] = $user_data['email'];

      echo '<script>alert("Berhasil login");</script>';
      echo '<script>window.location.href = "/insight/src/views/";</script>';
      echo "Session 'user_id' set: " . $_SESSION['user_id'];
      exit();
    } else {
      echo '<script>alert("Password Salah!");</script>';
      echo '<script>window.location.href = "/insight/src/views/login.php";</script>';
      exit();
    }
  } else {
    echo '<script>alert("Akun tidak ditemukan!");</script>';
    echo '<script>window.location.href = "/insight/src/views/login.php";</script>';
    exit();
  }
}

$koneksi->close();