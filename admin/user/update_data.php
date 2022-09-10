<?php 
include('../../conn.php');

$id = $_POST['id'];
$username = strtolower(stripslashes($_POST["usernameEdit"]));
$level = $_POST["levelEdit"];
$password = mysqli_real_escape_string($con, $_POST["passwordEdit1"]);
$password2 = mysqli_real_escape_string($con, $_POST["passwordEdit2"]);
$update_dt = date("Y-m-d H:i:s");

//cek username sudah ada/belum
$result = mysqli_query($con, "SELECT username FROM user WHERE username = '$username'");

if(mysqli_fetch_assoc($result)){
    echo "
        <script> 
            alert('username sudah terdaftar!');
        </script>
    ";
    return false;
}

// cek konfirmasi pass
if($password !== $password2){
    echo "
        <script> 
            alert('konfirmasi password tidak sesuai!');
        </script>
    ";
    return false;
}

// enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "UPDATE `user` SET  `username`='$username', `level`= '$level', `input_dt`='',  `update_dt`='$update_dt' WHERE `id_user`='$id' ";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>