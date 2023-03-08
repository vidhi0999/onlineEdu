<?php
include_once('../php/database.php');
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.id = '{$_GET['id']}' ");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }
}
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
<div class="container-fluid">
    <center>
        <!-- validate_image(isset($logo_path) ? $logo_path : '') -->
        <img src="../images/girl.jpeg" alt=" Course=logo" class="img-thumbnail border border-dark bg-gradient-dark"
            id="course-logo">
    </center>
    <dl>
        <dt class="text-muted">Tutor</dt>
        <dd class="pl-4">
            <?= isset($tutor) ? strtoupper($tutor) : "" ?>
        </dd>
        <dt class="text-muted">Course</dt>
        <dd class="pl-4">
            <?= isset($name) ? $name : "" ?>
        </dd>
        <dt class="text-muted">Description</dt>
        <dd class="pl-4">
            <?= isset($description) ? str_replace(["\n\r", "\n", "\r"], "<br/>", $description) : '' ?>
        </dd>
        <dt class="text-muted">Your Experience for this Course</dt>
        <dd class="pl-4">
            <?= isset($experience) ? $experience : "" ?>
        </dd>
        <dt class="text-muted">Status</dt>
        <dd class="pl-4">
            <?php if ($row['status'] == 0): ?>
                <span
                    style=" background-color: red;color: white;  padding: 2px 4px; text-align: center; border-radius: 4px;">Inactive</span>
            <?php else: ?>
                <span
                    style=" background-color: green;color: white;  padding: 2px 4px; text-align: center; border-radius: 4px;">Active</span>
            <?php endif; ?>
        </dd>
    </dl>
    <div class="clear-fix my-3"></div>
    <div class="text-right">
        <button class="btn btn-sm btn-dark bg-gradient-dark btn-flat" type="button" data-dismiss="modal"><i
                class="fa fa-times"></i> Close</button>
    </div>
</div>


<script src="../js/script.js"></script>











<a class="login-trigger" href="#" data-target="#login" data-toggle="modal">Login</a>

<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-body">
                <button data-dismiss="modal" class="close">&times;</button>
                <h4>Login</h4>
                <form>
                    <input type="text" name="username" class="username form-control" placeholder="Username" />
                    <input type="password" name="password" class="password form-control" placeholder="password" />
                    <input class="btn login" type="submit" value="Login" />
                </form>
            </div>
        </div>
    </div>
</div>








body{
height: 100vh;
text-align: center;
}
/*Trigger Button*/
.login-trigger {
font-weight: bold;
color: #fff;
background: linear-gradient(to bottom right, #B05574, #F87E7B);
padding: 15px 30px;
border-radius: 30px;
position: relative;
top: 50%;
}

/*Modal*/
h4 {
font-weight: bold;
color: #fff;
}
.close {
color: #fff;
transform: scale(1.2)
}
.modal-content {
font-weight: bold;
background: linear-gradient(to bottom right,#F87E7B,#B05574);
}
.form-control {
margin: 1em 0;
}
.form-control:hover, .form-control:focus {
box-shadow: none;
border-color: #fff;
}
.username, .password {
border: none;
border-radius: 0;
box-shadow: none;
border-bottom: 2px solid #eee;
padding-left: 0;
font-weight: normal;
background: transparent;
}
.form-control::-webkit-input-placeholder {
color: #eee;
}
.form-control:focus::-webkit-input-placeholder {
font-weight: bold;
color: #fff;
}
.login {
padding: 6px 20px;
border-radius: 20px;
background: none;
border: 2px solid #FAB87F;
color: #FAB87F;
font-weight: bold;
transition: all .5s;
margin-top: 1em;
}
.login:hover {
background: #FAB87F;
color: #fff;
}