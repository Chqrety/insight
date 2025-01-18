<?php
include('../../models/koneksi.php');

$query_blog = "SELECT users.nama, blogs.*
FROM blogs
INNER JOIN users ON blogs.user_id = users.id
ORDER BY blogs.tanggal_upload DESC";

$result_photo = $koneksi->query($query_blog);
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
    <section class="px-24 mt-12">
      <div class="flex justify-between bg-white/30 rounded-xl backdrop-blur border border-white/30 h-[40rem]">
        <div class="flex flex-col justify-center gap-6 pl-20">
          <h1 class="text-6xl font-semibold w-[42rem]">
            <span class="text-[#CBA35C]">TEMPAT</span> DIMANA KAMU BISA <span class="text-[#CBA35C]">MENCERITAKAN
              DUNIAMU</span> ✍🏻
          </h1>
          <div
            class="px-3 py-2 transition-all duration-75 border cursor-pointer rounded-xl border-white/30 backdrop-blur w-fit hover:scale-105 hover:bg-white/30">
            Baca Selengkapnya
          </div>
        </div>
        <img class="object-cover h-full" src="../../assets/blog-home.svg" alt="blog">
      </div>
    </section>

    <section class="px-24 pb-32 mt-96">
      <p class="text-[#CBA35C] font-bold text-4xl">Blog Untuk Kamu</p>
      <div class="mt-10 gap-y-5 columns-5">
        <?php foreach ($result_photo as $row):
          $blog_id = $row['id'];
          ?>
          <div
            class="flex flex-col mb-5 border shadow rounded-xl break-inside-avoid bg-white/30 backdrop-blur border-white/30">
            <img class="object-cover w-full rounded-t-xl" src="<?= $row['url_gambar'] ?>" alt="img">
            <div class="flex flex-col gap-2 px-5 py-2">
              <p class="text-xl font-bold"><?= $row['judul'] ?></p>
              <p class="line-clamp-3 font-black/70"><?= $row['sinopsis'] ?></p>
              <div class="flex justify-between">
                <p class="italic text-black/60"><?= $row['nama'] ?></p>
                <a href="./detail-blog.php?id=<?= $blog_id ?>" class="hover:underline">baca selengkapnya</a>
              </div>
            </div>
          </div>
          <?php
        endforeach;

        $result_photo->free();

        // Tutup koneksi
        $koneksi->close(); ?>
      </div>
    </section>
  </main>
</body>

</html>