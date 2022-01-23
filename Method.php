<?php 

$conn = mysqli_connect("localhost", "root", "" , "regex-tbo"); 




function regisData($data) { 
    global $conn; 
    $username = $data["username"];
    $password = $data["password"];
    $email = $data["email"]; 
  

    // $CheckingData = mysqli_query($conn, "SELECT username FROM user WHERE username= '$username'");

    // if(mysqli_fetch_assoc($CheckingData)){ 
    //     echo "<script>Username Sudah ada, Silahkan Coba yang lain<script>"; 
      
    //     return false;
    // }

    $CheckingData = mysqli_query($conn, "SELECT email FROM user WHERE email= '$email'"); //0
    if(mysqli_fetch_assoc($CheckingData) ) { 
        echo "<script> alert('Email Sudah Terdaftar Dalam Database!'); </script>";
        
        $_SESSION["anotheremail"] = getEmail($email, $username);
        return false;
    }
    //Hash Password; 

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user values ('','$username', '$password' , '$email') ");

    return mysqli_affected_rows($conn);



}

function getEmail($email, $string) { 

// $pattern = "0123456789ABCDEFGHIZJKLMOPRSTUVWXYZabcdefghijklmnoprstu";
// $data = []; 
// $temp = ""; 
// for($i = 0; $i < 4; $i++) { 

//     for($j = 0; $j < 5; $j++) { 
//         $temp  .= $pattern[rand(0,strlen($pattern)-1)]; 
//     }

//     $data[] = $username + $temp;  
//     $temp  = ""; 
// }

//Raflyafrzl 


//


$pattern = "0123456789"; 

$explodeNama = explode(" ", $string); 

$splitMail = preg_split("/[@]+/", $email);
$newMail = [];
    if(preg_match("/[@]+/", $email) > 0 ) { 
        
    for($i = 0; $i < 3; $i++) { 
        $temp = $explodeNama[rand(0, count($explodeNama)-1)];
        if(preg_match("/[($temp)]/", $splitMail[0]) > 0 ) { 
               
                $temp = substr($temp , rand(1, strlen($temp)), 2); 
                $newMail[] = $splitMail[0] . $temp . substr($pattern, rand(0,strlen($pattern)),5); 

         }else { 
               
                if(in_array($splitMail[0]. $temp , $newMail)) { 
                    $newMail[] = $splitMail[0] . $temp . substr($pattern, rand(0,strlen($pattern)),5);
                }else { 
                    $newMail[] = $splitMail[0] . $temp;
                }
         }

    }


    }





return $newMail;
 



}



function getData($query , $namatable) { 
    global $conn; 

   if($namatable === "user") { 
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id= '$query'"); 
   }else { 
    $result = mysqli_query($conn, "SELECT * FROM data_todo WHERE id= '$query'"); 
   }


    return mysqli_fetch_assoc($result);

}


function query($query) { 
    global $conn; 

    $result = mysqli_query($conn, $query); 

    $totalData = []; 

    while($data = mysqli_fetch_assoc($result)) { 
        $totalData[] = $data;
    }

 
    return $totalData;
    

}


function insertData($data, $id) { 

    global $conn; 

    $id_user = $id; 
    $tanggal = htmlspecialchars($data["tanggal"]) ; 
    $status =  htmlspecialchars($data["status"]) ;
    $judul =   htmlspecialchars($data["judul"]) ;
    $deskripsi = htmlspecialchars($data["deskripsi"]) ;
    
    $query = "INSERT INTO data_todo values('',$id_user, '$tanggal' , '$status' , '$judul' , '$deskripsi');"; 

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}


function deleteData($id) { 

    global $conn; 
    $query12 = "DELETE FROM data_todo WHERE id= $id; " ;
    mysqli_query($conn, $query12); 


    return mysqli_affected_rows($conn); 



}

function ubahData($data , $id) { 

    global $conn; 
    $username = htmlspecialchars($data["username"]); 
    $email = htmlspecialchars($data["email"]); 
    $password = htmlspecialchars($data["password"]);  

    $password = password_hash($password, PASSWORD_DEFAULT);



    //Gak bakal dieksekusi
     
    $query  = "UPDATE user SET password='$password' where id = $id;";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    



}
?>