<?php
header('Content-Type: application/json');
include("connect.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $json["status"] = array();
    $json["message"] = array();
    $sql = "SELECT * FROM tbsepeda WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if ($result) {
        $json["status"] = "success";
        $json["message"] = "success";
        if ($count > 0) {
            $row = mysqli_fetch_array($result);
            $json['payload']["ID"] = $row['id'];
            $json['payload']["KODE"] = $row['kode'];
            $json['payload']["MERK"] = $row['merk'];
            $json['payload']["WARNA"] = $row['warna'];
            $json['payload']["HARGASEWA"] = $row['hargasewa'];
            $json['payload']["IMAGE"] = $row['image'];
        } else {
            $json["payload"]["data"] = "null";
        }
    } else {
        $json["status"] = "failed";
        $json["message"] = mysqli_error($con);
    }
} else {
    $json["status"] = "failed";
    $json["message"] = "Input not Found";
}
echo json_encode($json);
mysqli_close($con);
