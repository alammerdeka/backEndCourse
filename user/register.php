<?php
include '../connection.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$image = $_POST['image'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$jenkel = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];

$sql_check_username = "SELECT * FROM user WHERE username = '$username'";
$result_check_username = $connect->query($sql_check_username);
if ($result_check_username->num_rows>0) {
    echo json_encode(array(
        "success" => false,
        "message" => "username"
    ));
}else{
    $sql = "INSERT INTO `user`(`username`, `password`, `image`, `nim`, `nama`, `jenkel`, `alamat`, `hp`) VALUES ('$username','$password','$image','$nim','$nama','$jenkel','$alamat','$hp')";
    $result = $connect->query($sql);

    if ($result) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
}
