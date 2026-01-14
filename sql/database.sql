$search = "";
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
