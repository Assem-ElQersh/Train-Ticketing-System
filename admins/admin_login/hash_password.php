<?php
$email = "admin@example.com";  
$password = "Section5 is the best";  

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

echo "INSERT INTO admins (email, password) VALUES ('$email', '$hashed_password');";
?>
