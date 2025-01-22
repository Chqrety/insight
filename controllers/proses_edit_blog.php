<?php

include '../models/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = mysqli_real_escape_string($koneksi, $_POST["id"]);
  $judul = mysqli_real_escape_string($koneksi, $_POST["judul"]);
  $sinopsis = mysqli_real_escape_string($koneksi, $_POST["sinopsis"]);
  $isi = mysqli_real_escape_string($koneksi, $_POST["isi"]);

  $lokasi_file = $_FILES["Foto"]["tmp_name"];
  $nama_file = $_FILES["Foto"]["name"];

  $lokasi_simpan = '../../storages/' . $nama_file;
  $tempat_simpan = realpath(__DIR__ . '/../') . '/storages/' . $nama_file;

  if (move_uploaded_file($lokasi_file, $tempat_simpan)) {
    // Query untuk menyimpan data foto ke database
    $query = "UPDATE blogs SET judul='$judul', sinopsis='$sinopsis', isi='$isi', url_gambar='$lokasi_simpan' WHERE id=$id";

    if (mysqli_query($koneksi, $query)) {
      echo '<script>alert("Blog berhasil diedit");</script>';
      echo "<script>window.location.href = '/insight/src/views/detail-blog.php?id=$id';</script>";
      exit();
    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

  } else {
    $query = "UPDATE blogs SET judul='$judul', sinopsis='$sinopsis', isi='$isi' WHERE id=$id";

    if (mysqli_query($koneksi, $query)) {
      echo '<script>alert("Blog berhasil diedit");</script>';
      echo "<script>window.location.href = '/insight/src/views/detail-blog.php?id=$id';</script>";
      exit();
    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
  }



}