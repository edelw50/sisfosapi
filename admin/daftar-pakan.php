<?php 
require 'functions.php';
include('template/header.php');
echo '<title>Halaman Admin</title>';
include('template/navbar.php');
echo '<h3>Daftar Pakan Sapi</h3>';
echo '<hr>';
echo '</div>';
echo '</div>';
?>
         
              <div class="row vh-100 bg-light rounded">
                  <div class="col">
                        <br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPakan"><i class="fa-solid fa-circle-plus me-2"></i>Tambah Pakan Sapi</button>
                        <br><br>
                        <!-- modal pakan -->
                        <?php include ('template/modal-pakan.php'); ?>
                        <table id="tablepakan" class="display">
                            <thead>
                                <tr class="">
                                    <th>Id</th>
                                    <th>Pakan</th>
                                    <th>Input Date</th>
                                    <th>Update Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>Id</td>
                                    <td>Pakan</td>
                                    <td>Input Date</td>
                                    <td>Update Date</td>
                                    <td>Actions</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

            <!-- footer -->
            <?php include ('template/footer.php'); ?>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script> -->

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
      $('#tablepakan').DataTable({
        // "columnDefs": [
        // { "width": "60%", "targets": 2 },
        // { "width": "13%", "targets": 5 }
        // ],
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id_pakan', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'admin/pakan/fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [4]
          },

        ]
      });
    });

    function submitForm(){
      $.ajax({
          url: "admin/pakan/add_data.php",
          type: "post",
          data: $('form#addPakanForm').serialize(),
          success: function(data) {
            let json = JSON.parse(data);
            let status = json.status;
            if (status == 'true') {
              mytable = $('#tablepakan').DataTable();
              mytable.draw();
              $('#addPakanForm input').val('');
              $('#addPakan').modal('hide');
            } else {
              alert('failed');
            }
          }
      });
    }

    $(document).ready(function(){
      $('#addPakanForm').on('submit', function(){
        submitForm();
        return false;
      });
    })


    function updateForm(){
      $.ajax({
          url: "admin/pakan/update_data.php",
          type: "post",
          data: $('form#updatePakanForm').serialize(),
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            let u = $('#tablepakan tbody tr[id_pakan]').text();
            console.log("hasil "+u);
              table = $('#tablepakan').DataTable();
              var row = table.row("[id='" + trid + "']");
              $('#updatePakan').on('hidden.bs.modal', function () {
                location.reload();
            })
          }
      });
    }

    
    $(document).ready(function(){
      $('#updatePakanForm').on('submit', function(){
        updateForm();
        return false;
      });
    })


    $('#tablepakan').on('click', '.editbtn ', function(event) {
      var table = $('#tablepakan').DataTable();
      var trid = $(this).closest('tr').attr('id');
      var id = $(this).data('id');
      $('#updatePakan').modal('show');
      $.ajax({
        url: "admin/pakan/get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#id').val(id);
          $('#pakan').val(json.pakan);
          $('#trid').val(trid);
        }
      });
    });
    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#tablepakan').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this Jenis Sapi ? ")) {
        $.ajax({
          url: "admin/pakan/delete_data.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }
    });
    </script>
</body>

</html>