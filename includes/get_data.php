<?php
    $sql = "SELECT * FROM contacts";
    $contact_list = mysqli_query($conn, $sql);
    if ($contact_list === false) {
        echo mysqli_error($conn);
    } else {
        $list = mysqli_fetch_all($contact_list, MYSQLI_ASSOC);
    }