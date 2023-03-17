<?php
session_start();
include_once('../php/database.php');
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");
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
                        <h3>List of Tutors</h3>
                    </div>
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
                        <span class="input-group-addon"><i class="fa fa-search">
                                <input type="text" placeholder="Search&hellip;"></i></span>
                    </div>
                </div>



                <table class="table">
                    <colgroup>
                        <col width="5%">
                        <col width="17.5%">
                        <col width="10%">
                        <col width="22.5%">
                        <col width="19%">
                        <col width="15%">
                        <col width="11%">
                    </colgroup>


                    <thead>


                        <tr>
                            <th>#</th>
                            <th>Date Created<i class="fa fa-sort"></i></th>
                            <th>Avatar</th>
                            <th>Name<i class="fa fa-sort"></i></th>
                            <th>Email<i class="fa fa-sort"></i></th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT *, concat(firstname,' ', coalesce(concat(middlename,' '), '') , lastname) as `name` from `tutor_list` where delete_flag = 0 order by `name` asc ");
                        while ($row = $qry->fetch_assoc()):
                            ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo date("Y-m-d H:i", strtotime($row['date_updated'])) ?>
                            </td>
                            <td>
                                <img src="../images/girl.jpeg" alt="" class="img-thumbnail rounded-circle tutor-avatar">
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>
                            <td>
                                <?php echo $row['email'] ?>
                            </td>

                            <td>
                                <?php if ($row['status'] == 0): ?>
                                <a href="../controller/updateInactive.php?id=<?php
                                        echo $row['id'];
                                        ?>">
                                    <span class="badge badge-light bg-gradient-light border px-3 rounded-pill">Waiting
                                        For
                                        Approval</span></a>
                                <?php elseif ($row['status'] == 1): ?>
                                <span class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Verified</span>
                                <?php elseif ($row['status'] == 2): ?>
                                <span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Blocked</span>
                                <?php else: ?>
                                <span
                                    class="badge badge-secondary bg-gradient-secondary px-3 rounded-pill">Inactive</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="icons">
                                    <button class="view" class="btn" title="View" id="view" data-toggle="modal"
                                        type="button" data-id="<?php echo $row['id'] ?>"
                                        style="border:none; background-color:inherit">
                                        <a href="tutor_view.php?id=<?php
                                            // session_start(); 
                                            echo $row['id'];
                                            // $_SESSION['id'] = $row['id'];
                                            ?>">
                                            <i style=" padding: 0.100rem 0.10rem;" class="fa fa-eye"></i>
                                        </a>
                                    </button>

                                </div>

                                <div class="icons">
                                    <button class="edit" class="btn" title="edit" id="edit" data-toggle="modal"
                                        type="button" data-id="<?php echo $row['id'] ?>"
                                        style="border:none; background-color:inherit">
                                        <a href="tutor_edit.php?id=<?php
                                            // session_start(); 
                                            echo $row['id'];
                                            // $_SESSION['id'] = $row['id'];
                                            ?>">
                                            <i style=" padding: 0.100rem 0.10rem;" class="fa fa-edit"></i>
                                        </a>
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
                        <li class="page-item active"><a href="#" class="page-link">2</a></li>
                        <li class="page-item "><a href=" #" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="../js/script.js"></script>
</body>

</html>