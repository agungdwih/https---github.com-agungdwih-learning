<?php
include 'config.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `data_mahasiswa` WHERE no='$id';";
    $result = mysqli_query($db,$sql);
    $user_data = mysqli_fetch_array($result);
        $nama=$user_data['nama'];
        $nim=$user_data['nim'];
        $jurusan=$user_data['jurusan'];
        $alamat=$user_data['alamat'];
        $ttl=$user_data['tanggal_lahir'];
    
}
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
    <div class="container">
    <form method='post'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama</label>
    <input name="nama" value="<?php echo $nama ?>" type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">NIM</label>
    <input name='nim' value="<?php echo $nim ?>" type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label  class="form-label">Jurusan</label>
    <input name='jurusan' value="<?php echo $jurusan ?>" type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label  class="form-label">Alamat</label>
    <input name='alamat' value="<?php echo $alamat ?>" type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label  class="form-label">Tanggal Lahir</label>
    <input name='ttl' value="<?php echo $ttl; ?>" type="text" class="form-control">
  </div>
  <button type="submit" name='submit' class="btn btn-primary">Submit</button>
</form>
        </div>
    <script src="ttps://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nama=$_POST['nama'];
    $nim=$_POST['nim'];
    $jurusan=$_POST['jurusan'];
    $alamat=$_POST['alamat'];
    $ttl=$_POST['ttl'];
    
    $sql = "UPDATE `data_mahasiswa` SET `nama` = '$nama', `nim`='$nim', `jurusan`='$jurusan', `alamat`='$alamat', `tanggal_lahir`='$ttl' WHERE `data_mahasiswa`.`no` = $id;";
    $result = mysqli_query($db, $sql);
    header("Location: index.php");
}
?>