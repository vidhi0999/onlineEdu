<?php

require_once('../php/database.php');

if (isset($_POST['id']) && $_POST['id'] > 0) {
    $qry = $conn->query("SELECT * from `tutor_list` where id = '{$_POST['id']}' ");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }
}
?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-check-square"></i> Update Tutor's Status </h5>
    </div>
    <div class="modal-body">
        <div class="container-fluid">
            <form action="" id="tutor-form">
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                <div class="form-group">
                    <label for="status" class="control-label">Status</label>
                    <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                        <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Pending
                        </option>
                        <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Verified
                        </option>
                        <option value="2" <?php echo isset($status) && $status == 2 ? 'selected' : '' ?>>Block</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="submit">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    </div>
</div>