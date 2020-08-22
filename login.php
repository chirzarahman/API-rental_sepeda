<?php

include("connect.php");
$Email = $_POST['email'];
$Password = $_POST['password'];
$sql = "SELECT * FROM tbuser WHERE email = '$Email'";
$json["Status"] = array();
$json["Message"] = array();
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if ($count > 0) {
    if (password_verify($Password, $row["password"])) {
        $json["Status"] = "success";
        $json["Message"] = "Login Success";
    } else {
        $json["Status"] = "failed";
        $json["Message"] = "Wrong Password";
    }
} else {
    $json["Status"] = "failed";
    $json["Message"] = "Email not registered";
}
echo json_encode($json);
