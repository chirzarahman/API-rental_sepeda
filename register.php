<?php

include('connect.php');
if (isset($_POST['noktp']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nama']) && isset($_POST['nohp']) && isset($_POST['alamat']) && isset($_POST['roleuser'])) {
    $Noktp = $_POST['noktp'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Nama = $_POST['nama'];
    $Nohp = $_POST['nohp'];
    $Alamat = $_POST['alamat'];
    $Roleuser = $_POST['roleuser'];

    $json["Status"] = array();
    $json["Message"] = array();

    $query = "SELECT * FROM tbuser WHERE email = '$Email'";
    $check = mysqli_num_rows(mysqli_query($con, $query));
    if ($check == 0) {
        $Password = password_hash($Password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO tbuser (noktp, email, password, nama, nohp, alamat, roleuser) values ('$Noktp', '$Email', '$Password', '$Nama', '$Nohp', '$Alamat', 2)";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $json["Status"] = ["success"];
            $json["Message"] = ["Registered Successfully"];
        } else {
            $json["Status"] = ["failed"];
            $json["Message"] = ["Try Again"];
        }
    }else {
        $json["Status"] = ["failed"];
        $json["Message"] = ["Email is already registered"];
    }
} else {
    $json["Status"] = ["failed"];
    $json["Message"] = ["Input not Found"];
}
echo json_encode($json);
mysqli_close($con);

?>