<?php 
include('../conn.php');

$id = $_POST['id'];
$jenis = $_POST['jenis'];
$keterangan = $_POST['keterangan']; 
$update_dt = date("Y-m-d H:i:s");
$input_dt = $update_dt;

$sql = "UPDATE `jenis` SET  `jenis`='$jenis', `keterangan`= '$keterangan', `input_dt`='$input_dt',  `update_dt`='$update_dt' WHERE `id_jenis`='$id' ";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
        'jenis'=>$jenis,
        'keterangan'=>$keterangan
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