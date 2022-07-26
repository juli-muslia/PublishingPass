<?php
function deletedata()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "publishingpass";
    if (isset($_POST['deletedata'])) 
{
        $id = $_POST['delete_id'];

        $query = $wpdb->query("DELETE FROM $table_name WHERE pass_id='$id'");


        if ($query) {
            echo '<div class="alert alert-success text-center" role="alert">
        <h3>Data Deleted successfully !</h3>
              </div>
              <meta http-equiv="refresh" content="1">';

        }
        else {
            echo '<div class="alert alert-danger text-center" role="alert">
        <h3>Data was not successfully deleted !</h3>
              </div>
              <meta http-equiv="refresh" content="5">';
        }    }
}
?>