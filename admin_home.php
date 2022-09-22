<?php
session_start();

if (!isset($_SESSION['username'])){
    header ("location: index.php");
}
include 'config.php';
$sql = "SELECT *  FROM `data_mahasiswa` join `jurusan` on data_mahasiswa.id_jurusan = jurusan.id_jurusan;";
$result = mysqli_query($db, $sql);
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
        </div>
        <button type="button" class="btn btn-danger"><a class="button" href="logout.php">Log out</a></button>
    </div>
    </nav>
    <div class="container">
        <table class="table      rounded">
            <thead>
                <tr class="col bg-info bg-opacity-10">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Foto</th>
                <th scope="col">Edit</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    $i=1;
                    while($user_data = mysqli_fetch_array($result)) {       
                ?>
                <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $user_data['nama']; ?></td>
                <td><?php echo $user_data['nim']; ?></td>
                <td><?php echo $user_data['jurusan']; ?></td>
                <td><?php echo $user_data['alamat']; ?></td>
                <td><?php echo $user_data['tanggal_lahir']; ?></td>
                <td><img src="foto/<?php echo $user_data['foto' ]; ?>" width='25px' style='img-tumbnail'></td>
                <td><form method="get" action="update.php"><button type="submit" name="id" value="<?php echo $user_data['no'] ?>" class="btn btn-primary">Update</button></form></td>
                <td><a href="delete.php?id=<?php echo $user_data['no'] ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>
             <?php
             $i++;
                    }
             ?>
            </tbody>
        </table>
        <div class='container'>
            <nav class='navbar'>
                <a href='create.php'><button type="button" class="btn btn-primary" style='align-baseline'>Buat</button></a>
                    <form class="d-flex" role="search" method="GET" action="search.php">
                        <input class="form-control me-2" name='search' type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </nav>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>