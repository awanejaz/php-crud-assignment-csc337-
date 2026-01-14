<?php
include "config/db.php";
include "includes/header.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $roll = $_POST['roll_number'];
    $program = $_POST['program'];
    $contact = $_POST['contact'];
    $status = $_POST['status'];

    $sql = "INSERT INTO students (name, email, roll_number, program, contact, status)
            VALUES ('$name', '$email', '$roll', '$program', '$contact', '$status')";

    if ($conn->query($sql)) {
        echo "<script>alert('Student Added Successfully'); window.location='student.php';</script>";
    } else {
        echo "<p style='color:red;'>Error: ".$conn->error."</p>";
    }
}
?>

<h2>Add New Student</h2>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Roll Number:</label><br>
    <input type="text" name="roll_number" required><br><br>

    <label>Program:</label><br>
    <input type="text" name="program" required><br><br>

    <label>Contact:</label><br>
    <input type="text" name="contact"><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select><br><br>

    <button type="submit" name="submit">Add Student</button>
</form>

<?php include "includes/footer.php"; ?>
