<?php

header('Content-Type: application/json');
include("connect.php");

$sql = "SELECT * FROM tbsepeda";
$json["status"] = array();
$json["message"] = array();
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if ($result) {
  $json["status"] = "success";
  $json["message"] = "success";
  if ($count > 0) {
    $json["payload"]["data"] = [];
    while ($row = mysqli_fetch_array($result)) {
      $array["ID"] = $row['id'];
      $array["KODE"] = $row['kode'];
      $array["MERK"] = $row['merk'];
      $array["WARNA"] = $row['warna'];
      $array["HARGASEWA"] = $row['hargasewa'];
      $array["IMAGE"] = $row['image'];
      array_push($json["payload"]["data"], $array);
    }
  } else {
    $json["payload"]["data"] = "null";
  }
} else {
  $json["status"] = "failed";
  $json["message"] = mysqli_error($con);
}
echo json_encode($json);
mysqli_close($con);


?>