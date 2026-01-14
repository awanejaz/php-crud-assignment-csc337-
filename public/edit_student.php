<?php
include "config/db.php";
include "includes/header.php";

// 1. Getting the student data by ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p style='color:red;'>Student not found!</p>";
        include "includes/footer.php";
        exit;
    }
}

// 2. Update the student record
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $roll = $_POST['roll_number'];
    $program = $_POST['program'];
    $contact = $_POST['contact'];
    $status = $_POST['status'];

    $updateSql = "UPDATE students 
                  SET name='$name', email='$email', roll_number='$roll', program='$program', contact='$contact', status='$status'
                  WHERE id='$id'";

    if ($conn->query($updateSql)) {
        echo "<script>alert('Student Updated Successfully'); window.location='student.php';</script>";
    } else {
        echo "<p style='color:red;'>Error: ".$conn->error."</p>";
    }
}
?>

<h2>Edit Student</h2>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    <label>Roll Number:</label><br>
    <input type="text" name="roll_number" value="<?php echo $row['roll_number']; ?>" required><br><br>

    <label>Program:</label><br>
    <input type="text" name="program" value="<?php echo $row['program']; ?>" required><br><br>

    <label>Contact:</label><br>
    <input type="text" name="contact" value="<?php echo $row['contact']; ?>"><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="Active" <?php echo ($row['status']=="Active") ? "selected" : ""; ?>>Active</option>
        <option value="Inactive" <?php echo ($row['status']=="Inactive") ? "selected" : ""; ?>>Inactive</option>
    </select><br><br>

    <button type="submit" name="update">Update Student</button>
</form>

<?php include "includes/footer.php"; ?>
