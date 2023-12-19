<?php
## Author : M. Nasirul Umam
## Tanggal : 25 juli 2023 
    session_start();
    if ($_SESSION['username'] == false){ // pengecekan apabila username sana dengan salah maka kembali ke menu login
        header('Location:../index.php');
    }
    require_once 'init.php'; // mengambil halaman include dari koneksi

    //$name = $_SESSION['name'];
    
    // query mengambil database abouts

    $queryUsers = "SELECT * FROM users WHERE username = '$_SESSION[name]'";
    $result = mysqli_query($koneksi, $queryUsers); // Menjalankan query menggunakan fungsi mysqli_query dengan menggunakan koneksi '$koneksi'.
    $row = mysqli_fetch_assoc($result);  

    $queryJurusan = "SELECT * FROM kejuruan";
    $dataJurusan = mysqli_query($koneksi, $queryJurusan);

    $querySiswa = "SELECT *,siswa.id as id_siswa FROM siswa join kejuruan on siswa.kejuruan_id = kejuruan.id order by siswa.id asc;";
    $dataSiswa = mysqli_query($koneksi, $querySiswa);
    // var_dump($row);
    // die;   
    if(isset($_POST["simpan"])) { 
        
        $tgl_pdf   = $_POST["tgl_pdf"];
        $nama      = $_POST["nama"];   
        $tempat    = $_POST["tempat"]; 
        $tgl_lhr   = $_POST["tgl_lhr"];
        $alamat    = $_POST["alamat"];
        $no_hp     = $_POST["no_hp"];
        $jenis_kl  = $_POST["jenis_kl"];
        $sekolah   = $_POST["sekolah"];
        $kejuruan_id  = $_POST["kejuruan_id"];
        // $users_id   = $_POST["users_id"];
        $id        = $_POST["id"];
        if(empty($tgl_pdf) || empty($nama) || empty($tempat) || empty($tgl_lhr) || empty($alamat)  || empty($no_hp) || empty($jenis_kl) || empty($sekolah) || empty($kejuruan_id)) {
            $erros = "data harus di isi";
            // var_dump($erros);
        }else{
            $userId = $row['id'];

            // $queryCheck = "SELECT users.username FROM users LEFT JOIN siswa ON users.id = siswa.users_id WHERE users.username = '$_SESSION[name]'";
            $queryCheck = "SELECT users_id FROM siswa where users_id = '$userId'";
            $resultCheck = mysqli_query($koneksi, $queryCheck);
            $dataCheck = mysqli_fetch_assoc($resultCheck);
            if ($dataCheck != null) {
                $uploadOk = 0;
                $hasil = "user sudah terdaftar";
            } else {
                if(empty($id)){
                    $users_id = "SELECT id  from users where username = '$_SESSION[name]'";
                    $query1 = mysqli_query($koneksi,$users_id)->fetch_array(MYSQLI_NUM);
                    $queryInsert = "INSERT INTO siswa (id, tgl_pdf, nama, tempat, tgl_lhr, alamat, no_hp, jenis_kl, sekolah, kejuruan_id, users_id) VALUES (null, '$tgl_pdf','$nama','$tempat','$tgl_lhr','$alamat','$no_hp','$jenis_kl','$sekolah','$kejuruan_id','$query1[0]')";
                    $insert = mysqli_query($koneksi,$queryInsert);
                    // var_dump($insert);
                    if($insert){
                        $uploadOk = 1;
                        $hasil = "Student successfully uploaded";
                    }else{
                        $uploadOk = 0;
                        $hasil = "Student fail uploaded";   
                    }
                }else{
                    // $queryUpdate = "UPDATE siswa SET name='$name', address ='$address', gaender ='$gaender', handphone ='$handphone', birth ='$birth' , age ='$age' WHERE id = '$id'";
                    // $insert = mysqli_query($koneksi,$queryUpdate);
                    // if($insert){
                    //     $uploadOk = 2;
                    //     $hasil = "Student successfully uploaded";
                    // }else{
                    //     $uploadOk = 0;
                    //     $hasil = "Student fail uploaded";   
                    // }
                }
            }
        }

        // var_dump($title);
        //$id      = $_SESSION['id'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>From Pendaftaran</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../sidebar.php';?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include '../content.php';?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                
                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Create Companies</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div> -->

                    <!-- Content Row -->
                    <!-- <div class="row">

                    </div> -->
                    <!-- Froms Input -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pendaftaran Siswa</h6>
                        </div>
                        <div class="card-body">
                            <?php if(isset($_POST["simpan"])){ ?>
                                <?php if(!empty($erros)){?>
                                    <div class="alert alert-danger" role="danger"> <?php echo $erros ?> </div>
                                <?php } else { ?>
                                    <?php if ($uploadOk == 1 || $uploadOk == 2) { ?>
                                        <div class="alert alert-success" role="alert"> <?php echo $hasil;?></div>
                                    <?php }else{ ?>
                                        <div class="alert alert-danger" role="danger"> <?php echo $hasil;?></div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?> 
                            <form action="http://localhost/latihan/ujk-03/layouts/home.php" method="post">
                                <div class="mb-3 row">
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="" value="<?php echo $row['username'];?>" disabled readonly>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="" value="<?php echo $row['email'];?>" disabled readonly>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Tanggal Pendaftaran</label>
                                        <input type="date" class="form-control" name="tgl_pdf" id="" value="">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="" value="">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Tempat</label>
                                        <input type="text" class="form-control" name="tempat" id=""></input>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lhr" id="" value="">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Alamat</label>
                                        <textarea type="text" class="form-control" name="alamat" id=""></textarea>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Nomer HP</label>
                                        <input type="text" class="form-control" name="no_hp" id="" value="">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kl" id="">
                                            <option value="">--Pilih--</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Asal Sekolah</label>
                                        <input type="text" class="form-control" name="sekolah" id="" value="">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Kejuruan</label>
                                        <select class="form-control" name="kejuruan_id">
                                            <?php 
                                                foreach ($dataJurusan as $data){ ?>
                                                    <option value="<?= $data['id']?>"><?= $data['kejuruan']?></option>
                                            <?php
                                                }?>
                                        </select>
                                    </div>
                                </div>
                                    <input type="hidden" name="id" value="">
                                    <input type="submit" name="simpan" class="btn btn-primary"></input>
                                    <a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn btn-secondary">Refresh</a>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pendaftaran</th>
                                        <th>Nama</th>
                                        <th>Tempat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamina</th>
                                        <th>No HP</th>
                                        <th>Sekolah</th>
                                        <th>Kejuruan</th>
                                        <th>Akasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                    foreach($dataSiswa as $datas){
                                        echo "<tr>";
                                            echo "<td>{$no}</td>";
                                            echo "<td>{$datas['tgl_pdf']}</td>";
                                            echo "<td>{$datas['nama']}</td>";
                                            echo "<td>{$datas['tempat']}</td>";
                                            echo "<td>{$datas['tgl_lhr']}</td>";
                                            echo "<td>{$datas['alamat']}</td>";
                                            echo "<td>{$datas['no_hp']}</td>";
                                            echo "<td>{$datas['jenis_kl']}</td>";
                                            echo "<td>{$datas['sekolah']}</td>";
                                            echo "<td>{$datas['kejuruan']}</td>";
                                            ?>
                                            <?php echo "<td>";?>
                                                <a class="btn btn-info" href="">Update</a>
                                                <form onsubmit="return confirm('Apakah yaknik mau dihapus?')" method="post" action="">
                                                    <input type="hidden" name="id" value="<?php echo $datas['id'];?>">
                                                    <input type="submit" name="hapus" value= "Delate" class="btn btn-danger">
                                                </form>
                                                </td>
                                        <?php echo "</tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include '../modallogout.php';?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>