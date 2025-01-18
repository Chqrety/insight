<?php
// Pastikan Anda sudah memasukkan informasi koneksi.php di sini
include "../models/koneksi.php";

// Hapus semua data sesi
session_destroy();

// Redirect ke halaman login
echo '<script>alert("Berhasil logout");</script>';
echo '<script>window.location.href = "/insight/src/views/login.php";</script>';
exit();