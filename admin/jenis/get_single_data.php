<?php include('../conn.php');
$id = $_POST['id'];
$sql = "SELECT * FROM jenis WHERE id_jenis='$id' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
