<?php 
include('../../conn.php');

$id = $_POST['id'];
$jenis = $_POST['pakan'];
$update_dt = date("Y-m-d H:i:s");
$input_dt = $update_dt;

$sql = "UPDATE `pakan` SET  `pakan`='$pakan', `input_dt`='$input_dt',  `update_dt`='$update_dt' WHERE `id_pakan`='$id' ";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
        'pakan'=>$pakan,
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