<div class="border rounded-xl max-w-7xl bg-white/30 border-white/30 backdrop-blur-md navbar">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </div>
      <ul tabindex="0"
        class="menu menu-sm dropdown-content bg-white/30 border border-white/30 backdrop-blur-md rounded-box z-[1] mt-3 w-52 p-2 shadow">
        <li><a>Beranda</a></li>
        <li>
          <a>Posting</a>
        </li>
        <li><a>Profil</a></li>
      </ul>
    </div>
    <a class="text-xl btn btn-ghost">Insight</a>
  </div>
  <div class="hidden navbar-center lg:flex">
    <ul class="px-1 menu menu-horizontal">
      <li><a href="/insight/src/views">Beranda</a></li>
      <li>
        <a href="/insight/src/views/posting.php">Posting</a>
      </li>
      <li><a href="/insight/src/views/profil.php">Profil</a></li>
    </ul>
  </div>
  <div class="navbar-end">
    <?php echo isset($_SESSION['user_id']) ? '<a class="btn bg-[#0B192C] text-white hover:bg-[#0B192C70]" href="../../controllers/proses_logout.php">Logout</a>' : '<a class="btn bg-[#0B192C] text-white hover:bg-[#0B192C70]" href="./login.php">Login</a>' ?>
  </div>
</div>