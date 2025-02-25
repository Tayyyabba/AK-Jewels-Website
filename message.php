<?php
 $conn = mysqli_connect("localhost", "root", "", "facultywebsite", 3307);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM jewelleries");
?>

<?php if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
?>

<div>
    <span><?php echo $row['name']?> | <?php echo $row['email']?> | <?php echo $row['phone_no']?> | <?php echo $row['message']?> | <?php echo $row['created_at']?></span>
</div>

<?php }
} ?>