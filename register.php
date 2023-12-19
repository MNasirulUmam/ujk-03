<?php

    include 'koneksi.php';

    if(isset($_POST["simpan"])) { 
        $username  = $_POST["username"];
        $password  = md5($_POST["password"]);
        $email     = $_POST["email"];
        $id        = $_POST["id"];
        if(empty($username) || empty($password) || empty($email)) {
            $erros = "data harus di isi";
            // var_dump($erros);
        }else{
            if(empty($id)){
                $insert ="INSERT INTO login(username, password, email) VALUES ('$username', '$password', '$email')";
                $query  = mysqli_query($koneksi,$insert);
            
                if($query2){
                    $uploadOk = 1;
                    $hasil = "Akun successfully uploaded";
                }else{
                    $uploadOk = 0;
                    $hasil = "Akun fail uploaded";   
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

    <title><?php echo "Register"?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0"> 
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                        <h2 class="h4 text-gray-900 mb-4">UTP BLK PASURUSAN</h2>
                                    </div>
                                    <form class="user" method="post" action ="proses.php">
                                        <div class="form-group">
                                            <input type="text" name="username" placeholder="Username" class="form-control form-control-user">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="email" class="form-control form-control-user">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Password" class="form-control form-control-user">
                                        </div>
                                        <input type="submit" name="login" class="btn btn-primary btn-user btn-block" autofocus></input>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>