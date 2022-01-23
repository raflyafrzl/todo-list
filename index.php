<?php 
session_start();
include 'Method.php';


if(isset($_POST["submit"])) { 

    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    $email = $_POST["email"];

   

    $result = mysqli_query($conn, "SELECT * FROM user where username = '$username' "); 

    if(mysqli_num_rows($result) === 1) { 
      
        $result = mysqli_query($conn, "SELECT * FROM user where email = '$email' ");
        if(mysqli_num_rows($result)) { 
            

            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])) { 
                $_SESSION["sesitoken"] = true;
                $id = $row["id"];
                header("Location: create-todo.php?id=$id");
                exit;
            }else { 
                $err = true;
                echo "<script> alert('Password Salah!, Mohon isi kembali'); </script>";
            }

        } else { 
            echo  "<script> alert('Email tidak ditemukan!'); </script>";
        }


    }else { 
        echo "<script> alert('username tidak ditemukan!'); </script>";
        
    }

   
    
}

$_SESSION = [];
session_unset();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Press+Start+2P&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>TODO LIST</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light bg-gradient mb-2">
        <div class="container mt-2">
            <a class="navbar-brand" href="#">
                <img src="https://www.pngmart.com/files/8/List-PNG-Transparent-Picture.png" alt="" width="30"
                    height="24" class="d-inline-block align-text-top ">
                <span class="fw-bold text-game">
                    TODO-LIST
                </span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="register.php" class="secondary-link fs-5 fw-bold text-primary">Belum Punya Akun?</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid bg-success bg-gradient text-light p-5 h-100 height-fluid ">
        <div class="row mt-3">
            <div class="col-md-5 sm-10  ">
                <h1 class="fs-1 mb-3 fw-bold ">CREATE YOUR OWN <span class="text-dark text-game">
                        TODO-LIST</span></h1>
                <div class="about text-justify">
                    <header class="section-header ">

                        <p class="fs-5 fst-italic text-montserrat">
                            Daftar tugas-tugas yang harus dikerjakan pada suatu rentang waktu. Biasanya dibuat harian,
                            mingguan, atau bulanan. Ini adalah bagian dari perencanaan. Kamu
                            bisa lakukan semuanya disini!
                        </p>

                        <button class="btn btn-light mt-4 login">Login Sekarang</button>

                </div>
            </div>
            <div class="col-3 marginx mt-3"></div>
            <div class="col-md-3 geser mt-5 mt-lg-3">

                <img src="https://www.pngall.com/wp-content/uploads/8/Task-List.png" alt="" class="image-thumbnail "
                    width="360" height="360">

            </div>
        </div>
        <br> <br>
    </div>

    <div class="modalin hidden ">
        <button class="close-modal btn btn-primary">&times;</button>
        <h2>Input Your Data Here😁</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="post">

                        <label for="username" class="mt-2 mb-2 fst-italic">Username: </label>
                        <input type="text" name="username"  class="form-control w-100 p-2" autocomplete="off">

                        <label for="username" class="mt-2 mb-2 fst-italic">Email: </label>
                        <input type="text" name="email"  class="form-control w-100 p-2" autocomplete="off">
                        <label for="username" class="mt-2 mb-2 fst-italic">Password: </label>
                        <input type="password" name="password"  class="form-control w-100 p-2" id="password" autocomplete="off">

                        <button class="btn btn-primary mt-3" type="submit" name="submit">Sign In</button>
                        <button class="btn btn-primary mt-3" id="show" type="button">Show Password</button>
                       
                    </form>
                </div>

                <div class="col-md-4 img-slider">
                    <img src="https://dapodik.disdik.jabarprov.go.id/PAKEMASN/img/login.png" alt="" width="300"
                        height="300" class="ml-5 rounded mt-3">
                </div>
            </div>
        </div>
    </div>
    <div class="overlay hidden"></div>
  
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
      <script>
        const show =  document.getElementById("show"); 
        const password  = document.getElementById("password");
        show.addEventListener('click', function() { 
            if(password.getAttribute("type") === "password") { 
                password.setAttribute("type" , "input");
            }else { 
                password.setAttribute("type" , "password");
            }
        })

    </script>
</body>

</html>