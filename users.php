<?php
include("connect.php");

$sql = "SELECT * FROM tbuser";
$json["Status"] = array();
$json["Message"] = array();
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if ($result) {
  $json["Status"] = "success";
  $json["Message"] = "success";
  if ($count > 0) {
    $json["Data"]["customers"] = [];
    while ($row = mysqli_fetch_array($result)) {
      $array["id"] = $row['id'];
      $array["No.KTP"] = $row['noktp'];
      $array["Email"] = $row['email'];
      $array["Nama"] = $row['nama'];
      $array["No.Hp"] = $row['nohp'];
      $array["Alamat"] = $row['alamat'];
      if ($row["roleuser"] == 1) {
        $array["Role User"] = "admin";
      } elseif ($row["roleuser"] == 2) {
        $array["Role User"] = "customer";
      }
      array_push($json["Data"]["customers"], $array);
    }
  } else {
    $json["Data"]["customers"] = "null";
  }
} else {
  $json["Status"] = "failed";
  $json["Message"] = mysqli_error($con);
}
echo json_encode($json);
mysqli_close($con);
