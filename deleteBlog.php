<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
    exit();
}

$blogId = $_GET['id'];

include_once('database.php');

$query = "DELETE FROM blogs WHERE id = ? AND userId = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $blogId, $_SESSION['user_id']);
$stmt->execute();

header('Location: dashboard.php');
exit();

?>