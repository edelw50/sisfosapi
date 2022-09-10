<!-- modal edit jenis -->
<div class="modal fade" id="updateUser" tabindex="-1" aria-labelledby="updateUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserLabel">Update User Sapi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateUserForm" role="form">
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="trid" id="trid" value="">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-primary"><i class="fa-solid fa-address-card"></i></span>
                        <input type="text" name="usernameEdit" id="usernameEdit" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text text-bg-primary" for="level"><i class="fa-solid fa-user-group"></i></label>
                        <select class="form-select" name="levelEdit" id="levelEdit">
                            <option selected>--Level--</option>
                            <option value="Admin">Admin</option>
                            <option value="Peternak">Peternak</option>
                        </select>
                    </div> 
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-primary"><i class="fa-solid fa-key"></i></span>
                        <input type="password" name="passwordEdit1" id="passwordEdit1" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-warning"><i class="fa-solid fa-key"></i></i></span>
                        <input type="password" name="passwordEdit2" id="passwordEdit2" class="form-control" placeholder="Password Confirmation" aria-label="Password Confirmation" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" onclick="javascript:window.location.reload()">Update User Sapi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal edit jenis -->
<!-- modal add user -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserLabel">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addUserForm" role="form">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-primary"><i class="fa-solid fa-address-card"></i></span>
                        <input type="text" name="usernameAdd" id="usernameAdd" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text text-bg-primary" for="level"><i class="fa-solid fa-user-group"></i></label>
                        <select class="form-select" name="levelAdd" id="levelAdd">
                            <option selected>--Level--</option>
                            <option value="Admin">Admin</option>
                            <option value="Peternak">Peternak</option>
                        </select>
                    </div> 
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-primary"><i class="fa-solid fa-key"></i></span>
                        <input type="password" name="passwordAdd1" id="passwordAdd1" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-bg-warning"><i class="fa-solid fa-key"></i></i></span>
                        <input type="password" name="passwordAdd2" id="passwordAdd2" class="form-control" placeholder="Password Confirmation" aria-label="Password Confirmation" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="addUserFormButton">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal add user -->