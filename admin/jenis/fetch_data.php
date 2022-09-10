<?php 

include('../../conn.php');

$output= array();
$sql = "SELECT * FROM jenis ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_jenis',
	1 => 'jenis',
	2 => 'keterangan',
	3 => 'input_dt',
	4 => 'update_dt',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE jenis like '%".$search_value."%'";
	$sql .= " OR keterangan like '%".$search_value."%'";
}

// if(isset($_POST['order']))
// {
// 	$column_name = $_POST['order'][0]['column'];
// 	$order = $_POST['order'][0]['dir'];
// 	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
// }
// else
// {
// 	$sql .= " ORDER BY id desc";
// }

// if($_POST['length'] != -1)
// {
// 	$start = $_POST['start'];
// 	$length = $_POST['length'];
// 	$sql .= " LIMIT  ".$start.", ".$length;
// }	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id_jenis'];
	$sub_array[] = $row['jenis'];
	$sub_array[] = $row['keterangan'];
	$sub_array[] = $row['input_dt'];
	$sub_array[] = $row['update_dt'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id_jenis'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['id_jenis'].'"  class="btn btn-danger btn-sm deleteBtn" onclick="javascript:window.location.reload()" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);

?>
