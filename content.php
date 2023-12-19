<?php
## Author : M. Nasirul Umam
## Tanggal : 25 juli 2023 
    include "koneksi.php";    

    $queryUser ="SELECT * FROM users"; // query menampilakan tabel men uses
    $resultUser = mysqli_query($koneksi,$queryUser); // Menjalankan query menggunakan fungsi mysqli_query dengan menggunakan koneksi '$koneksi'.
    $dataUser = mysqli_fetch_array($resultUser); // mengambil qery data yang pertama
?>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow">
    <a class="navbar-brand text-gray-100 m-lg-4" href="home.php">UPT BLK PASURUAN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow d-sm-none">
            
        </li>

        <!-- Nav Item - User Information -->
        <!-- <li class="nav-item">
            <a class="nav-link text-gray-100" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-gray-100" href="kegiatan.php">Kegiatan</a>
        </li> -->
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-gray-100" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $dataUser['username']?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Setting
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
