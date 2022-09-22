<?php
session_start();

include 'config.php';
$sql= "SELECT * FROM `jurusan`";
$result= mysqli_query($db,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script>
        function showNameValue(event)
        {
            const value = event.target.value;
            document.getElementById("nama").setAttribute('value',value);
        }
        function showNimValue(event)
        {
            const value = event.target.value;
            document.getElementById("nim").setAttribute('value',value);
        }
        function showAlamatValue(event)
        {
            const value = event.target.value;
            document.getElementById("alamat").setAttribute('value',value);
        }
        function showTtlValue(event)
        {
            const value = event.target.value;
            document.getElementById("ttl").setAttribute('value',value);
        }
        function showJurusanValue(event)
        {
            const value = event.target.value;
            const words = value.split(',');
            document.getElementById("jurusan").setAttribute('value',words[1]);
        }

    </script>
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
    <form method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-start">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input name="nama" onInput="showNameValue(event)" type="text" class="form-control">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input name='nim' onInput="showNimValue(event)" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" >Jurusan</label> 
            <select class="btn btn-primary" onchange="showJurusanValue(event)" id="selectbox" name="jurusan">
                        <?php  
                            while($user_data = mysqli_fetch_array($result)) {       
                        ?>
                            <option value="<?php echo $user_data['id_jurusan']; ?>,<?php echo $user_data['jurusan']; ?>"><?php echo $user_data['jurusan']; ?></option>
                        <?php
                                        }
                        ?>
                        </select>
                </div>
            <div class="mb-3">
                <label  class="form-label" style="border border-primary">Alamat</label>
                <input name='alamat' onInput="showAlamatValue(event)" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label  class="form-label">Tanggal Lahir</label>
                <input name='ttl' onInput="showTtlValue(event)" type="date" class="form-control">
            </div>
            <button type="submit" name='submit' class="btn btn-primary">Submit</button>
        </form>
        </div>


        <div class="d-flex justify-content-end ms-5">
            <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input readonly type="text" id="nama" class="form-control bg-dark  bg-opacity-10">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input  readonly id="nim" type="text" class="form-control bg-dark  bg-opacity-10">
                </div>
                <div class="mb-3">
                    <label >Jurusan</label> 
                    <input  readonly id="jurusan" type="text" class="form-control bg-dark  bg-opacity-10">
                    </div>
                <div class="mb-3">
                    <label  class="form-label" style="border border-primary">Alamat</label>
                    <input  readonly id="alamat" type="text" class="form-control bg-dark  bg-opacity-10">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Tanggal Lahir</label>
                    <input  readonly id="ttl" type="date" class="form-control bg-dark  bg-opacity-10">
                </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
   </body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nama=$_POST['nama'];
    $nim=$_POST['nim'];
    $jurusan=$_POST['jurusan'];
    $jurusan2 = explode(',', $jurusan);
    $alamat=$_POST['alamat'];
    $ttl=$_POST['ttl'];
    
    
    $sql = "INSERT INTO `js_dom` (`id_dom`, `nama`, `NIM`, `alamat`, `ttl`, `id_jurusan`) VALUES (NULL, '$nama', '$nim', '$alamat', '$ttl', '$jurusan2[0]');";
    $result = mysqli_query($db, $sql);
}
?>