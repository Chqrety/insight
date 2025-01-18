<?php
include('../../models/koneksi.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query_blog = "SELECT blogs.*
  FROM blogs
  WHERE blogs.id = '$id'";

  $result_blog = $koneksi->query($query_blog);

  if ($result_blog) {
    $row_blog = $result_blog->fetch_assoc();
    $id = $row_blog['id'];
    $url_gambar = $row_blog['url_gambar'];
    $judul = $row_blog['judul'];
    $sinopsis = $row_blog['sinopsis'];
    $isi = $row_blog['isi'];
  }
} else {

  echo "Blog tidak ditemukan";
}
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
    <section class="relative flex justify-center pb-12 mt-12 ">
      <div
        class="flex flex-col justify-center w-full max-w-5xl px-5 py-3 border border-white rounded-xl bg-white/30 backdrop-blur">
        <p class="text-xl font-semibold mb-7">Edit Blog</p>
        <form action="../../controllers/proses_edit_blog.php" method="POST" enctype="multipart/form-data">
          <div class="flex flex-col gap-5">
            <div class="relative w-full mb-3 border-2 border-dashed rounded-lg cursor-pointer border-gray-500/50 h-96">
              <div id="previewContainer"
                class="flex flex-col items-center justify-center w-full h-full gap-4 text-gray-500/70">
                <?php if (!empty($url_gambar)): ?>
                  <img src="<?= htmlspecialchars($url_gambar, ENT_QUOTES, 'UTF-8') ?>" alt="preview"
                    class="h-full rounded-lg">
                <?php else: ?>
                  <span class="font-semibold">Preview Image</span>
                <?php endif; ?>
              </div>
              <label for="fileInput" class="text-xs text-gray-500/50">Tekan kotak diatas untuk memasukkan atau mengganti
                foto</label>
              <input type="file" id="fileInput" name="Foto" value="<?= htmlspecialchars($url_gambar) ?>"
                class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer" onchange="handleFileSelect()" />
            </div>
            <input type="text" hidden name="id" value="<?= htmlspecialchars($id) ?>">
            <input type="text" name="judul" placeholder="Judul" value="<?= htmlspecialchars($judul) ?>" required
              class="w-full max-w-full bg-transparent input input-bordered placeholder:text-black/50" />
            <textarea name="sinopsis" required placeholder="Sinopsis"
              class="max-w-full bg-transparent textarea textarea-bordered placeholder:text-black/50"><?= htmlspecialchars($sinopsis) ?></textarea>
            <textarea name="isi" placeholder="Isi" required
              class="max-w-full bg-transparent textarea textarea-bordered placeholder:text-black/50"><?= htmlspecialchars($isi) ?></textarea>
          </div>
          <div class="flex justify-end mt-5">
            <button type="submit" class="btn max-w-sm bg-[#0B192C] hover:bg-[#0B192C50] text-white">Edit</button>
          </div>
        </form>
      </div>
      <div
        class="<?php echo isset($_SESSION['user_id']) ? 'hidden ' : 'absolute '; ?>flex justify-center items-center top-0 w-full max-w-5xl px-5 py-3 border border-white h-[95%] rounded-xl bg-white/30 backdrop-blur">
        <p class="text-2xl font-bold">Silahkan login sebelum mengedit blog</p>
      </div>
    </section>
  </main>

  <script>
    function handleFileSelect() {
      const fileInput = document.getElementById('fileInput');
      const previewContainer = document.getElementById('previewContainer');
      const selectedFile = fileInput.files[0];

      if (selectedFile) {
        const reader = new FileReader();

        reader.onload = function (e) {
          previewContainer.innerHTML = `
                    <img src="${e.target.result}" alt="preview" class="h-full rounded-lg">
                `;
        };

        reader.readAsDataURL(selectedFile);
      }
    }
  </script>
</body>

</html>