<?php
$conn   = mysqli_connect("localhost", "root", "root", "angular_demo_user");
$output = array();
//$query  = "SELECT * FROM users";
$query = "SELECT user.name, province.pro_name, user.telephone, user.postal_code, user.salary from users user,
provinces province where province.id = user.province_id";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?> 