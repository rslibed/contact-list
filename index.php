<?php
    require 'includes/database.php';
    if (sizeof($_POST) > 0) {
        $sql="UPDATE contacts SET
        first_name='".$_POST['first_name']."',
        last_name='".$_POST['last_name']."',
        phone='".$_POST['phone']."',
        email='".$_POST['email']."'
        WHERE id='".$_POST['id']."'";
        mysqli_query($conn, $sql);
    }
    require 'includes/get_data.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Contact List</title>
</head>

<body>
    <div class="container">
        <h1>Contact List</h1>
        <div class="row">
            <table class="table col-sm-12 col-lg-9">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Edit Contact</th>
                        <th scope="col">Delete Contact</th>
                    </tr>
                </thead>
                <tbody class="contactList">
                <?php if(empty($contact_list)): ?>
                    <p>Sorry, no contacts are available.</p>
                <?php else: ?>
                    <?php foreach($list as $list_item): ?>
                        <tr>
                            <td><?= $list_item["first_name"] ?></td>
                            <td><?= $list_item["last_name"] ?></td>
                            <td><?= $list_item["email"] ?></td>
                            <td><?= $list_item["phone"] ?></td>
                            <td><a href="includes/edit.php?id=<?= $list_item['id'] ?>">Edit</a></td>
                            <td><button contactId=<?= $list_item["id"] ?> type="button" class="btn btn-danger delete">Delete</button></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <form method="post" class="col-sm-12 col-lg-3">
                <div class="form-group">
                    <input name="first_name" type="text" class="form-control firstName" placeholder="First Name">
                </div>
                <div class="form-group">
                    <input name="last_name" type="text" class="form-control lastName" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input name="phone" type="text" class="form-control phone" placeholder="Phone Number">
                </div>
                <button class="btn btn-success add" type="submit">Add Contact</button>
            </form>
            <div class="container">
                <p class="error"></p>
            </div>
        </div>
    </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>