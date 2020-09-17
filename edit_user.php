<?php
include("connect.php");
include_once("auth_admin.php");

$json["status"] = array();
$json["message"] = array();

if (isset($_POST['id_auth'])) {
    $id_auth = $_POST['id_auth'];

    $auth = new Authorization($con, $id_auth);
    $admin = $auth->check_user();
    if ($admin) {
        if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['noktp']) && isset($_POST['nohp']) && isset($_POST['address'])) {
            $id = $_POST['id'];
            $nama = $_POST['name'];
            $nohp = $_POST['nohp'];
            $noktp = $_POST['noktp'];
            $alamat = $_POST['address'];
            $json["status"] = array();
            $json["message"] = array();

            $sql = "UPDATE tbuser SET nama = '$nama', noktp = '$noktp', nohp = '$nohp', alamat = '$alamat' WHERE id = '$id'";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $json["status"] = "success";
                $json["message"] = "success";
            } else {
                $json["status"] = "failed";
                $json["message"] = mysqli_error($con);
            }
        } else {
            $json["status"] = "failed";
            $json["message"] = "Input not Found";
        }
    } else {
        $json["status"] = "failed";
        $json["message"] = "Not Authorized";
    }
} else {
    $json["status"] = "failed";
    $json["message"] = "Input not Found";
}

echo json_encode($json);
mysqli_close($con);
