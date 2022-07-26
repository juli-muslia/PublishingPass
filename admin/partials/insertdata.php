<?php

function insertdata()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "publishingpass";

    if (isset($_POST['insertdata'])) 
{
        $new_website = $_POST['website'];
        $new_email = $_POST['email'];
        $new_password = $_POST['password'];
        $new_notes = $_POST['notes'];


        $results = $wpdb->query("INSERT INTO $table_name(weburl, user_email,user_pass,notes) VALUES('$new_website','$new_email','$new_password','$new_notes')");



        if ($results) {
            echo '<div class="alert alert-success text-center" role="alert">
        <h3>Data Saved successfully !</h3>
              </div>
              <meta http-equiv="refresh" content="1">';
        }
        else {
            echo '<div class="alert alert-danger text-center" role="alert">
        <h3>Data was not successfully saved !</h3>
              </div>
              <meta http-equiv="refresh" content="5">';
        }
    }
}
?>