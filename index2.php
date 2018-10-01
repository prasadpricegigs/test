<?php
$conn = mysqli_connect("localhost", "root", "", "employee");
$info = json_decode(file_get_contents("php://input"));

print_r($info);
//if( count($info) > 0)  {

    $name     = mysqli_real_escape_string($conn, $info->name);
    $email    = mysqli_real_escape_string($conn, $info->email);
    $age      = mysqli_real_escape_string($conn, $info->age);
    $btn_name = $info->btnName;
    
    if ($btn_name == "Insert") {
        $query = "INSERT INTO employeeinfo(name, email, salary) VALUES ('$name', '$email', '$age')";
        if (mysqli_query($conn, $query)) {
            echo "Data Inserted Successfully...";
        } else {
            echo 'Failed';
        }
    }
    if ($btn_name == 'Update') {
        $id    = $info->id;
        $query = "UPDATE employeeinfo SET name = '$name', email = '$email', salary = '$age' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
           echo 'Data Updated Successfully...';
        } 
        else {
            echo 'Failed';
        }
    }
//}
?>