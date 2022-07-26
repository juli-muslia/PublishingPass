<?php

function updatedata()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "publishingpass";

    if (isset($_POST['updatedata'])) {
        $update_pass_id = $_POST['update_id'];

        $update_weburl = $_POST['website'];
        $update_user_email = $_POST['email'];
        $update_user_pass = $_POST['password'];
        $update_notes = $_POST['notes'];

        $query = $wpdb->query("UPDATE $table_name SET weburl='$update_weburl', user_email='$update_user_email', user_pass='$update_user_pass', notes=' $update_notes' WHERE pass_id='$update_pass_id'  ");


        if ($query) {
            echo '<div class="alert alert-success text-center" role="alert">
            <h3>Data Updated successfully !</h3>
                  </div>
                  <meta http-equiv="refresh" content="1">';
        }
        else {
            echo '<div class="alert alert-danger text-center" role="alert">
            <h3>Data Not Updated successfully !</h3>
                  </div>
                  <meta http-equiv="refresh" content="5">';
        }
    }
}
?>