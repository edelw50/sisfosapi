<?php 

include('../conn.php');

$output= array();
$sql = "SELECT * FROM data_sapi ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'nama',
	2 => 'id_sapi',
	3 => 'id_jenis',
	4 => 'id_pakan',
    5 => 'jenis_kelamin',
    6 => 'tgl_lahir',
    7 => 'bobot_sapi',
    8 => 'warna_sapi',
    9 => 'harga_sapi',
    10 => 'input_dt',
    11 => 'update_dt'
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nama like '%".$search_value."%'";
	$sql .= " OR jenis_kelamin like '%".$search_value."%'";
    $sql .= " OR warna_sapi like '%".$search_value."%'";
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
	$sub_array[] = $row['id'];
	$sub_array[] = $row['nama'];
	$sub_array[] = $row['id_sapi'];
	$sub_array[] = $row['id_jenis'];
	$sub_array[] = $row['id_pakan'];
    $sub_array[] = $row['jenis_kelamin'];
    $sub_array[] = $row['tgl_lahir'];
    $sub_array[] = $row['bobot_sapi'];
    $sub_array[] = $row['warna_sapi'];
    $sub_array[] = $row['harga_sapi'];
    $sub_array[] = $row['input_dt'];
    $sub_array[] = $row['update_dt'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a> <a href="page.php?view&id='.$row['id_sapi'].'" data-id="'.$row['id'].'" class="btn btn-success btn-sm viewbtn">View</a> <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" onclick="javascript:window.location.reload()" >Delete</a>';
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
