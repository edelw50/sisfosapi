<?php 

include('conn.php');
include('functions.php');

$id_user = $_POST["id"];
//ambil _POST dari tiap elemen
$nama = htmlspecialchars($_POST["nama"]);
$nomor = randomString();
$jenis = htmlspecialchars($_POST["opsi_jenis"]);
$pakan = htmlspecialchars($_POST["opsi_pakan"]);
$array_vaksin = $_POST["vaksin"];
$gender = htmlspecialchars($_POST["opsi_gender"]);
$birth_dt = htmlspecialchars($_POST["birth_dt"]);
$weight_kg = htmlspecialchars($_POST["weight_kg"]);
$warna = htmlspecialchars($_POST["opsi_warna"]);
$harga = htmlspecialchars($_POST["harga"]);
$input_dt = date("Y-m-d H:i:s");
$update_dt = $input_dt;

//generate
$qrvalue = $nomor;
$tempDir = "../pdfqrcodes/"; 
$codeContents = "http://localhost:8080/sisfo-sapi/daftarsapi.php?id=" . $qrvalue; 
$fileName = $nomor . '.png'; 
$pngAbsoluteFilePath = $tempDir.$fileName; 
$urlRelativeFilePath = $tempDir.$fileName; 
if (!file_exists($pngAbsoluteFilePath)) { 
    QRcode::png($codeContents, $pngAbsoluteFilePath, QR_ECLEVEL_L, 4); 
}

$qr = base64_encode(file_get_contents($pngAbsoluteFilePath));

$sql = "INSERT INTO data_sapi VALUES 
('','$nama',$id_user,'$qrvalue','$jenis','$pakan', '$gender', '$birth_dt', $weight_kg, '$warna', $harga,'$qr','$input_dt','$update_dt')";
$query=mysqli_query($conn, $sql);
$lastId = mysqli_insert_id($conn);

foreach ($array_vaksin as $vaksin){
   mysqli_query($conn, "INSERT INTO vaksin_sapi VALUES('','$qrvalue',$vaksin)");
}

// return mysqli_affected_rows($conn);

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