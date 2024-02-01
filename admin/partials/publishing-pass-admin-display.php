<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://julianmuslia.com
 * @since      1.0.0
 *
 * @package    Publishing_Pass
 * @subpackage Publishing_Pass/admin/partials
 */


// This is the script to get database connection with datatable. 


function crudPublishingPass()
{
    require_once 'insertdata.php';
    insertdata();
    require_once 'updatedata.php';
    updatedata();
    require_once 'deletedata.php';
    deletedata();


?>
<style type="text/css">
  .btnAdd {
    float:right;
  }
  </style>
  <!-- Pop up Modal ADD -->
  <div class="modal fade" id="passwordaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Password</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <form action="" method="POST">

                  <div class="modal-body">
                      <div class="form-group">
                          <label> Website </label>
                          <input type="text" name="website" class="form-control" placeholder="Enter Website">
                      </div>

                      <div class="form-group">
                          <label> Email / Username </label>
                          <input type="text" name="email" class="form-control" placeholder="Enter Email / Username">
                      </div>

                      <div class="form-group">
                          <label> Password </label>
                          <input type="text" name="password" class="form-control" placeholder="Enter Password">
                      </div>

                      <div class="form-group">
                          <label> Notes</label>
                          <textarea type="text" name="notes" class="form-control" placeholder="Enter Notes" rows="4" cols="50"></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                  </div>
              </form>

          </div>
      </div>
  </div>

  <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
  <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Edit Password Data </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <form action="" method="POST">

                  <div class="modal-body">

                      <input type="hidden" name="update_id" id="update_id">

                      <div class="form-group">
                          <label> Edit Website</label>
                          <input type="text" name="website" id="website" class="form-control"
                              placeholder="Edit website">
                      </div>

                      <div class="form-group">
                          <label> Edit Username / Email </label>
                          <input type="text" name="email" id="email" class="form-control"
                              placeholder="Edit Username / Email">
                      </div>

                      <div class="form-group">
                          <label> Edit Password </label>
                          <input type="text" name="password" id="password" class="form-control"
                              placeholder="Edit Password">
                      </div>

                      <div class="form-group">
                          <label> Edit notes </label>
                          <textarea  type="text" name="notes" id="notes" class="form-control"
                              placeholder="Edit Notes" rows="4" cols="50"></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                  </div>
              </form>

          </div>
      </div>
  </div>

  <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Delete Saved Password </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <form action="" method="POST">

                  <div class="modal-body">

                      <input type="hidden" name="delete_id" id="delete_id">

                      <h4 class="text-center"> Do you want to Delete this Password?</h4>
                      <h6 class="alert alert-danger"> Note: After deletion your data will be deleted forever ! </h6>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                      <button type="submit" name="deletedata" class="btn btn-primary"> Yes ! Delete it. </button>
                  </div>
              </form>

          </div>
      </div>
  </div>


  <div class="container-fluid">
      
  <br><br><br>
      <h2 class="text-center" style="font-family: 'Roboto', sans-serif;"><span style="color:#DE0A2B">Publishing Group</span> Password Manager</h2>
      <h5 class="text-center">Welcome <?php $current_user = wp_get_current_user();
    echo $current_user->display_name; ?></h5>
        
          
              
                  <button type="button" class="btn btn-primary btnAdd" data-toggle="modal" data-target="#passwordaddmodal">
                      ADD DATA
                  </button>

                  <button type="button" class="btn btn-warning " id="export-button">
                      EXPORT
                  </button>

                  <?php


    global $wpdb;
    $table_name = $wpdb->prefix . "publishingpass";
    $results = $wpdb->get_results("Select * from $table_name");
?>
                  <table id="datatableid" class="table table-bordered table-dark">
                      <thead>
                          <tr>
                              <th scope="col"> ID</th>
                              <th scope="col">Website</th>
                              <th scope="col">Username / Email</th>
                              <th scope="col"> Password </th>
                              <th scope="col"> Notes </th>
                              <th scope="col"> EDIT </th>
                              <th scope="col"> DELETE </th>
                          </tr>
                      </thead>

                      <tbody>

                      <?php
    if ($results) {
        foreach ($results as $row) {
?>          
                          <tr>
                              <td> <?php echo $row->pass_id; ?> </td>
                              <td> <?php echo $row->weburl; ?> </td>
                              <td> <?php echo $row->user_email; ?> </td>
                              <td> <?php echo $row->user_pass; ?> </td>
                              <td> <?php echo $row->notes; ?> </td>
                              <td>
                              <button type="button" class="btn btn-success editbtn"> EDIT </button>
                              </td>
                              <td>
                              <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                              </td>
                              
                          </tr>
                          <?php
        }
    }
    else {
        echo "No Record Found";
    }
?>   
                      </tbody>
                       </table>
       
  </div>



  <script>

      $(document).ready(function () {

          $('#datatableid').DataTable({
             "pagingType": "full_numbers",
              "lengthMenu": [
                  [10, 25, 50, -1],
                  [10, 25, 50, "All"]
              ],
              responsive: true,
              language: {
                  //search: "_INPUT_",
                  //searchPlaceholder: "Search Password",
              }
          });
    

      });
  </script>
    <!--  Script for the DELETE button -->
<script>
    $('#datatableid').on('click', '.deletebtn', function () {
        $('#deletemodal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#delete_id').val(data[0]);
    });
</script>

<!--  Script for the EDIT button -->
<script>
    
    $('#datatableid').on('click', '.editbtn', function () {
        $('#editmodal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#update_id').val(data[0]);
        $('#website').val(data[1]);
        $('#email').val(data[2]);
        $('#password').val(data[3]);
        $('#notes').val(data[4]);
    });
</script>

<!--  Script to export data into excel -->
<script>

function html_table_to_excel(type) {
    // Get the DataTable instance
    var dataTable = $('#datatableid').DataTable();

    // Get the data for the specified columns from all rows
    var selectedData = [];
    
    dataTable.rows().every(function () {
        var rowData = this.data();
        selectedData.push([
            rowData[0], // ID
            rowData[1], // Website
            rowData[2], // Username / Email
            rowData[3], // Password
            rowData[4]  // Notes
        ]);
    });

    // Create the worksheet and workbook
    var worksheet = XLSX.utils.aoa_to_sheet([['ID', 'Website', 'Username / Email', 'Password', 'Notes'], ...selectedData]);
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet 1');

    // Write and download the Excel file
    XLSX.write(workbook, { bookType: type, bookSST: true, type: 'base64' });

    let filename = `PG_Export_${(new Date().toJSON().slice(0, 10))}.`;

    XLSX.writeFile(workbook, filename + type);
}

const export_button = document.getElementById('export-button');

export_button.addEventListener('click', () => {
    html_table_to_excel('xlsx');
});




</script>

</body>
</html>
<?php
}
