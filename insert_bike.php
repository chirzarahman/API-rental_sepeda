<?php

include('connect.php');
$json["status"] = array();
$json["message"] = array();
if (isset($_POST['kode']) && isset($_POST['merk']) && isset($_POST['warna']) && isset($_POST['hargasewa']) && isset($_FILES["image"])) {
    $Kode = $_POST['kode'];
    $Merk = $_POST['merk'];
    $Warna = $_POST['warna'];
    $Hargasewa = $_POST['hargasewa'];

    $name = $_FILES['image']['name'];
    $path = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $format = $_FILES['image']['type'];
    $error = $_FILES['image']['error'];

    

    // $query = "SELECT * FROM tbuser WHERE email = '$Email'";
    // $check = mysqli_num_rows(mysqli_query($con, $query));

    if ($error == 0) {
        if ($size <= 5000000) {
            if (($format == 'image/png') || ($format == 'image/jpeg')) {
                $fileName = time() . strstr($name, '.');
                move_uploaded_file($path, 'upload/' . $fileName);
                    $sql = "INSERT INTO tbsepeda (kode, merk, warna, hargasewa, image) values ('$Kode', '$Merk', '$Warna', '$Hargasewa', '$fileName')";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        $json["status"] = "success";
                        $json["message"] = "Insert Bike Successfully";
                    } else {
                        $json["status"] = "failed";
                        $json["message"] = "Try Again";
                    }
            } else {
                $json["status"] = "failed";
                $json["message"] = "format image harus png atau jpeg";
            }
        }else {
            $json["status"] = "failed";
            $json["message"] = "size image max 5MB";
        }
    }
} else {
    $json["status"] = "failed";
    $json["message"] = "kosong gblk";
}
echo json_encode($json);
mysqli_close($con);

?>