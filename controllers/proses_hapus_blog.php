<?php

include '../models/koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "DELETE FROM blogs WHERE id  = $id";

  if ($koneksi->query($query)) {
    echo '<script>alert("Blog berhasil dihapus");</script>';
    echo "<script>window.location.href = '/insight/src/views';</script>";
    exit();
  } else {
    echo '<script>alert("Blog gagal dihapus");</script>';
    echo "<script>window.location.href = '/insight/src/views/detail-blog.php?id=$id';</script>";
  }
  $koneksi->close();
} else {
  echo "<script>window.location.href = '/insight/src/views/detail-blog.php?id=$id';</script>";
  exit();
}