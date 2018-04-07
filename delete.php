<?php
require 'database.php';
$sql = "DELETE FROM contacts where id = " . $_POST["contactId"];
mysqli_query($conn, $sql);
echo json_encode($_POST);