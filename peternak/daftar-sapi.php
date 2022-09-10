<?php 
require 'functions.php';
include('template/header.php');
echo '<title>Halaman Peternak</title>';
include('template/navbar-peternak.php');
echo '<h3>Daftar Sapi</h3>';
echo '<hr>';
echo '</div>';
echo '</div>';

print_r($_POST);

if(isset($_POST["generate-qr"]) ){
    
    //cek data berhasil ditambahkan/tidak
    if( generateqr($_POST) > 0){
         ?> .
            <div class="alert alert-success mt-4" role="alert">
                Data berhasil ditambahkan!
            </div>
            .
<?php 
    } else {
         ?> .
         <div class="alert alert-danger" role="alert">
                Data gagal ditambahkan!
        </div> . <?php
    }
}

?>

              <div class="row vh-100 bg-light rounded">
                  <div class="col">
                        <br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSapi"><i class="fa-solid fa-qrcode me-2"></i>Tambah Data Sapi</button>
                        <br><br>
                        <!-- modal jenis -->
                        <?php include ('template/modal-sapi.php'); ?>
                        <table id="tablesapi" class="display">
                            <thead>
                                <tr class="">
                                    <th>Id</th>
                                    <th>Nama</th>
                                    <th>Id_sapi</th>
                                    <th>Id_jenis</th>
                                    <th>Id_pakan</th>
                                    <th>Gender</th>
                                    <th>Birthdate</th>
                                    <th>Bobot</th>
                                    <th>Warna</th>
                                    <th>Harga</th>
                                    <th>Input Date</th>
                                    <th>Update Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>Id</td>
                                    <td>Nama</td>
                                    <td>Id_sapi</td>
                                    <td>Id_jenis</td>
                                    <td>Id_pakan</td>
                                    <td>Gender</td>
                                    <th>Birthdate</th>
                                    <th>Bobot</th>
                                    <th>Warna</th>
                                    <th>Harga</th>
                                    <th>Input Date</th>
                                    <th>Update Date</th>
                                    <th>Actions</th>
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
    
    <!-- Select -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    

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
      $('#tablesapi').DataTable({
        // "columnDefs": [
        // { "width": "60%", "targets": 2 },
        // { "width": "13%", "targets": 5 }
        // ],
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'peternak/sapi/fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [12]
          },

        ]
      });
    });

    // function submitForm(){
    //   $.ajax({
    //       url: "peternak/sapi/add_data.php",
    //       type: "post",
    //       data: $('form#addSapiForm').serialize(),
    //       success: function(data) {
    //         let json = JSON.parse(data);
    //         let status = json.status;
    //         if (status == 'true') {
    //           mytable = $('#tablesapi').DataTable();
    //           mytable.draw();
    //           $('#addSapiForm input').val('');
    //           $('#opsi_jenis: selected').text();
    //           $('#opsi_pakan: selected').text();
    //           // $('#opsi_vaksin: selected').text();
    //           $('#opsi_gender: selected').text();
    //           $('#opsi_warna: selected').text();
    //           $('#addSapi').modal('hide');
    //         } else {
    //           alert('failed');
    //         }
    //       }
    //   });
    // }

    // $(document).ready(function(){
    //   $('#addSapiForm').on('submit', function(){
    //     submitForm();
    //     return false;
    //   });
    // })


    function updateForm(){
      $.ajax({
          url: "peternak/sapi/update_data.php",
          type: "post",
          data: $('form#editSapiForm').serialize(),
          success: function(data) {
            console.log("data update sapi" +data);
            // var json = JSON.parse(data);
            // var status = json.status;
            // let u = $('#table-jenis-sapi tbody tr[id_jenis]').text();
            // console.log("hasil "+u);
            //   table = $('#table-jenis-sapi').DataTable();
            //   var row = table.row("[id='" + trid + "']");
            //   $('#updateJenis').on('hidden.bs.modal', function () {
            //     location.reload();
            // })
          }
      });
    }

    
    $(document).ready(function(){
      $('#editSapiForm').on('submit', function(){
        // let x = $('form#editSapiForm').serialize();
        // console.log("isi x :"+x);
        updateForm();
        return false;
      });
    })


    $('#tablesapi').on('click', '.editbtn ', function(event) {
      var table = $('#tablesapi').DataTable();
      var trid = $(this).closest('tr').attr('id');
      var id = $(this).data('id');
      // var id_sapi = $(this).data('id_sapi');

      // console.log("isi id"+id);
      $('#editSapi').modal('show');
        $.ajax({
        url: "peternak/sapi/get_single_data.php",
        data: {
          id_prim: id
        },
        type: 'post',
        success: function(data) {
          // console.log("isi data "+data);
            var json = JSON.parse(data);
            $('#editSapi #id_prim').val(id);
            $('#editSapi #id_sapi').val(json.id_sapi);
            $('#editSapi #nama').val(json.nama);
            $('#editSapi #opsi_jenis option[value='+json.id_jenis+']').attr('selected', 'selected');
            $('#editSapi #opsi_pakan option[value='+json.id_pakan+']').attr('selected', 'selected');
            $('#editSapi #opsi_gender').val(json.jenis_kelamin);
            $('#editSapi #birth_dt').val(json.tgl_lahir);
            $('#editSapi #weight_kg').val(json.bobot_sapi);
            $('#editSapi #opsi_warna option[value='+json.warna_sapi+']').attr('selected', 'selected');
            $('#editSapi #harga').val(json.harga_sapi);
            $('#editSapi #trid').val(trid);
        }
      });
    });

    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#tablesapi').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      var id_sapi = $(this).data('id_sapi');
      if (confirm("Are you sure want to delete this Jenis Sapi ? ")) {
        $.ajax({
          url: "peternak/sapi/delete_data.php",
          data: {
            id: id,
            id_sapi: id_sapi
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              $("#" + id).closest('tr').remove();
              $("#" + id_sapi).closest('tr').remove();
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