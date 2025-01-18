<?php

include '../models/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = mysqli_real_escape_string($koneksi, $_POST["id"]);
  $judul = mysqli_real_escape_string($koneksi, $_POST["judul"]);
  $sinopsis = mysqli_real_escape_string($koneksi, $_POST["sinopsis"]);
  $isi = mysqli_real_escape_string($koneksi, $_POST["isi"]);

  $query = "UPDATE blogs SET judul='$judul', sinopsis='$sinopsis', isi='$isi' WHERE id=$id";

  if (mysqli_query($koneksi, $query)) {
    echo '<script>alert("Blog berhasil diedit");</script>';
    echo "<script>window.location.href = '/insight/src/views/detail-blog.php?id=$id';</script>";
    exit();
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
  }
}