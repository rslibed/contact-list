<?php
    require 'database.php';
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $sql = "SELECT * 
                FROM contacts 
                WHERE id = " . $_GET["id"];
        $results = mysqli_query($conn, $sql);
        if ($results === false) {
            echo mysqli_error($conn);
        } else {
            $contact = mysqli_fetch_assoc($results);
        }
    } else {
        $contact = null;
    }
    // if (sizeof($_POST) > 0) {
    //     $sql="UPDATE contacts SET
    //     first_name='".$_POST['first_name']."',
    //     last_name='".$_POST['last_name']."',
    //     phone='".$_POST['phone']."',
    //     email='".$_POST['email']."'
    //     WHERE id='".$_POST['id']."'";
    //     mysqli_query($conn, $sql);
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Edit Contact</title>
</head>
<body>
    <div class="container">
        <h1>Edit Contact</h1>
        <form method="post" action="../index.php" class="col-sm-12 col-lg-3">
            <div class="form-group">
                <input name="first_name" type="text" class="form-control firstName" placeholder="First Name" value="<?= $contact["first_name"] ?>">
            </div>
            <div class="form-group">
                <input name="last_name" type="text" class="form-control lastName" placeholder="Last Name" value="<?= $contact["last_name"] ?>">
            </div>
            <div class="form-group">
                <input name="email" type="email" class="form-control email" placeholder="Email" value="<?= $contact["email"] ?>">
            </div>
            <div class="form-group">
                <input name="phone" type="text" class="form-control phone" placeholder="Phone Number" value="<?= $contact["phone"] ?>">
            </div>
                <input name="id" type="hidden" class="form-control" value="<?= $contact["id"] ?>">
            <button class="btn btn-primary edit" type="submit">Edit Contact</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>