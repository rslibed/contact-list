<?php
require 'database.php';
$sql = "INSERT INTO contacts(first_name, last_name, email, phone)
            VALUES ('"  . $_POST['first_name'] . "','"
                        . $_POST['last_name'] . "','"
                        . $_POST['email'] . "','"
                        . $_POST['phone'] . "')";
mysqli_query($conn, $sql);
$id = mysqli_insert_id($conn);
echo json_encode($_POST, $id);