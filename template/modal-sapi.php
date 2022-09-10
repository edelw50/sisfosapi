<?php $id_user = $_GET['id']; ?>
<div class="modal fade" id="addSapi" tabindex="-1" aria-labelledby="addSapiLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Sapi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="" method="POST">
                        <input type="hidden" id="id" name="id" value="<?= $id_user;?>">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text text-bg-primary" id="basic-addon1"><i class="fa-solid fa-address-card"></i></span>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="opsi_jenis"><i class="fa-solid fa-cow"></i></label>
                                <select class="form-select" name="opsi_jenis" id="opsi_jenis">
                                    <option selected>--Jenis Sapi--</option>
                                    <?php 
                                    $sql = mysqli_query($conn, "SELECT * FROM jenis") or die (mysqli_error($conn));
                                    while($data=mysqli_fetch_array($sql)){
                                        echo '<option value="'.$data['id_jenis'].'">'.$data['jenis'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div> 
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="opsi_pakan"><i class="fa-solid fa-leaf"></i></label>
                                <select class="form-select" name="opsi_pakan" id="opsi_pakan">
                                    <option selected>--Pakan Sapi--</option>
                                    <?php 
                                    $sql = mysqli_query($conn, "SELECT * FROM pakan") or die (mysqli_error($conn));
                                    while($data=mysqli_fetch_array($sql)){
                                        echo '<option value="'.$data['id_pakan'].'">'.$data['pakan'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div> 
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="vaksin"><i class="fa-solid fa-syringe"></i></label>
                                <div class="input-group-text">
                                    <?php 
                                    $sql = mysqli_query($conn, "SELECT * FROM vaksin") or die (mysqli_error($conn));
                                    while($data=mysqli_fetch_array($sql)){
                                        echo '<input class="form-check-input me-2" type="checkbox" value="'.$data['id_vaksin'].'" name="vaksin[]">';
                                        echo '<label for="">'.$data['vaksin'].'</label>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="opsi_gender"><i class="fa-solid fa-venus-mars"></i></label>
                                <select class="form-select" name="opsi_gender" id="opsi_gender">
                                    <option selected>--Jenis kelamin Sapi--</option>
                                    <option value="Betina">Betina</option>
                                    <option value="Jantan">Jantan</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="birth_dt"><i class="fa-solid fa-calendar-days"></i></span>
                                <input type="date" name="birth_dt" id="birth_dt" class="form-control" placeholder="Tanggal lahir" aria-label="Tanggal lahir" aria-describedby="basic-addon1">
                            </div> 
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="weight_kg"><i class="fa-solid fa-scale-balanced"></i></span>
                                <input type="text" name="weight_kg" id="weight_kg" class="form-control" placeholder="Bobot hidup (kg)" aria-label="Bobot hidup (kg)" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="opsi_warna"><i class="fa-solid fa-palette"></i></label>
                                <select class="form-select" name="opsi_warna" id="opsi_warna">
                                    <option selected>--Warna Sapi--</option>
                                    <option value="Coklat">Coklat</option>
                                    <option value="Hitam">Hitam</option>
                                    <option value="Putih">Putih</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-rupiah-sign"></i></span>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga Sapi" aria-label="Harga Sapi" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="generate-qr" class="btn btn-success" ><i class="fa-solid fa-qrcode me-2"></i>Generate QRCode!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- edit sapi -->
<div class="modal fade" id="editSapi" tabindex="-1" aria-labelledby="editSapiLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Sapi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="" method="POST" id="editSapiForm">
                        <input type="text" id="id" name="id" value="<?= $id_user;?>">
                        <input type="text" id="id_prim" name="id_prim" value="">
                        <input type="text" id="id_sapi" name="id_sapi" value="">
                        <input type="hidden" name="trid" id="trid" value="">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text text-bg-primary" id="basic-addon1"><i class="fa-solid fa-address-card"></i></span>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="opsi_jenis"><i class="fa-solid fa-cow"></i></label>
                                <select class="form-select" name="opsi_jenis" id="opsi_jenis">
                                    <option selected>--Jenis Sapi--</option>
                                    <?php 
                                    $sql = mysqli_query($conn, "SELECT * FROM jenis") or die (mysqli_error($conn));
                                    while($data=mysqli_fetch_array($sql)){
                                        echo '<option value="'.$data['id_jenis'].'">'.$data['jenis'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div> 
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="opsi_pakan"><i class="fa-solid fa-leaf"></i></label>
                                <select class="form-select" name="opsi_pakan" id="opsi_pakan">
                                    <option selected>--Pakan Sapi--</option>
                                    <?php 
                                    $sql = mysqli_query($conn, "SELECT * FROM pakan") or die (mysqli_error($conn));
                                    while($data=mysqli_fetch_array($sql)){
                                        echo '<option value="'.$data['id_pakan'].'">'.$data['pakan'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div> 
                            <!-- <div class="input-group mb-3">
                                <label class="input-group-text" for="opsi_kandang"><i class="fa-solid fa-house-chimney-window"></i></label>
                                <select class="form-select" name="opsi_kandang" id="opsi_kandang">
                                    <option selected>--Kandang Sapi--</option>
                                    <option value="Kandang 1">Kandang 1</option>
                                    <option value="Kandang 2">Kandang 2</option>
                                    <option value="Kandang 3">Kandang 3</option>
                                </select>
                            </div> -->
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="opsi_vaksin"><i class="fa-solid fa-syringe"></i></label>
                                <div class="input-group-text">
                                    <?php 
                                    $sql = mysqli_query($conn, "SELECT * FROM vaksin") or die (mysqli_error($conn));
                                    while($data=mysqli_fetch_array($sql)){
                                        echo '<input class="form-check-input me-2" type="checkbox" value="'.$data['id_vaksin'].'" name="vaksin[]">';
                                        echo '<label for="">'.$data['vaksin'].'</label>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="opsi_gender"><i class="fa-solid fa-venus-mars"></i></label>
                                <select class="form-select" name="opsi_gender" id="opsi_gender">
                                    <option selected>--Jenis kelamin Sapi--</option>
                                    <option value="Betina">Betina</option>
                                    <option value="Jantan">Jantan</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="birth_dt"><i class="fa-solid fa-calendar-days"></i></span>
                                <input type="date" name="birth_dt" id="birth_dt" class="form-control" placeholder="Tanggal lahir" aria-label="Tanggal lahir" aria-describedby="basic-addon1">
                            </div> 
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="weight_kg"><i class="fa-solid fa-scale-balanced"></i></span>
                                <input type="text" name="weight_kg" id="weight_kg" class="form-control" placeholder="Bobot hidup (kg)" aria-label="Bobot hidup (kg)" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="opsi_warna"><i class="fa-solid fa-palette"></i></label>
                                <select class="form-select" name="opsi_warna" id="opsi_warna">
                                    <option selected>--Warna Sapi--</option>
                                    <option value="Coklat">Coklat</option>
                                    <option value="Hitam">Hitam</option>
                                    <option value="Putih">Putih</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-rupiah-sign"></i></span>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga Sapi" aria-label="Harga Sapi" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="generate-qr" class="btn btn-success" ><i class="fa-solid fa-qrcode me-2"></i>Generate QRCode!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>