 <!-- modal edit jenis -->
 <div class="modal fade" id="updateJenis" tabindex="-1" aria-labelledby="updateJenisLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateJenisLabel">Update Jenis Sapi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateJenisForm" role="form">
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="trid" id="trid" value="">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-primary"><i class="fa-solid fa-cow"></i></span>
                        <input type="text" name="jenis" id="jenis" class="form-control" aria-label="Jenis Sapi" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-primary"><i class="fa-solid fa-address-card"></i></span>
                        <textarea class="form-control" id= "keterangan" name="keterangan" rows="3" aria-label="Keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" onclick="javascript:window.location.reload()">Update Jenis Sapi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal edit jenis -->
<!-- modal add jenis -->
<div class="modal fade" id="addJenis" tabindex="-1" aria-labelledby="addJenisLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addJenisLabel">Tambah Jenis Sapi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addJenisForm" role="form">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-primary"><i class="fa-solid fa-cow"></i></span>
                        <input type="text" name="jenis" id="jenis" class="form-control" placeholder="Jenis Sapi" aria-label="Jenis Sapi" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-primary"><i class="fa-solid fa-address-card"></i></span>
                        <textarea class="form-control" id= "keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addJenisFormButton" class="btn btn-success">Tambah Jenis Sapi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal add jenis -->