<?php
include('../../models/koneksi.php');
// include('../../controllers/cek_login.php');

// $userId = $_SESSION['UserId'];
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
    <section class="flex items-center justify-center min-h-screen px-24">
      <div
        class="flex justify-between max-w-7xl w-full bg-white/30 rounded-xl backdrop-blur border border-white/30 h-[40rem]">
        <form action="../../controllers/proses_register.php" method="POST"
          class="flex flex-col justify-center w-full pl-10">
          <p class="text-3xl font-bold">Insight</p>
          <div class="flex flex-col gap-3">
            <p class="text-black/50">Selamat Datang!</p>
            <input type="text" name="nama" placeholder="Nama" required
              class="w-full max-w-full bg-transparent input input-bordered placeholder:text-black/50" />
            <input type="text" name="email" placeholder="E-Mail" required
              class="w-full max-w-full bg-transparent input input-bordered placeholder:text-black/50" />
            <input type="password" name="password" placeholder="Password" required
              class="w-full max-w-full bg-transparent input input-bordered placeholder:text-black/50" />
            <textarea name="bio" required placeholder="Bio"
              class="max-w-full bg-transparent textarea textarea-bordered placeholder:text-black/50"></textarea>
            <div class="flex gap-5">
              <div class="form-control">
                <label class="flex gap-3 cursor-pointer label">
                  <span class="label-text">Laki - Laki</span>
                  <input type="radio" name="jk" value="Laki-laki" class="radio checked:bg-blue-500" />
                </label>
              </div>
              <div class="form-control">
                <label class="flex gap-3 cursor-pointer label">
                  <span class="label-text">Perempuan</span>
                  <input type="radio" name="jk" value="Perempuan" class="radio checked:bg-red-500" />
                </label>
              </div>
            </div>
            <button type="submit" class="btn w-full bg-[#0B192C] hover:bg-[#0B192C50] text-white">Register</button>
            <p class="text-right text-black/50">Sudah punya akun? <a href="./login.php"
                class="text-black cursor-pointer hover:underline">Login
                Sekarang!</a></p>
        </form>
      </div>
      <img class="object-cover h-full" src="../../assets/blog-login.svg" alt="blog">
      </div>
    </section>
  </main>
</body>

</html>