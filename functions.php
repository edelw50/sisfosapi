<?php 

//buat koneksi ke db
// $conn = mysqli_connect('localhost','siss1274_admin','javanica123','siss1274_test');
$conn = mysqli_connect('localhost','root','','test');

require_once('phpqrcode/qrlib.php');

//Set timezone
date_default_timezone_set('Asia/Jakarta');

//generate random string
function randomString($length = 10) {
    $str = "";
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str  .= $characters[$rand];
    }
    return $str;
}

function query($query){
    global $conn;
    $result =  mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function signup($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password1"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $input_dt = date("Y-m-d H:i:s");
    $update_dt = $input_dt;
    $level = $data["level"];

    //cek username sudah ada/belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "
            <script> 
                alert('username sudah terdaftar!');
            </script>
        ";
        return false;
    }

    //cek konfirmasi pass
    if($password !== $password2){
        echo "
            <script> 
                alert('konfirmasi password tidak sesuai!');
            </script>
        ";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    //tambah user baru ke db
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$level', '$input_dt', '$update_dt')");
    return mysqli_affected_rows($conn);

}

function addJenis($data){
    global $conn;

    //ambil data
    $jenis = htmlspecialchars($data["jenis"]);
    $ket = htmlspecialchars($data["keterangan"]);
    $input_dt = date("Y-m-d H:i:s");
    $update_dt = $input_dt;

    $query = "INSERT INTO jenis VALUES ('', '$jenis', '$ket', '$input_dt', '$update_dt')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function addPakan($data){
    global $conn;

    //ambil data
    $pakan = htmlspecialchars($data["pakan"]);
    $input_dt = date("Y-m-d H:i:s");
    $update_dt = $input_dt;

    $query = "INSERT INTO pakan VALUES ('', '$pakan', '$input_dt', '$update_dt')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//function tambah
function generateqr($data){
    global $conn;

    $id_user = $data["id"];
    //ambil data dari tiap elemen
    $nama = htmlspecialchars($data["nama"]);
    $nomor = randomString();
    $jenis = htmlspecialchars($data["opsi_jenis"]);
    $pakan = htmlspecialchars($data["opsi_pakan"]);
    $array_vaksin = $data["vaksin"];
    $gender = htmlspecialchars($data["opsi_gender"]);
    $birth_dt = htmlspecialchars($data["birth_dt"]);
    $weight_kg = htmlspecialchars($data["weight_kg"]);
    $warna = htmlspecialchars($data["opsi_warna"]);
    $harga = htmlspecialchars($data["harga"]);
    $input_dt = date("Y-m-d H:i:s");
    $update_dt = $input_dt;
    // $vaksin = implode(",",$array_vaksin);
    

    // var_dump($vaksin);

    //generate
    $qrvalue = $nomor;
    $tempDir = "pdfqrcodes/"; 
    $codeContents = "sisfo-sapi.com/page.php?view&id=" . $qrvalue; 
    $fileName = $nomor . '.png'; 
    $pngAbsoluteFilePath = $tempDir.$fileName; 
    $urlRelativeFilePath = $tempDir.$fileName; 
    if (!file_exists($pngAbsoluteFilePath)) { 
        QRcode::png($codeContents, $pngAbsoluteFilePath, QR_ECLEVEL_L, 4); 
    }

    $qr = base64_encode(file_get_contents($pngAbsoluteFilePath));
    
    $query = "INSERT INTO data_sapi VALUES 
    ('','$nama',$id_user,'$qrvalue','$jenis','$pakan', '$gender', '$birth_dt', $weight_kg, '$warna', $harga,'$qr','$input_dt','$update_dt')";
    mysqli_query($conn, $query);


    foreach ($array_vaksin as $vaksin){
       mysqli_query($conn, "INSERT INTO vaksin_sapi VALUES('','$qrvalue',$vaksin)");
    }

    return mysqli_affected_rows($conn);

}
?>