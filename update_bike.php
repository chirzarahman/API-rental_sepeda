<?php

include('connect.php');
include_once("auth_admin.php");
        
if (isset($_POST['id_auth'])) {
    $id_auth = $_POST['id_auth'];

    $auth = new Authorization($con, $id_auth);
    $admin = $auth->check_user();
    if ($admin) {
        $id = $_POST['id'];
        $Kode = $_POST['kode'];
        $Merk = $_POST['merk'];
        $Warna = $_POST['warna'];
        $Hargasewa = $_POST['hargasewa'];

        if(isset($_FILES['image'])) {
            $name = $_FILES['image']['name'];
            $path = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $format = $_FILES['image']['type'];
            $error = $_FILES['image']['error'];

            $json["status"] = array();
            $json["message"] = array();

            if ($error == 0) {
                if ($size <= 5000000) {
                    if (($format == 'image/png') || ($format == 'image/jpeg')) {
                        $sql = "SELECT image FROM tbsepeda WHERE id = '$id'";

                        $result = mysqli_query($con, $sql);

                        $count = mysqli_num_rows($result);
                        if ($count > 0) {
                            $row = mysqli_fetch_array($result);
                            unlink('upload/' . $row["image"]);
                
                            $fileName = time() . strstr($name, '.');
                            move_uploaded_file($path, 'upload/' . $fileName);

                            $sql = "UPDATE tbsepeda SET kode = '$Kode', merk = '$Merk', image = '$fileName', warna = '$Warna', hargasewa = '$Hargasewa' WHERE id = '$id'";
                            $result2 = mysqli_query($con, $sql);
                            if ($result2) {
                                $json["status"] = "success";
                                $json["message"] = "Update Bike Successfully";
                            } else {
                                $json["status"] = "failed";
                                $json["message"] = "Try Again";
                            } 
                        } else {
                            $json["status"] = "failed";
                            $json["message"] = "Not Found";
                        }
                    } else {
                        $json["status"] = "failed";
                        $json["message"] = "format image harus png atau jpeg";
                    }
                } else {
                    $json["status"] = "failed";
                    $json["message"] = "size image max 5MB";
                }
            }
        } else {
            $sql = "UPDATE bikes SET code = '$code', color = '$color', price = '$price', merk = '$merk' WHERE id = '$id'";
            $result3 = mysqli_query($con, $sql);
            if ($result3) {
                $json["status"] = "success";
                $json["message"] = "Update Bike Successfully";
            } else {
                $json["status"] = "success";
                $json["message"] = "Error";
            } 
        }
    }

        

echo json_encode($json);
mysqli_close($con);

// include("connect.php");
// include_once("auth_admin.php");

// $json["status"] = array();
// $json["message"] = array();

// if (isset($_POST['id_auth'])) {
//     $id_auth = $_POST['id_auth'];

//     $auth = new Authorization($con, $id_auth);
//     $admin = $auth->check_user();
//     if ($admin) {
//         if (isset($_POST['id']) && isset($_POST['kode']) && isset($_POST['merk']) && isset($_POST['warna']) && isset($_POST['hargasewa'])) {
//             $id = $_POST['id'];
//             $Kode = $_POST['kode'];
//             $Merk = $_POST['merk'];
//             $Warna = $_POST['warna'];
//             $Hargasewa = $_POST['hargasewa'];

//             $name = $_FILES['image']['name'];
//             $path = $_FILES['image']['tmp_name'];
//             $size = $_FILES['image']['size'];
//             $format = $_FILES['image']['type'];
//             $error = $_FILES['image']['error'];

//             $json["status"] = array();
//             $json["message"] = array();

//             if ($error == 0) {
//                 if ($size <= 5000000) {
//                     if (($format == 'image/png') || ($format == 'image/jpeg')) {
//                         $sql = "SELECT image FROM tbsepeda WHERE id = '$id'";

//                         $result = mysqli_query($con, $sql);

//                         $count = mysqli_num_rows($result);
//                         if ($count > 0) {
//                             $row = mysqli_fetch_array($result);
//                             unlink('upload/' . $row["image"]);
                
//                             $fileName = time() . strstr($name, '.');
//                             move_uploaded_file($path, 'upload/' . $fileName);

//                             $sql = "UPDATE tbsepeda SET kode = '$Kode', merk = '$Merk', image = '$fileName', warna = '$Warna', hargasewa = '$Hargasewa' WHERE id = '$id'";
//                             $result2 = mysqli_query($con, $sql);
//                             if ($result2) {
//                                 $json["status"] = "success";
//                                 $json["message"] = "Update Bike Successfully";
//                             } else {
//                                 $json["status"] = "failed";
//                                 $json["message"] = "Try Again";
//                             } 
//                         } else {
//                             $json["status"] = "failed";
//                             $json["message"] = "Not Found";
//                         }
//                     } else {
//                         $json["status"] = "failed";
//                         $json["message"] = "format image harus png atau jpeg";
//                     }
//                 } else {
//                     $json["status"] = "failed";
//                     $json["message"] = "size image max 5MB";
//                 }
//             }
//         }
//     } else {
//         $json["status"] = "failed";
//         $json["message"] = "Not Authorized";
//     }
// } else {
//     $json["status"] = "failed";
//     $json["message"] = "Input not Found";
// }

// echo json_encode($json);
// mysqli_close($con);
?>