<?php
include '../connection.php';

$images = $_POST['images'];
$base64codes = $_POST['base64codes'];
$id_user = $_POST['id_user'];
$id_topic = $_POST['id_topic'];
$status = $_POST['status'];

$sql = "INSERT INTO `beasiswa_registered`(`id_topic`, `id_user`, `images`, `status`) VALUES ('$id_topic','$id_user','$images','$status')";
$result = $connect->query($sql);

if ($result) {
    $list_image = json_decode($images);
    $list_base64code = json_decode($base64codes);
    for ($i = 0; $i < count($list_image); $i++) {
        file_put_contents("../image/topic/".$list_image[$i], base64_decode($list_base64code[$i]));
    }
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
