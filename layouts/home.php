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

    $queryUsers = "SELECT * FROM users";
    $result = mysqli_query($koneksi, $queryUsers); // Menjalankan query menggunakan fungsi mysqli_query dengan menggunakan koneksi '$koneksi'.
    $row = mysqli_fetch_assoc($result);  

    $queryJurusan = "SELECT * FROM kejuruan";
    $dataJurusan = mysqli_query($koneksi, $queryJurusan);
    // var_dump($row);
    // die;   
    if(isset($_POST["simpan"])) { 
        $username  = $_POST["username"];
        $email     = $_POST["email"];
        $tgl_pdf   = $_POST["tgl_pdf"];
        $nama      = $_POST["nama"];   
        $tempat    = $_POST["tempat"]; 
        $tgl_lhr   = $_POST["tgl_lhr"];
        $alamat    = $_POST["alamat"];
        $jenis_kl  = $_POST["jenis_kl"];
        $sekolah   = $_POST["sekolah"];
        $kejuruan_id  = $_POST["kejuruan_id"];
        // $user_id   = $_POST["user_id"];
        $id        = $_POST["id"];
        if(empty($tgl_pdf) || empty($nama) || empty($tempat) || empty($tgl_lhr) || empty($alamat) || empty($jenis_kl) || empty($sekolah) || empty($kejuruan_id)) {
            $erros = "data harus di isi";
            // var_dump($erros);
        }else{
            // if (!empty($age) && $age < 18) {
            //     $uploadOk = 0;
            //     $hasil = "Umur harus lebih dari atau sama dengan 18 tahun";
            // } else {
                if(empty($id)){
                    $user_id = "select max(id) from users";
                    $query1 = mysqli_query($koneksi,$user_id)->fetch_array(MYSQLI_NUM);
                    $queryInsert = "INSERT INTO students ( name, address, gaender, handphone, birth, age, user_id) VALUES ('$name','$address','$gaender','$handphone','$birth','$age','$query1[0]')";
                    $insert = mysqli_query($koneksi,$queryInsert);
                    if($insert){
                        $uploadOk = 1;
                        $hasil = "Student successfully uploaded";
                    }else{
                        $uploadOk = 0;
                        $hasil = "Student fail uploaded";   
                    }
                }else{
                    $queryUpdate = "UPDATE students SET name='$name', address ='$address', gaender ='$gaender', handphone ='$handphone', birth ='$birth' , age ='$age' WHERE id = '$id'";
                    $insert = mysqli_query($koneksi,$queryUpdate);
                    if($insert){
                        $uploadOk = 2;
                        $hasil = "Student successfully uploaded";
                    }else{
                        $uploadOk = 0;
                        $hasil = "Student fail uploaded";   
                    }
                }
            // }
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
                                        <input type="text" class="form-control" name="name" id="" value="">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" id="" value="">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Tempat</label>
                                        <input type="text" class="form-control" name="address" id=""></input>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="birth" id="" value="">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Alamat</label>
                                        <textarea type="text" class="form-control" name="address" id=""></textarea>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Nomer HP</label>
                                        <input type="text" class="form-control" name="handphone" id="" value="">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-control" name="gaender" id="gaender">
                                            <option value="">--Pilih--</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Asal Sekolah</label>
                                        <input type="text" class="form-control" name="age" id="" value="">
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