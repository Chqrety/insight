<?php
include('../models/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Tangkap data dari formulir upload
  $judul = bersihkanInput($_POST["judul"]);
  $sinopsis = bersihkanInput($_POST["sinopsis"]);
  $isi = bersihkanInput($_POST["isi"]);

  // Tangkap data file
  $lokasi_file = $_FILES["Foto"]["tmp_name"];
  $nama_file = $_FILES["Foto"]["name"];

  // Mendapatkan UserId dari sesi
  $user_id = $_SESSION['user_id'];

  // Mendapatkan tanggal unggah (today)
  $tanggal_unggah = date("Y-m-d H:i:s");

  // Lokasi penyimpanan file
  $lokasi_simpan = '../../storages/' . $nama_file;
  $tempat_simpan = realpath(__DIR__ . '/../') . '/storages/' . $nama_file;


  // Periksa apakah file berhasil diunggah
  if (!empty($user_id) && !empty($judul) && !empty($sinopsis) && !empty($isi) && !empty($lokasi_file) && !empty($tanggal_unggah)) {
    if (move_uploaded_file($lokasi_file, $tempat_simpan)) {
      // Query untuk menyimpan data foto ke database
      $query = "INSERT INTO blogs (user_id, judul, sinopsis, isi, url_gambar, tanggal_upload) VALUES ('$user_id',
      '$judul', '$sinopsis', '$isi', '$lokasi_simpan', '$tanggal_unggah')";

      if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman Blog.php atau halaman lain yang sesuai
        echo '<script>alert("Blog berhasil diupload");</script>';
        echo '<script>window.location.href = "/insight/src/views/posting.php";</script>';
        exit();
      } else {
        // Jika query gagal, tampilkan pesan kesalahan atau redirect ke halaman sebelumnya
        echo '
  <script>alert("Blog gagal diupload, harap periksa kembali");</script>';
      }
    } else {
      // Jika file tidak berhasil diunggah, tampilkan pesan kesalahan atau redirect ke halaman sebelumnya
      echo "Error uploading file.";
    }
  } else {
    // Pesan kesalahan jika ada input kosong
    echo '
    <script>alert("Harap isi semua data dengan lengkap.");</script>';
    echo '
    <script>window.location.href = "/insight/src/views/posting.php";</script>';
    exit();
  }
}

$koneksi->close();