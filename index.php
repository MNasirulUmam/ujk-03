<?php
## Author : M. Nasirul Umam
## Tanggal : 25 juli 2023 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BLK PASURUAN</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!-- Bootsrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <!-- Bootstrap end -->
        <!-- My Css -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body id="home" >
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow" style ="background-color: rgba(0, 128, 255, 0.3) ">
            <div class="container">
                <a class="navbar-brand" href="index.php"><i class="bi bi-play-circle-fill"></i> UPT BLK PASURUAN</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <!-- <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#home">Home</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">SINGUP</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar end -->
        <section class="vh-100 bg-image" style="background-image: url('img/blk.jpeg'); background-repeat: no-repeat; background-size: cover;">
            <div class="container text-center mb-3">
                <p class="justify-content-center" style= "color:white; padding: 50px; font-size: 50px"><b>UPT BLK PASURUAN</b></p>
                <h5 class="text-center" style= "color:white;">Jl. Pahlawan Sunaryo No.96S, Pateban, Kb. Waris, Kec. Pandaan, Pasuruan, Jawa Timur 67156</h5>
            </div>
            <div class="text-center">
                <!-- <h2 class="display-4" style= "color:white;"><i class="bi bi-chevron-double-down"></i></h2> -->
            </div>
        </section>
        
        <!-- Jumbotron -->
        <!-- <section class="jumbotron text-center">
            <div class="container text-center mb-3">
               
                <div class="row justify-content-center fs-5">
                    <div class="col-md-4">
                        ADVENTURE Sejati? Join Now !!
                    </div>
                </div>
            </div>
            <i class="bi bi-chevron-double-down"></i>
        </section> -->
        <!-- Jumbotron end -->
        
        <!-- Abouts -->
        <!-- <section id ="about">
            <div class="container text-center mb-3">
                <div class="row mt-5 mb-2">
                    <h2>Abouts</h2>
                </div>
                <div class="row justify-content-center fs-5">
                    <div class="col-md-10">
                        <h3></h3>
                    </div>
                    <div class="col-md-4">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique veritatis dolorem animi itaque, 
                        porro reiciendis deserunt ullam atque veniam impedit cupiditate accusantium numquam suscipit mollitia placeat voluptate, officia eaque assumenda.
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Abouts end -->

        <!-- Ny projects -->
        <!-- <section id="projects">
            <div class="container mb-2" style="background-color: #">
                <div class="row text-center mb-3">
                    <div class="col">
                        <h2>Projects</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="" class="card-img-top" alt="SC4a">
                            <div class="card-body">
                                <h2></h2>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Ny projects end -->

        <!-- Contact us -->
        <!-- <section id="contact">
        <div class="container">
            <div class="row text-center mb-3">
            <div class="col">
                <h2>Contact Us</h2>
            </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-6 mb-3">
                <div class="info">
                <div class="info-item d-flex">
                    <i class="bi bi-geo-alt-fill"></i>
                    <div>
                    <h4>Lokasi:</h4>
                    <p></p>
                    </div>
                </div>
                <div class="info-item d-flex">
                    <i class="bi bi-instagram"></i>
                    <div>
                    <h4>Instagram:</h4>
                    <p><a href=""></a></p>
                    </div>
                </div>
                <div class="info-item d-flex">
                    <i class="bi bi-phone"></i>
                    <div>
                    <h4>Phone</h4>
                    <p></p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
            <form>
                <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name">
                </div>
                <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="email">
                </div>
                <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            </div>
        </div>
        </section> -->
        <!-- Contact us end -->

        <!-- Footer -->
        <footer class ="text-center text-white pb-3" style ="background-color: #99CCFF">
        <div class="container text-center">
            <div class="row">
            <div class="col-sm-12 mt-3">
                <p>&copy; copyright <?php echo date("Y");?> | built with <i class="bi bi-suit-heart-fill text-danger"></i> by. <a href="https://github.com/MNasirulUmam"></a>M. Nasirul Umam</p>
            </div>
            </div>
        </footer>
        <!-- Footer us -->
    </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script type="text/JavaScript"> var theDate=new Date() document.write(theDate.getFullYear()) </script>