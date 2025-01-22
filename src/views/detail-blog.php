<?php
include('../../models/koneksi.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query_blog = "SELECT users.id, users.nama, blogs.*
  FROM blogs
  INNER JOIN users ON blogs.user_id
  WHERE blogs.id = '$id'
  GROUP BY blogs.id";

  $result_blog = $koneksi->query($query_blog);

  if ($result_blog) {
    $row_blog = $result_blog->fetch_assoc();
    $id = $row_blog['id'];
    $user_id = $row_blog['user_id'];
    $url_gambar = $row_blog['url_gambar'];
    $judul = $row_blog['judul'];
    $nama = $row_blog['nama'];
    $sinopsis = $row_blog['sinopsis'];
    $isi = $row_blog['isi'];
  }
} else {

  echo "Blog tidak ditemukan";
}

$check_pemilik = @$_SESSION['user_id'] == $user_id;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insight | Tell Everything To World</title>

  <!-- link css -->
  <link href="../style/output.css" rel="stylesheet">

  <!-- font poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-[#59D5E0] to-[#FFCCEA] w-full min-h-screen">
  <main>
    <header class="flex justify-center pt-5">
      <?php include 'navbar.php'; ?>
    </header>
    <section class="flex justify-center pb-12 mt-12">
      <div
        class="flex flex-col justify-between w-full h-full max-w-5xl py-5 border bg-white/30 rounded-xl backdrop-blur border-white/30">
        <div class="flex justify-center">
          <img src="<?= $url_gambar ?>" alt="gambar" class="object-cover rounded-xl" width="300">
        </div>
        <div class="flex flex-col gap-2 px-24">
          <div class="flex justify-between gap-2">
            <div class="flex flex-col gap-2">
              <p class="text-3xl font-bold"><?= $judul ?></p>
              <p class="text-xl text-black/60"><?= $nama ?></p>
            </div>
            <div class="<?= $check_pemilik ? 'flex ' : 'hidden ' ?>items-center justify-center">
              <a href="./edit-blog.php?id=<?= $id ?>"
                class="p-2 transition-all rounded-full cursor-pointer hover:bg-black/20">
                <img src="../../assets/edit.svg" alt="edit" width="30">
              </a>
              <a href="../../controllers/proses_hapus_blog.php?id=<?= $id ?>"
                class="p-2 transition-all rounded-full cursor-pointer hover:bg-black/20">
                <img src="../../assets/delete.svg" alt="delete" width="30">
              </a>
            </div>
          </div>
          <p class="italic text-justify text-black/60">"<?= $sinopsis ?>"</p>
          <p class="text-justify text-black"><?= $isi ?></p>
        </div>
      </div>
    </section>
  </main>
</body>

</html>