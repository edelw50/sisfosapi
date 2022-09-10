<?php include('../conn.php');
$id = $_POST['id'];
$sql = "SELECT * FROM pakan WHERE id_pakan='$id' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
