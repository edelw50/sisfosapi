<?php
date_default_timezone_set('Asia/Jakarta');
// $con  = mysqli_connect('localhost','siss1274_admin','javanica123','siss1274_test');
$con = mysqli_connect('localhost','root','','test');

if(mysqli_connect_errno())
{
    echo 'Database Connection Error';
}
