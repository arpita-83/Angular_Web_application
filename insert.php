<?php
$conn = mysqli_connect("localhost", "root", "root", "angular_demo_user");
$info = json_decode(file_get_contents("php://input"));
if (count($info) > 0) {
    $name     = mysqli_real_escape_string($conn, $info->name);
    $province = mysqli_real_escape_string($conn, $info->province);
    $telephone    = mysqli_real_escape_string($conn, $info->telephone);
    $postal_code      = mysqli_real_escape_string($conn, $info->postal_code);
    $salary      = mysqli_real_escape_string($conn, $info->salary);
    
    $btn_name = $info->btnName;
    if ($btn_name == "Insert") {
        $query = "INSERT INTO users(name, province_id, telephone, postal_code, salary) 
        VALUES ('$name', $province,'$telephone', '$postal_code', '$salary')";

        if (mysqli_query($conn, $query)) {
            echo "Data Inserted Successfully...";
        } else {
            echo 'Failed';
        }
    }
    if ($btn_name == 'Update') {
        $id    = $info->id;
        $query = "UPDATE users SET name = '$name', telephone = '$telephone', postal_code = '$postal_code',  salary = '$salary' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            echo 'Data Updated Successfully...';
        } else {
            echo 'Failed';
        }
    }
}
?>