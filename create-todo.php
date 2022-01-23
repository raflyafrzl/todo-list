<?php

include 'Method.php';

session_start(); 

if(!isset($_SESSION["sesitoken"])) { 
    header("Location: index.php"); 
    exit;
}


$id = $_GET["id"];
$getData = getData($id, "user");


if(isset($_POST["submit"])) { 
   
if( insertData($_POST , $id) > 0) { 
    echo "<script> alert('Data berhasil diinput'); 
      
    </script>";
} else { 
    echo "<script> alert('Data yang anda masukan gagal); </script>"; 
}

}



$hasil  = query("SELECT * FROM data_todo where id_user='$id';" ); 



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <!-- Font CSS -->
    <link rel="stylesheet" href="todo-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/71b2b44838.js" crossorigin="anonymous"></script>
    <title>Buat Todo-list</title>
</head>

<body class="bg-awe">


    <div class="container">
        <div class="d-flex justify-content-center border-3 border">
            <h2 class="text-white fst-italic fw-bold w-100 bg-light bg-transparent p-3">Selamat Datang,
                <?php echo $getData["username"]; ?></h2>
            <a href="change-data.php?id=<?= $id ?>" class="decoration w-25 h-25 me-5 ">
                <h4 class="fs-5  p-3 text-white mt-2 h-25">[Ubah Data]</h4>
            </a>
            <a href="index.php" class="decoration h-25">
                <h4 class="fs-5 w-25 p-3 text-white mt-2">[Logout]</h4>
            </a>

        </div>

        <div class="row p-2 text-sans">
            <div class="col-lg-4 bg-transparent  rounded-3 ">
                <h3 class="fs-2 text-white fst-italic text-center mt-4  fw-bold">Buat Todo-list</h3>
                <form action="" method="post" class="offset-2" class="">
                    <label for="" class="fw-bold text-white">Masukan Judul</label>
                    <input type="text" placeholder="Tittle Todo-list" class="form-control w-75 p-2" name="judul"
                        autocomplete="off" required>
                    <label for="" class="fw-bold text-white">Pilih tanggal deadline</label>
                    <input type="date" id="" class="form-control w-75" name="tanggal" autocomplete="off" required>

                    <label for="select" class="fw-bold text-white">Status Todo-list</label>
                    <select name="status" id="" class="form-select w-75">
                        <option value="Choose your Status">Choose your status</option>
                        <option value="Important">Important</option>
                        <option value="Customary">Customary</option>
                    </select>
                    <label for="" class="fw-bold text-white">Deskipsi Todo-List</label>
                    <div class="form-floating w-75">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                            name="deskripsi" class="" autocomplete="off" required></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>

                    <button type="submit" name="submit"
                        class="fw-bold btn btn-outline-dark mt-2 w-75 mb-5">Submit</button>
                </form>
            </div>
            <div class="col-lg-8">
                <table class="table table-hover text-white">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($hasil as $data) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?php echo $data["judul"]; ?></td>
                            <td><?php echo $data["tanggal"] ?></td>
                            <td><?php echo $data["status"]; ?></td>
                            <?php $i++ ?>
                            <td><a href="confirm-delete.php?id=<?= $data["id"]; ?>" class="text-danger "><i
                                        class="fas fa-trash-alt me-3 pointer"></i></a>
                                <i class="fas fa-info show-modal pointer"></i>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="broh hidden">
        <button class="close-modal">&times;</button>
        <h1 class="fw-bold"><?php echo $data["judul"]; ?></h1>
        <p class="mt-5 fw-bold fs-5">
            <?php echo $data["deskripsi"] ?>
        </p>
    </div>
    <div class="overlay hidden"></div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute">
        <path fill="#ffffff" fill-opacity="1"
            d="M0,256L14.1,240C28.2,224,56,192,85,160C112.9,128,141,96,169,106.7C197.6,117,226,171,254,192C282.4,213,311,203,339,197.3C367.1,192,395,192,424,197.3C451.8,203,480,213,508,186.7C536.5,160,565,96,593,74.7C621.2,53,649,75,678,96C705.9,117,734,139,762,160C790.6,181,819,203,847,218.7C875.3,235,904,245,932,224C960,203,988,149,1016,138.7C1044.7,128,1073,160,1101,197.3C1129.4,235,1158,277,1186,272C1214.1,267,1242,213,1271,202.7C1298.8,192,1327,224,1355,208C1383.5,192,1412,128,1426,96L1440,64L1440,320L1425.9,320C1411.8,320,1384,320,1355,320C1327.1,320,1299,320,1271,320C1242.4,320,1214,320,1186,320C1157.6,320,1129,320,1101,320C1072.9,320,1045,320,1016,320C988.2,320,960,320,932,320C903.5,320,875,320,847,320C818.8,320,791,320,762,320C734.1,320,706,320,678,320C649.4,320,621,320,593,320C564.7,320,536,320,508,320C480,320,452,320,424,320C395.3,320,367,320,339,320C310.6,320,282,320,254,320C225.9,320,198,320,169,320C141.2,320,113,320,85,320C56.5,320,28,320,14,320L0,320Z">
        </path>
    </svg>
    <script src="todo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>