<?php
include 'connect.php';

$province_id = $_POST['province_id'];
$sql = "SELECT * FROM districts WHERE province_id = $province_id order by name";
$result = mysqli_query($conn, $sql);

$response = ['status' => 'success', 'data' => []];
while ($row = mysqli_fetch_assoc($result)) {
    $response['data'][] = $row;
}

echo json_encode($response);

mysqli_close($conn);
?>