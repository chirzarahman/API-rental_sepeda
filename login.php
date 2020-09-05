<?php

include("connect.php");
$Email = $_POST['email'];
$Password = $_POST['password'];
$sql = "SELECT * FROM tbuser WHERE email = '$Email'";
$json["status"] = array();
$json["message"] = array();
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if ($count > 0) {
    if (password_verify($Password, $row["password"])) {
        $json["status"] = "success";
        $json["message"] = "Login Success";
        $json["payload"]["LOGIN_ID"] = $row["id"];
        $json["payload"]["LOGIN_NAMA"] = $row["nama"];
        $json["payload"]["LOGIN_EMAIL"] = $row["email"];
        $json["payload"]["LOGIN_NOKTP"] = $row["noktp"];
        $json["payload"]["LOGIN_NOHP"] = $row["nohp"];
        $json["payload"]["LOGIN_ALAMAT"] = $row["alamat"];
    } else {
        $json["status"] = "failed";
        $json["message"] = "Wrong Password";
    }
} else {
    $json["status"] = "failed";
    $json["message"] = "Email not registered";
}
echo json_encode($json);
