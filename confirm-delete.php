<?php 
require 'Method.php';


$data = getData($_GET["id"] ,"data_todo"); 

    if(isset($_POST["submit"])) { 
        if(deleteData($_GET["id"]) > 0 ) { 
            $id = $data["id_user"];
            echo "<script> alert('Data Berhasil dihapus');  
            document.location.href = 'create-todo.php?id=$id'
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
    <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Konfirmasi Hapus Data</title>
    <style>
    .txg {
        font-family: 'Teko', sans-serif;
        font-size: 30px;
    }

    .absolute {
        position: absolute;
    }
    </style>
</head>

<body>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#273036" fill-opacity="1"
            d="M0,192L13.3,165.3C26.7,139,53,85,80,58.7C106.7,32,133,32,160,58.7C186.7,85,213,139,240,149.3C266.7,160,293,128,320,112C346.7,96,373,96,400,85.3C426.7,75,453,53,480,69.3C506.7,85,533,139,560,154.7C586.7,171,613,149,640,149.3C666.7,149,693,171,720,197.3C746.7,224,773,256,800,256C826.7,256,853,224,880,208C906.7,192,933,192,960,170.7C986.7,149,1013,107,1040,90.7C1066.7,75,1093,85,1120,112C1146.7,139,1173,181,1200,176C1226.7,171,1253,117,1280,85.3C1306.7,53,1333,43,1360,85.3C1386.7,128,1413,224,1427,272L1440,320L1440,0L1426.7,0C1413.3,0,1387,0,1360,0C1333.3,0,1307,0,1280,0C1253.3,0,1227,0,1200,0C1173.3,0,1147,0,1120,0C1093.3,0,1067,0,1040,0C1013.3,0,987,0,960,0C933.3,0,907,0,880,0C853.3,0,827,0,800,0C773.3,0,747,0,720,0C693.3,0,667,0,640,0C613.3,0,587,0,560,0C533.3,0,507,0,480,0C453.3,0,427,0,400,0C373.3,0,347,0,320,0C293.3,0,267,0,240,0C213.3,0,187,0,160,0C133.3,0,107,0,80,0C53.3,0,27,0,13,0L0,0Z">
        </path>
    </svg>
    <div class="container  text-center">
        <h1 class="text-center txg fs-1">Konfirmasi Penghapusan Data!</h1>
        <p class=" fs-3 txg">Apakah Anda Yakin Ingin Menghapus Data "<?php echo $data["judul"] ?>",
            Data yang sudah dihapus <span class="fst-italic fw-bold">Tidak akan bisa dikembalikan.</span></p>
        <form action="" method="post">


            <button type="submit" name="submit" class="btn btn-dark">Hapus Data!</button>
            <a href="create-todo.php?id=<?= $data["id_user"]; ?>"><button type="button" name="submit"
                    class="btn btn-dark">Batalkan Konfirmasi</button></a>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>