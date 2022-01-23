<?php 
session_start();
if(!(isset($_SESSION["sesitoken"]))) { 
    header("Location: index.php"); 
    exit;
}
require 'Method.php';
$data = getData($_GET["id"], "user");
$id  = $_GET["id"];
if(isset($_POST["ubah"])) { 

    if(ubahData($_POST , $_GET["id"]) > 0) { 
        echo "<script> alert('Data Berhasil diupdate'); 
        document.location.href = 'create-todo.php?id=$id'; 
                
        </script>";
    }else { 
        echo "<script> alert('Data Tidak Berhasil diupdate'); 
        document.location.href = 'create-todo.php?id=$id'; 
                
        </script>";
    } 

}


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
        href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Fira+Sans+Condensed&family=Montserrat&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="change-data.css">
    <title>Hello, world!</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-5 bg-sendiri rounded-start">
                <form action="" class="ms-3 text-mont text-dark" method="post">
                    <h2 class="fs-3 text-center text-white mt-5 text-mont fw-bold">Ubah Datamu Disini!</h2>
                    <label for="nama" class="text-white ">Username</label>
                    <input type="text" class="fw-bold form-control bg-transparent border-3 w-75 text-white"
                        name="username" id="username" placeholder="Username" autocomplete="off" required
                        value="<?php echo $data["username"]; ?>">
                    <label for="nama" class="text-white">Email</label>
                    <input type="text" class="fw-bold form-control bg-transparent border-3 w-75 text-white" name="email"
                        id="email" placeholder="Email" autocomplete="off" required
                        value="<?php echo $data["email"]; ?>">
                    <label for="nama" class=" text-white">Password</label>
                    <input type="password" class="fw-bold form-control bg-transparent border-3 w-75 text-white"
                        name="password" id="password" placeholder="Password Baru" autocomplete="off" required>
                    <button type="submit" class="btn btn-outline-dark mt-3 offset-3 mb-3" name="ubah">Submit
                        Data</button>
                </form>
            </div>
            <div class="col-1 col-md-7 overflow-h bagan rounded-end">
                <h3 class="text-center fs-1 text-white mt-3 text-left badge badge-light text-wrap text-mont">Harap
                    Dibaca!</h3>
                <div class="container mt-2  ">
                    <p class="text-white fs-5 text-arc fw-bold ">Kamu dapat Merubah Datamu Pada Laman ini. <span
                            class="text-danger"> Admin
                            tidak akan
                            bertanggung jawab
                        </span>
                        jika
                        terjadi
                        kelupaan data dan sebagainya. Karena data yang kami simpan berupa one-way function yang
                        tidak dapat
                        dijadikan
                        plain-text, jadi harap periksa dan lakukan re-checking kembali sebelum merubah data</p>
                    <a href="create-todo.php?id=<?= $id ?>"> <button type="button"
                            class="btn btn-outline-light mt-3">Batalkan</button></a>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="jos">
        <path fill="#ffffff" fill-opacity="1"
            d="M0,256L30,234.7C60,213,120,171,180,138.7C240,107,300,85,360,101.3C420,117,480,171,540,213.3C600,256,660,288,720,266.7C780,245,840,171,900,144C960,117,1020,139,1080,154.7C1140,171,1200,181,1260,154.7C1320,128,1380,64,1410,32L1440,0L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
        </path>
    </svg>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>