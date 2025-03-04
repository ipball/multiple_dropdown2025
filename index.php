<?php
include 'connect.php';

$sql = "SELECT * FROM provinces order by name";
$result = mysqli_query($conn, $sql);

$provinces = [];
while ($row = mysqli_fetch_assoc($result)) {
    $provinces[] = $row;
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Dropdown</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Multiple Dropdown</h1>
    <form>
        <div class="mb-3">
            <label for="province" class="form-label">จังหวัด</label>
            <select class="form-select" id="province">
                <option value="">เลือกจังหวัด</option>
                <?php
                foreach ($provinces as $province) {
                    echo '<option value="' . $province['id'] . '">' . $province['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="district" class="form-label">อำเภอ</label>
            <select class="form-select" id="district" disabled>
                <option value="">เลือกอำเภอ</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="subdistrict" class="form-label">ตำบล</label>
            <select class="form-select" id="subdistrict" disabled>
                <option value="">เลือกตำบล</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="postcode" class="form-label">รหัสไปรษณีย์</label>
            <input type="text" class="form-control" id="postcode" readonly>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="script.js"></script>
</body>
</html>