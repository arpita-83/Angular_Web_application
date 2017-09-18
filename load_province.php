<?php
$conn = mysqli_connect("localhost", "root", "root", "angular_demo_user");
$output = array();
$query = "SELECT * FROM provinces ORDER BY pro_name ASC";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result)){

    $output[] =  $row;
} 
echo json_encode($output);
?>