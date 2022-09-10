<?php 

session_start();
require 'functions.php';

//cek cookie
if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if( $key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }
}

// if (!isset($_SESSION["login"])){
//     header("Location: index.php");
//     exit;
// }




if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek uname dulu
    if(mysqli_num_rows($result) === 1){
        
        //cek passwordnya
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;

            //buat session 
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];


            //cek remember me
            if(isset($_POST['remember'])){
                //buat cookie

              setcookie('id', $row['id'], time()+60);
              setcookie('key', hash('sha256', $row['username']), time()+60);

            }

            //cek level
            if($row["level"] == 'Admin'){
                header("location:page.php?admin-home");
            } else {
                header("location:page.php?peternak-home");
            }
        }
    }

    $error =  true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form action="" method="post">
                <h3 class="mb-5">Sign in</h3>
                
                <div class="form-outline mb-4">
                <input type="username" id="username" name="username" class="form-control form-control-lg" />
                <label class="form-label d-flex justify-content-start" for="username">Username</label>
                </div>

                <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control form-control-lg" />
                <label class="form-label d-flex justify-content-start" for="password">Password</label>
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-start mb-4">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" />
                  <label class="form-check-label ms-2" for="remember"> Remember password </label>
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit" id= "login" name="login">Login</button>

                <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>