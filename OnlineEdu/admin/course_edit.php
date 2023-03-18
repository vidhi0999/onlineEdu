<?php
require_once('../php/database.php');
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");

}
if (isset($_POST['id']) && $_POST['id'] > 0) {
    $qry = $conn->query("SELECT * from `course_list` where id = '{$_POST['id']}' ");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }
}

?>

<style>
    #course-logo {
        max-width: 100%;
        max-height: 20em;
        object-fit: scale-down;
        object-position: center center;
    }
</style>



<div class="modal-header border-bottom-0">
    <h5 class="modal-title" id="exampleModalLabel">Update Course Details</h5>
</div>
<form method="POST">
    <div class="modal-body">
        <div class="form-group">

            <div class="container-fluid">
                <!-- <form action="" id="course-form"> -->
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                <input type="hidden" name="tutor_id" value="<?php echo isset($tutor_id) ? $tutor_id : '' ?>">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0"
                        value="<?php echo isset($name) ? $name : ''; ?>" required />
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea type="text" name="description" id="description"
                        class="form-control form-control-sm rounded-0"
                        required><?php echo isset($description) ? $description : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="experience" class="control-label">Experience</label>
                    <input type="text" name="experience" id="experience" class="form-control form-control-sm rounded-0"
                        value="<?php echo isset($experience) ? $experience : ''; ?>" required />
                </div>
                <div class="form-group">
                    <label for="status" class="control-label">Status</label>
                    <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                        <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Active
                        </option>
                        <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="img" class="control-label">Course Logo</label>
                    <div class="custom-file rounded-0">
                        <input type="file" class="custom-file-input rounded-0" id="customFile1" name="img"
                            onchange="displayImg(this)" accept="images/png, images.jpeg">
                        <label class="custom-file-label rounded-0" for="customFile1">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                </div>
                <!-- </form> -->
            </div>
        </div>

</form>


<script src="../js/script.js"></script>