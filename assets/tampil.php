<?php 
//koneksi database
require 'functions.php';

session_start();

if (!isset($_SESSION['code_name'])) {
    header("Location: veryfikasi_scurity.php");
}

$ambil = query("SELECT * FROM user_pengguna");

//tombol cari 
if (isset($_POST["cari"])) {
  $ambil = cari($_POST["keyword"]);
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="fontawesome/css/all.css">
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="css/styles.css">

        <title>Tampil data</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
                <img src="img/profil.jpg" alt="">
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <i class='fas fa-university nav__logo-icon'></i>
                        <span class="nav__logo-name">University</span>
                    </a>

                    <div class="nav__list">
                        <a href="index.php" class="nav__link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Users</span>
                        </a>
                        
                        <a href="#" class="nav__link">
                            <i class='bx bx-message-square-detail nav__icon' ></i>
                            <span class="nav__name">Messages</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-bookmark nav__icon' ></i>
                            <span class="nav__name">Favorites</span>
                        </a>

                        <a href="#" class="nav__link active">
                            <i class='bx bx-folder nav__icon' ></i>
                            <span class="nav__name">Data</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                            <span class="nav__name">Analytics</span>
                        </a>
                        <a href="tambah.php" class="nav__link">
                            <i class='fas fa-user-plus nav__icon' ></i>
                            <span class="nav__name">tambah data</span>
                        </a>
                    </div>
                </div>

                <a href="../index.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>
        <h1 class="logo">Tampil Data</h1>
    <form class="cari" action="" method="post" accept-charset="utf-8">
      <input type="text" class="cari_input" id="cari_input" placeholder="cari pengguna..." autocomplete="off" name="keyword"/>
      <button type="submit" name="cari" class="cari_button">
        <i class="fas fa-search search_icon"></i>
      </button>
    </form>
    <div class="table_responsive">
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Profil</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Number</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
  <!--ambil data -->
  <?php $i = 1;?>
    <?php foreach( $ambil as $row):?>
      <tr>
        <td><?= $i;?>.</td>
        <td><img src="profil/<?= $row["gambar"];?>" alt=""></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["alamat"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["telepon"]; ?></td>
        <td>
          <span class="action_btn">

            <a href="profil.php?id=<?= $row["id"]; ?>"><li class="fas fa-profil"></li> profil</a>

            <a href="ubah.php?id=<?= $row["id"]; ?>"><li class="fas fa-edit"></li> Edit</a>

            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin menghapus');"><i class="fas fa-delete"></i>Delete</a>
          </span>
        </td>
      </tr>
    <?php $i++;?>
    <?php endforeach ?>
    </tbody>
  </table>
</div>

        <!--===== MAIN JS =====-->
        <script src="js/main.js"></script>
    </body>
</html>