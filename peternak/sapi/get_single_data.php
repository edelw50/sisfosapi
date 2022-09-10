<?php include('../../conn.php');
$id = $_POST['id_prim'];
$sql = "SELECT * FROM data_sapi WHERE id=$id";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>