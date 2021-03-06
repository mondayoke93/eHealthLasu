<?php
include("../security.php");
include("header.php");
include("../includes/dbconfig/dbconfig.php");

?>

<main>
  <div class="row mt-4">

    <div class="col s12">
      <div class="row">
        <div id="admin" class="col s12">
          <div class="card material-table">
            <div class="table-header">
              <span class="table-title">All Patients Records</span>
              <div class="actions">
                <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
              </div>
            </div>
            <table class="centered" id="datatable">
              <?php
              $sql = "SELECT * FROM lab_test GROUP BY identity,first_name,middle_name";
              $sql_run = mysqli_query($conn, $sql);

              ?>
              <thead>
                <tr>
                  <th>HOSPITAL NO.</th>
                  <th>FULL NAME</th>
                  <th>UNIQUE ID</th>
                  <th>REG. DATE</th>
                  <th>VIEW MORE</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($sql_run) > 0) {
                  while ($row = mysqli_fetch_assoc($sql_run)) {
                    $hospital_no = $row['hospital_no'];
                    ?>
                    <tr>
                      <td><?php echo $hospital_no ?></td>
                      <td><?php echo $row['last_name'] . " " . $row['first_name'] . " " . $row['middle_name']; ?></td>
                      <td><?php echo $row['identity']; ?></td>
                      <td><?php echo $row['test_reg_date']; ?></td>

                      <td>
                        <form action="view_a_student.php" method="POST" class="col s12">
                          <div class="row">
                            <input hidden name="btn_id" type="text" class="validate" value="<?php echo $row['pat_id']; ?>">
                            <button type="submit" name="btn_viewmore">
                              <i class="mdi mdi-eye"></i>
                            </button>
                          </div>
                        </form>

                      </td>
                      <td>
                        <a href="#">
                          <i class="mdi mdi-file-document-edit-outline"></i>
                        </a>
                      </td>
                      <td>
                        <button href="#">
                          <i class="mdi mdi-delete-alert"></i>
                        </button>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                  echo "No Record found!";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if (isset($_POST['btn_viewmore'])) {
    echo "Tested";
  }

  ?>
  <!-- Modal Structure -->
  <div id="viewmore" class="modal modal-fixed-footer">
    <div class="modal-content">
      <?php if (isset($_POST['btn_viewmore'])) {
        echo "Tested";
      }

      ?>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
  </div>
</main>


<script src="../assets/materialize/jquery.min.js"></script>
<script src="../assets/datatable/jquery.dataTables.min.js"></script>
<script src="../assets/materialize/js/materialize.min.js"></script>
<script src="../assets/datatable/buttons.html5.min.js"></script>
<script src="../assets/datatable/buttons.print.min.js"></script>
<script src="../assets/datatable/dataTables.buttons.min.js"></script>
<script src="../assets/datatable/jszip.min.js"></script>
<script src="../assets/materialize/js/materialize.js"></script>
<script src="../assets/materialize/js/script.js"></script>
<script src="../assets/datatable/script.js"></script>
<script>
  $(document).ready(function() {
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>
</body>

</html>