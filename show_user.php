<?php
header('Content-Type: application/json');
include("connect.php");

$sql = "SELECT * FROM tbuser";
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
      $array["NOKTP"] = $row['noktp'];
      $array["NAMA"] = $row['nama'];
      $array["EMAIL"] = $row['email'];
      $array["NOHP"] = $row['nohp'];
      $array["ALAMAT"] = $row['alamat'];
      if ($row["roleuser"] == 1) {
        $array["ROLE"] = "admin";
      } elseif ($row["roleuser"] == 2) {
        $array["ROLE"] = "customer";
      }
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
