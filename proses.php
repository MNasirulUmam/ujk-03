<?php
    include 'koneksi.php'; // mengambil file konesksi database
    session_start(); // session authentication
    
    $username = $_POST['username']; // deklarasi variable username kirman dari post
    $email    = $_POST['email']; // deklarasi md5  variable  paswword kirman dari post
    $password = md5($_POST['password']);

    $username = stripcslashes($username); //Menghapus karakter backslash (\) yang ada dalam string username.
    $email    = stripcslashes($email); //Menghapus karakter backslash (\) yang ada dalam string email.
    $password = stripcslashes($password); //Menghapus karakter backslash (\) yang ada dalam string password.
    $email    = mysqli_real_escape_string($koneksi,$email);
    $username = mysqli_real_escape_string($koneksi,$username); // Melakukan escaping terhadap string username menggunakan fungsi mysqli_real_escape_string().
    $password = mysqli_real_escape_string($koneksi,$password); // Melakukan escaping terhadap string password menggunakan fungsi mysqli_real_escape_string().

    if(isset($_POST['username']) && ($_POST['password']) && ($_POST['email'])){
        $login = "INSERT INTO users(username, email, password) VALUES ('$username','$email','$password')";
        $result = mysqli_query($koneksi,$login);
        if ($result){ // Memeriksa apakah hasil query mengembalikan setidaknya satu baris data.
            header("Location: login.php"); // Mengarahkan pengguna ke halaman login.php jika query tidak mengembalikan baris data.
        }else{
            header("Location: register.php");
        }
    }else{
        $login = "SELECT username, password from users WHERE username = '$username' and password = '$password'"; // qery mengambl usernam dan password pada tabel user
        $result = mysqli_query($koneksi, $login); // Menjalankan query menggunakan fungsi mysqli_query dengan menggunakan koneksi '$koneksi'.
        if (mysqli_num_rows($result) >0){ // Memeriksa apakah hasil query mengembalikan setidaknya satu baris data.
            $_SESSION["name"] = $_POST['username']; // Mengatur variabel sesi 'name' dengan nilai dari $_POST['username'].
            $_SESSION["username"] = true;  // Mengatur variabel sesi 'username' menjadi bernilai true.
            // var_dump($_SESSION);
            header("Location: layouts/home.php");  // Mengarahkan pengguna ke halaman home.php
    
        }else{
            header("Location: index.php"); // Mengarahkan pengguna ke halaman login.php jika query tidak mengembalikan baris data.
        }  

    }

?>