<?php 
require 'functions.php';
include('template/header.php');
echo '<title>Halaman Admin</title>';
include('template/navbar.php');
echo '<h3>Daftar User</h3>';
echo '<hr>';
echo '</div>';
echo '</div>';


// //sign-up
// if(isset($_POST["signup"])){

//     if(signup($_POST)>0){
//         echo "
//             <script> 
//                 alert('user baru berhasil ditambahkan!');
//             </script>
//         ";
//     }else{
//         echo mysqli_error($conn);
//     }
// }
?>

                <div class="row vh-100 bg-light rounded">
                    <div class="col">
                        <br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa-solid fa-circle-plus me-2"></i>Tambah Data User</button>
                        <br><br>
                        <?php include ('template/modal-user.php'); ?>
                        <table id="tableuser" class="display">
                            <thead>
                                <tr class="">
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Password</th>
                                    <th>Input Date</th>
                                    <th>Update Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>Id</td>
                                    <td>Username</td>
                                    <td>Level</td>
                                    <td>Password</td>
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
            <?php include('template/footer.php');?>
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
      $('#tableuser').DataTable({
        columnDefs: [
            {
                target: 0,
                visible: false,
                searchable: false,
            },
            {
                target: 3,
                visible: false,
                searchable: false,
            }
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id_user', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'admin/user/fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [6]
          },

        ]
      });
    });

    function submitForm(){
      $.ajax({
          url: "admin/user/add_data.php",
          type: "post",
          data: $('form#addUserForm').serialize(),
          success: function(data) {
            let json = JSON.parse(data);
            let status = json.status;
            if (status == 'true') {
              mytable = $('#tableuser').DataTable();
              mytable.draw();
              $('#addUserForm input').val('');
              $('#addUserForm select').val('');
              $('#addUser').modal('hide');
            } else {
              alert('failed');
            }
          }
      });
    }

    $(document).ready(function(){
      $('#addUserForm').on('submit', function(){
        submitForm();
        return false;
      });
    })


    function updateForm(){
      $.ajax({
          url: "admin/user/update_data.php",
          type: "post",
          data: $('form#updateUserForm').serialize(),
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            let u = $('#tableuser tbody tr[id_user]').text();
              table = $('#tableuser').DataTable();
              var row = table.row("[id='" + trid + "']");
              // $('#updateUser').on('hidden.bs.modal', function () {
                // location.reload();
            // })
            console.log("terkirim");
          },
          error: function (jqXHR, textStatus, errorThrown) { errorFunction(); }
      });
    }

    
    $(document).ready(function(){
      $('#updateUserForm').on('submit', function(){
        if(document.getElementById("updateUserForm")){
          console.log($('form#updateUserForm').serialize());
          alert('a');
        }else{
          console.log('elemen kosong');
          alert('b');
        }
        updateForm();
        return false;
      });
    })


    $('#tableuser').on('click', '.editbtn ', function(event) {
      var table = $('#tableuser').DataTable();
      var trid = $(this).closest('tr').attr('id');
      var id = $(this).data('id');

        $.ajax({
        url: "admin/user/get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          $('#updateUser').modal('show');
          if(document.getElementById("updateUser")){
            let json = JSON.parse(data);
            $('#id').val(id);
            $('#usernameEdit').val(json.username);
            $('#levelEdit').val(json.level);
            $('#passwordEdit1').val(json.password);
            $('#passwordEdit2').val(json.password);
            $('#trid').val(trid);
          } else {
              alert('Something wrong, reload and try again');
          }
        }
      });
    });

    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#tableuser').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "admin/user/delete_data.php",
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