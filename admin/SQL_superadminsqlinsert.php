<?php
$conn = new mysqli("localhost", "root", "", "gsms");
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$hass = md5('admin@1234');
$sql = "INSERT INTO admin(aid,name, email, password, phone) VALUES ('1','Super admin', 'admin@gmail.com', '$hass', '9862170983');";
$result = $conn->query($sql);

if ($result) {
    echo "Admin added to the database successfully";
} else {
    echo "Failed to add admin to the database: " . $conn->error;
}

$conn->close();
?>