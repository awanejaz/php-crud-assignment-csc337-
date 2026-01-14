<?php 
include "config/db.php"; 
include "includes/header.php"; 
?>

<h2>Student List</h2>


<form method="GET" style="margin-bottom: 20px;">
    <input type="text" name="search" placeholder="Search..." 
           value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>" 
           style="padding: 8px; width: 280px;">
    <button type="submit">Search</button>
    <a href="student.php" class="btn" style="margin-left: 10px;">Reset</a>
</form>

<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM students 
            WHERE name LIKE '%$search%' 
            OR email LIKE '%$search%' 
            OR roll_number LIKE '%$search%'
            OR program LIKE '%$search%'
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM students ORDER BY id DESC";
}

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roll No</th>
                <th>Program</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['roll_number']."</td>
                <td>".$row['program']."</td>
                <td>".$row['status']."</td>
                <td>
                    <a href='edit_student.php?id=".$row['id']."'>Edit</a> |
                    <a href='delete_student.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                </td>
             </tr>";
    }
    
    echo "</table>";
} else {
    echo "<p>No students found.</p>";
}
?>

<?php include "includes/footer.php"; ?>
