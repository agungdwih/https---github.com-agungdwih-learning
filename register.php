<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];

if($password==$cpassword){
    $sql="SELECT * FROM user WHERE username='$username'";
    $result=mysqli_query($db, $sql);
    $data=mysqli_num_rows($result);
    if (!$data>0) {
        # code...
        $sql="INSERT INTO `user` (`id_user`, `username`, `password`) VALUES (NULL, '$username', '$password');";
        $result=mysqli_query($db,$sql);
        if($result){
            echo "<script>alert('Berhasil')</script>";
            $username="";
            $password="";
            $cpassword="";
        }
        else{
            echo "<script>alert('Kesalahan')</script>";
        }
    }
    else{
        echo "<script>alert('username terdaftar')</script>";
    }
}
else{
    echo "<script>alert('Password Tidak Sama')</script>";
}
}



//   $query= mysqli_query($db,"SELECT * FROM user WHERE username='$username' and password='$password'");
//   $data= mysqli_fetch_assoc($query);
//   echo $username;
//   if ($data){
//     $_SESSION['username']=$data['username'];
//     header ('location: admin_home.php');
//   }
//   else {
//     echo "<script>alert('username salah')</script>";
//   }
// }
// if(isset($_SESSION['username'])){
// header ('location:admin_home.php');

// }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container p-5 bg-color-secondary bg-opacity-10">
      <form method='post' action=''>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Ulangi Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword">
        </div>
        <div>
          <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
        </div>
      </form>
    </div>
        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
            </li>
        </ul> -->
        </div>
    </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>