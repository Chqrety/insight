<?php
include('../../models/koneksi.php');

if (isset($_SESSION['user_id'])) {
  $session_user_id = $_SESSION['user_id'];

  // Query untuk mendapatkan profil berdasarkan user_id
  $query_profile = "SELECT users.nama, users.email, profiles.bio, profiles.jk
      FROM profiles
      INNER JOIN users ON users.id = profiles.user_id
      WHERE profiles.user_id = $session_user_id";

  $result_profile = $koneksi->query($query_profile);

  if ($result_profile && $result_profile->num_rows > 0) {
    // Jika ada data, ambil hasilnya
    $row_profile = $result_profile->fetch_assoc();
    $nama = $row_profile['nama'];
    $email = $row_profile['email'];
    $bio = $row_profile['bio'];
    $jk = $row_profile['jk'];
  } else {
    // Jika tidak ada hasil, berikan pesan atau set nilai default
    echo "Profil tidak ditemukan!";
  }
} else {
  // Jika session user_id tidak ada, arahkan ke halaman login atau beri pesan
  // echo "Anda harus login terlebih dahulu.";
}

$koneksi->close();
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
    <section class="flex justify-center mt-12">
      <div
        class="flex flex-col items-center w-full h-full max-w-3xl py-5 border bg-white/30 rounded-xl backdrop-blur border-white/30">
        <div class="w-44 h-44">
          <img src="../../assets/profile.jpg" alt="profile" class="object-cover border-2 border-white rounded-full">
        </div>
        <div class="flex flex-col items-center mt-5">
          <?php if (!isset($_SESSION['user_id'])): ?>
            <p class="text-xl text-gray-600">Silakan login untuk melihat profil</p>
          <?php else: ?>
            <p class="text-3xl font-bold"><?= $nama ?></p>
            <p class="text-xl text-gray-600"><?= $email ?></p>
            <p class="italic text-gray-500"><?= $bio ?></p>
            <p class="text-gray-500"><?= $jk ?></p>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </main>
</body>

</html>