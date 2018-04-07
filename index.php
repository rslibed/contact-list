<?php
    require 'database.php';
    $sql = "SELECT * FROM contacts";
    $contact_list = mysqli_query($conn, $sql);

    if ($contact_list === false) {
        echo mysqli_error($conn);
    } else {
        $list = mysqli_fetch_all($contact_list, MYSQLI_ASSOC);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // require 'database.php';
    $sql = "INSERT INTO contacts(first_name, last_name, email, phone)
            VALUES ('"  . $_POST['first_name'] . "','"
                        . $_POST['last_name'] . "','"
                        . $_POST['email'] . "','"
                        . $_POST['phone'] . "')";
    $results = mysqli_query($conn, $sql);
    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $id = mysqli_insert_id($conn);
        echo "inserted record with ID: " . $id;
    }
    }
    
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
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($contact_list)): ?>
                    <p>Sorry, no contacts are available.</p>
                <?php else: ?>
                    <?php foreach($list as $list_item): ?>
                        <tr>
                            <td><?= $list_item["first_name"] ?></h1>
                            <td><?= $list_item["last_name"] ?></p>
                            <td><?= $list_item["email"] ?></p>
                            <td><?= $list_item["phone"] ?></p>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <form method="post" class="col-sm-12 col-lg-3">
                <div class="form-group">
                    <input name="first_name" type="text" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group">
                    <input name="last_name" type="text" class="form-control" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input name="phone" type="text" class="form-control" placeholder="Phone Number">
                </div>
                <button class="btn btn-success" type="submit">Add Contact</button>
            </form>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>