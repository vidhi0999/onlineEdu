<?php
require_once('../php/database.php');
// $adminuser = $_SESSION['adminuser'];
// if (empty($adminuser)) {
//     header("location:index.php");

// }


?>

<style>
    #uni_modal .modal-footer {
        display: none;
    }

    #course-logo {
        max-width: 100%;
        max-height: 15em;
        object-fit: scale-down;
        object-position: center center;
    }
</style>



<div class="modal-header border-bottom-0">
    <h5 class="modal-title" id="exampleModalLabel">Course Details</h5>
</div>
<form method="POST">
    <div class="modal-body">
        <div class="form-group">



            <div class="container-fluid">
                <center>
                    <!-- validate_image(isset($logo_path) ? $logo_path : '') -->
                    <img src="../images/girl.jpeg" alt=" Course=logo"
                        class="img-thumbnail border border-dark bg-gradient-dark" id="course-logo">
                </center>
                <?php 
                // session_start();
                // $id = $_SESSION['id'];
                // echo $id;
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    // echo $id;
                    $sql1 = $conn->query("SELECT * FROM course_list WHERE id = '$id'");
                    $row1 = $sql1->fetch_assoc();
                    $tutor_id = $row1['tutor_id'];
                    $sql2 = $conn->query("SELECT * FROM tutor_list WHERE id = '$tutor_id'");
                    $row2 = $sql2->fetch_assoc();
                    // $qry = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.delete_flag = 0  order by c.`name` asc ");
                    // $row = $qry->fetch_assoc();


                    // $qry = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.id = '{$_GET['id']}' ");
                    // if ($qry->num_rows > 0) {
                    //     foreach ($qry->fetch_assoc() as $k => $v) {
                    //         $$k = $v;
                    //     }
                    // }
                    // echo $row['name'];
                }
                ?>
                <dl>
                    <dt class="text-muted">Tutor : <?php echo $row2['lastname'].", " .$row2['firstname'].", ".$row2['middlename'];?></dt>
                    <!-- <dd class="pl-4">
                        <?php 
                        // isset($tutor) ? strtoupper($tutor) : ""
                        //  echo $row1['tutor'];
                        ?>
                    </dd> -->
                    <dt class="text-muted">Course : <?php echo $row1['name'];?></dt>
                    <!-- <dd class="pl-4">
                        <?php 
                        // isset($name) ? $name : "" 
                        ?>
                    </dd> -->
                    <dt class="text-muted">Description : <?php echo $row1['description'];?></dt>
                    <!-- <dd class="pl-4">
                        <?php 
                        // isset($description) ? str_replace(["\n\r", "\n", "\r"], "<br/>", $description) : '' 
                        ?>
                    </dd> -->
                    <dt class="text-muted">Your Experience for this Course : <?php echo $row1['experience'];?></dt>
                    <!-- <dd class="pl-4">
                        <?php 
                        // isset($experience) ? $experience : "" 
                        ?>
                    </dd> -->
                    <dt class="text-muted">Status :
                    <?php if ($row1['status'] == 0): ?>
                            <span
                                style=" background-color: red;color: white;  padding: 2px 4px; text-align: center; border-radius: 4px;">Inactive</span>
                        <?php else: ?>
                            <span
                                style=" background-color: green;color: white;  padding: 2px 4px; text-align: center; border-radius: 4px;">Active</span>
                        <?php endif; ?>
                    </dt>
                    <!-- <dd class="pl-4">
                        
                    </dd> -->
                </dl>
                <div class="clear-fix my-3"></div>
                <div class="text-right">
                    <button class="btn btn-sm btn-dark bg-gradient-dark btn-flat" type="button" data-dismiss="modal"><i
                            class="fa fa-times"></i> Close</button>
                </div>
            </div>



        </div>

</form>



















<script src="../js/script.js"></script>