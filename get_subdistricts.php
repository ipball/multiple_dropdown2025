<?php
include 'connect.php';

$district_id = $_POST['district_id'];
$sql = "SELECT * FROM subdistricts WHERE district_id = $district_id order by name";
$result = mysqli_query($conn, $sql);

$response = ['status' => 'success', 'data' => []];
while ($row = mysqli_fetch_assoc($result)) {
    $response['data'][] = $row;
}

echo json_encode($response);

mysqli_close($conn);
?>