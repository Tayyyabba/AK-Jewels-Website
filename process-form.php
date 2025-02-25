<?php


if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])) {
    

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

   
    $db = mysqli_connect("localhost", "root", "", "facultywebsite", 3307);

 
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

   
    $sql = "INSERT INTO jewelleries (name, email, phone_no, message) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $email, $phone, $message);

   
    if ($stmt->execute()) {
        header("location:thank-you.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
} else {
    echo "All fields are required!";
}
?>
