 <!-- modal edit pakan -->
 <div class="modal fade" id="updatePakan" tabindex="-1" aria-labelledby="updatePakanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePakanLabel">Update Pakan Sapi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updatePakanForm" role="form">
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="trid" id="trid" value="">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-primary"><i class="fa-solid fa-leaf"></i></span>
                        <input type="text" name="pakan" id="pakan" class="form-control" aria-label="Pakan Sapi" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" onclick="javascript:window.location.reload()">Update Pakan Sapi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal edit pakan -->
<!-- modal add pakan -->
<div class="modal fade" id="addPakan" tabindex="-1" aria-labelledby="addPakanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPakanLabel">Tambah Pakan Sapi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addPakanForm" role="form">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-primary"><i class="fa-solid fa-cow"></i></span>
                        <input type="text" name="pakan" id="pakan" class="form-control" placeholder="Pakan Sapi" aria-label="Pakan Sapi" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addPakanFormButton" class="btn btn-success">Tambah Jenis Sapi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal add pakan -->