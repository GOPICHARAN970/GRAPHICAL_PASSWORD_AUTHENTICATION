<?php
include 'Config.php';

if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];
    $stmt = $conn->prepare("DELETE FROM `login` WHERE id=?");
    $stmt->bind_param("i", $deleteid);
    $stmt->execute();
    $stmt->close();
}

header("Location: database.php"); // Redirect to the main page after deleting
exit();
?>
