<?php
include "config/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id='$id'";

    if ($conn->query($sql)) {
        echo "<script>alert('Student Deleted Successfully'); window.location='student.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
