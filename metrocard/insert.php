<?php

$servername = "localhost";
$username = "samiraha_metrocard";
$password = "19xReKd+7P5E";
$dbname = "samiraha_carddb";


$conn = new mysqli($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
$balance = isset($_GET['balance']) ? $_GET['balance'] : '';



$sql = "INSERT INTO user (id, balance) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id, $balance);

$response = array();

if ($stmt->execute()) {
    $response['status'] = 'success';
    $response['message'] = 'Data inserted successfully.';
    $response['id'] = $id;
    $response['balance'] = $balance;
} else {
    $response['status'] = 'error';
    $response['message'] = 'Error: ' . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>