<?php 
session_start();
if(!isset($explodeMail))  { 
    $_SESSION = [];
session_unset();
session_destroy();

}

require 'Method.php';
// Regex

$acceptedDomain = ["com", "org", "net" , "info" , "tech", "tbo", "co", "id" , "go"];

if(isset($_POST["submit"])) { 

$explodeMail = explode("@",$_POST["email"]);
$explodeDomain = explode("." , end($explodeMail)); 
    // Regex
if(preg_match("/[A-Z][a-z]{2,}/", $_POST["username"])) { 
if(preg_match_all("/[@]+/", $_POST["email"]) === 1 ) {
    // Regex
    if((preg_match("/([a-z]){2,}([A-Z])*[0-9]*/", $explodeMail[0]) > 0)  && !(preg_match("/[!@#$%^*()_+<>? \"';:{}\[\] ]+/", $explodeMail[0]) > 0) ) {  
        
        if(in_array(end($explodeDomain), $acceptedDomain) || (in_array(end($explodeDomain), $acceptedDomain) && in_array($explodeDomain[count($explodeDomain)-2], $acceptedDomain)) ) { 
        
            if(regisData($_POST) > 0 ) { 
                echo "<script> alert('Data Berhasil Masuk'); 
                document.href.location=register.php; </script>"; 
                

            }

            }else { 
                $error = true;
                echo "<script> alert('Email tidak sesuai dengan kriteria'); 
                document.href.location=register.php;
                </script>";
            }

    }else { 
        $error = true;
        echo "<script> alert('Email tidak memenuhi kriteria'); 
        document.href.location=register.php;
        </script>";
    }

}else { 
    $error = true;
    echo "<script> alert('Email Tidak memiliki @ atau terdapat lebih dari satu @'); </script>";
}


}
else { 
    echo "<script> alert('Username tidak valid'); </script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="style-register.css" />

    <title>Halaman Register</title>
</head>

<body>
    <div class="container bg-gr mt-lg-5 mt-5">
        <div class="row rounded-3 overflow-hidden">
            <div class="col-lg-5 bg-primary text-center col-sm-12 colhidden colgambar">
                <h2 class="text-white mt-5">Sudah Punya Akun?</h2>
                <p class="text-white mt-3">
                    Jika kamu sudah punya akun, maka kamu langsung dapat melakukan login. Dengan
                    begitu kamu bisa membuat todo-listmu sendiri agar tidak ketinggalan
                    info yang akan datang. Ayo segera buat todo-list yang kamu mau!
                </p>
                <a href="index.php"><button class="btn btn-outline-light rounded-pill">
                        Saya sudah punya akun
                    </button></a>
            </div>
            <div class="col-lg-7 bg-light bg-opacity-25">
                <h2 class="fw-bold text-center mt-5 text-white">Sign up here!</h2>

                <form action="" method="post" class="">


                    <label for="" class="form-label me-3 mt-2 offset-3  text-white">Username/Inisial:
                    </label>
                    <input type="text" name="username"
                        class=" text-dark form-control w-50 p-2 rounded-3 offset-3 bg-transparent border border-3"
                        placeholder="Username" autocomplete="off" required />

                    <label for="" class="form-label me-3 mt-2 offset-3 text-white">Password:
                    </label>
                    <input type="text" name="password"
                        class=" text-dark bg-transparent border border-3 form-control w-50 p-2 rounded-3 offset-3 bg-opacity"
                        placeholder="Password" id="regexpassword" autocomplete="off" required />
                    <label for="" class=" form-label me-3 mt-2 offset-3 text-white">Email: </label>
                    <input type="text" name="email"
                        class=" text-dark bg-transparent border border-3 form-control w-50 p-2 rounded-3 offset-3 bg-opacity"
                        placeholder="Email" autocomplete="off" required id="email" />

                    <button type="submit" class="btn btn-outline-light mt-4 offset-2 offset-lg-3 mb-5 " name="submit"
                        id="sub-btn">
                        Submit Data!
                    </button>
                    <button type="button" class="btn btn-outline-light mt-4 ms-4 mb-5" id="random">
                        Generate Password!
                    </button>
                    <?php if(isset($error)) : ?>
                    <div class="alert alert-danger w-75 ms-5 text-center hide">
                        <p> <?php echo "Email Tidak Valid"; ?></p>
                        <p><?php echo "Username Email minimal memiliki panjang lebih dari 5 dan diawali 1 huruf kapital" ?> </p>
                    </div>

                    <?php endif; ?>
                    <?php if(isset($_SESSION["anotheremail"])) : ?>
                    <div class="alert alert-danger w-75 ms-5 text-center hide">
                        <p> <?php echo "Email Tidak Valid, Silahkan coba: "; ?></p>
                        <?php for($i = 0; $i < count($_SESSION["anotheremail"]); $i++ ) : ?>
                        <?php echo $_SESSION["anotheremail"][$i] . "@" . $explodeMail[1]. ", "; ?>
                        <?php endfor; ?>
                        <p>Mohon tunggu 10 detik</p>
                        <a href="session_break.php"><button type="button" class="btn-close absolute" aria-label="Close">
                            </button> </a>
                    </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="regex.js"></script>
</body>

</html>