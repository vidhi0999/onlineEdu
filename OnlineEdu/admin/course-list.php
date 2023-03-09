<?php
session_start();
include_once('../php/database.php');
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:admin-login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <h3>List of Courses</h3>
                    </div>
                </div>

                <div class="right-plus">
                    <a href="" id="create_new" class="plus"><i class=" fa fa-plus"></i> Create
                        New</a>
                </div>

                <hr>

                <div class="table-title">
                    <div class="show-entries">
                        <span>Show</span>
                        <select>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                        </select>
                        <span>entries</span>
                    </div>

                    <div class="search-box">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search&hellip;">
                    </div>
                </div>



                <table class="table">
                    <colgroup>
                        <col width="5%">
                        <col width="15%">
                        <col width="10%">
                        <col width="20%">
                        <col width="25%">
                        <col width="15%">
                        <col width="10%">
                    </colgroup>


                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Created<i class="fa fa-sort"></i></th>
                            <th>Image</th>
                            <th>Tutor<i class="fa fa-sort"></i></th>
                            <th>Name<i class="fa fa-sort"></i></th>
                            <th>Status<i class="fa fa-sort"></i></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.delete_flag = 0  order by c.`name` asc ");
                        while ($row = $qry->fetch_assoc()):
                            ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?>
                            </td>
                            <td>
                                <img src="../images/girl.jpeg" alt="Course Logo" class="course-image">
                            </td>
                            <td>
                                <?php echo $row['tutor'] ?>
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>

                            <td class="text-center">
                                <?php if ($row['status'] == 0): ?>
                                <span
                                    style=" background-color: red;color: white;  padding: 2px 4px; text-align: center; border-radius: 4px;">Inactive</span>
                                <?php else: ?>
                                <span
                                    style=" background-color: green;color: white;  padding: 2px 4px; text-align: center; border-radius: 4px;">Active</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="icons">
                                    <button class="view" title="View" id="view" data-toggle="tooltip">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <div class="icons">
                                    <button class="edit" title="Edit" id="edit" data-toggle="tooltip"><i
                                            class="fa fa-edit "></i>
                                    </button>
                                </div>
                                <div class="icons">
                                    <button class="delete" title="Delete" id="delete" data-toggle="tooltip"><i
                                            class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>

                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- <script src="../js/script.js"></script> -->
</body>

</html>