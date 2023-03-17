<?php
session_start();
include_once('../php/database.php');
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");
}
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT *, CONCAT(lastname,', ',firstname , COALESCE(concat(' ', middlename), '')) as `name` FROM `tutor_list` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
                $$k = $v;
        }
        if(isset($id)){
            $meta_qry = $conn->query("SELECT * from `tutor_meta` where tutor_id = '{$id}' ");
            while($row = $meta_qry->fetch_assoc()){
                ${$row['meta_field']} = $row['meta_value'];
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Admin</title>



</head>

<body>

    <?php
    include('./header.php');
    ?>

    <!-- CONTENT -->
    <section id="content">

        <!-- MAIN -->
        <main>
            <div class="courses">
                <div class="head-title">
                    <div class="left">
                        <h3>Manage Profile</h3>
                    </div>
                </div>


                <hr>
                <br>

                <div class="row mt-n5 justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                        <div class="card card-outline card-primary rounded-0 shadow">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <form action="" id="manage-profile-form">
                                        <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
                                        <div class="form-group">
                                            <label for="" class="control-label">Name <em>(last name, first name middle
                                                    name)</em></label>
                                            <div class="input-group input-group-sm align-items-end">
                                                <input type="text"
                                                    class="form-control form-control-sm form-control-border rounded-0"
                                                    id="lastname" name="lastname"
                                                    value="<?= isset($lastname) ? $lastname : "" ?>" required="required"
                                                    placeholder="First Name">
                                                <span class="mr-1">,</span>
                                                <input type="text"
                                                    class="form-control form-control-sm form-control-border rounded-0"
                                                    id="firstname" name="firstname"
                                                    value="<?= isset($firstname) ? $firstname : "" ?>"
                                                    required="required" placeholder="Last Name">
                                                <input type="text"
                                                    class="form-control form-control-sm form-control-border rounded-0"
                                                    id="middlename" name="middlename"
                                                    value="<?= isset($middlename) ? $middlename : "" ?>"
                                                    placeholder="Middle Name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="dob" class="control-label">Birthday</label>
                                                    <input type="date" name="dob" id="dob"
                                                        class="form-control form-control-sm form-control-border"
                                                        value="<?= isset($dob) ? date("Y-m-d", strtotime($dob)) : "" ?>"
                                                        required="required">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="gender" class="control-label">Gender</label>
                                                    <select name="gender" id="gender"
                                                        class="form-control form-control-sm form-control-border"
                                                        required="required">
                                                        <option
                                                            <?= isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>
                                                            Male</option>
                                                        <option
                                                            <?= isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>
                                                            Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="email" class="control-label">Email</label>
                                                    <input type="email" name="email" id="email"
                                                        class="form-control form-control-sm form-control-border"
                                                        value="<?= isset($email) ? $email : "" ?>" required="required">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="contact" class="control-label">Contact #</label>
                                                    <input type="text" name="contact" id="contact"
                                                        class="form-control form-control-sm form-control-border"
                                                        value="<?= isset($contact) ? $contact : "" ?>"
                                                        required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="address" class="control-label">Address</label>
                                                    <textarea rows="3" name="address" id="address"
                                                        class="form-control form-control-sm rounded-0"
                                                        style="resize:none"
                                                        required="required"><?= isset($address) ? $address : "" ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="specialty" class="control-label">Specialty</label>
                                                    <textarea rows="3" name="specialty" id="specialty"
                                                        class="form-control form-control-sm rounded-0"
                                                        style="resize:none"
                                                        required="required"><?= isset($specialty) ? $specialty : "" ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="description" class="control-label">Short Description
                                                        About Your Self</label>
                                                    <textarea rows="3" name="description" id="description"
                                                        class="form-control form-control-sm rounded-0"
                                                        style="resize:none"
                                                        required="required"><?= isset($description) ? $description : "" ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer py-1 text-center">
                                <button class="btn btn-primary btn-flat btn-sm bg-gradient-primary"
                                    form="manage-profile-form"><i class="fa fa-save"></i> Save</button>
                                <a class="btn btn-light btn-flat bg-gradient-light border btn-sm"
                                    href="../admin/tutor-list.php?id=<?= isset($id) ? $id : '' ?>"><i
                                        class="fa fa-times"></i> Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="../js/script.js"></script>
</body>

</html>