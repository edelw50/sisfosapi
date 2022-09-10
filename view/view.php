<?php 
require 'functions.php';
include('template/header.php');
echo '<title>Halaman View</title>';
include('template/navbar-view.php');
echo '<h3>View Data Sapi</h3>';
echo '<hr>';
echo '</div>';
echo '</div>';

$id_sapi = $_GET["id"];
$result = query("SELECT * FROM data_sapi WHERE id_sapi='$id_sapi'")[0];
?>
                <div class="row vh-100 bg-light rounded">
                    <div class="col align-items-center justify-content-center m-5">
                        <h3>This is blank page</h3>
                        <div class="card border-success mb-3 w-75">
                            <div class="card-header bg-transparent border-success"><img src="pdfqrcodes/<?= $id_sapi;?>.png" alt=""></div>
                            <div class="card-body text-success">
                                <h5 class="card-title">Informasi Data Sapi</h5>
                                <table>
                                    <thead>
                                        <tr></tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <th>Nama</th>
                                            <td><?=$result['nama'];?></td>
                                       </tr>
                                       <tr>
                                            <th>Jenis</th>
                                            <td><?=$result['id_jenis'];?></td>
                                       </tr>
                                       <tr>
                                            <th>Pakan</th>
                                            <td><?=$result['id_pakan'];?></td>
                                       </tr>
                                       <tr>
                                            <th>Gender</th>
                                            <td><?=$result['jenis_kelamin'];?></td>
                                       </tr>
                                       <tr>
                                            <th>Tgl Lahir</th>
                                            <td><?=$result['tgl_lahir'];?></td>
                                       </tr>
                                       <tr>
                                            <th>Bobot(kg)</th>
                                            <td><?=$result['bobot_sapi'];?></td>
                                       </tr>
                                       <tr>
                                            <th>Warna</th>
                                            <td><?=$result['warna_sapi'];?></td>
                                       </tr>
                                       <tr>
                                            <th>Harga</th>
                                            <td><?=$result['harga_sapi'];?></td>
                                       </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="card-footer bg-transparent border-success">&copy; <a href="#">Sisfo-Sapi</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


            <!-- Footer Start -->
            <?php include ('template/footer.php'); ?>
            <!-- Footer End -->
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
</body>

</html>