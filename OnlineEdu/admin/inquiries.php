<?php
session_start();
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
            <div class="head-title">
                <div class="left">
                    <h1>List of Courses</h1>
                </div>
            </div>

            <hr>
            <div class="courses">
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
                            <th>Inquirer Name</th>
                            <th> For Tutor Name<i class="fa fa-sort"></i></th>
                            <th>Message<i class="fa fa-sort"></i></th>
                            <th>Status<i class="fa fa-sort"></i></th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Fran Wilson</td>
                            <td>C/ Araquil, 67</td>
                            <td>Madrid</td>
                            <td>28023</td>
                            <td>Spain</td>
                            <td>
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="fa fa-eye"></i></a>
                                <!-- <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="fa fa-edit "></i></a> -->
                                <!-- <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i -->
                                <!-- class="fa fa-trash"></i></a> -->
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Fran Wilson</td>
                            <td>C/ Araquil, 67</td>
                            <td>Madrid</td>
                            <td>28023</td>
                            <td>Spain</td>
                            <td>
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="fa fa-eye"></i></a>
                                <!-- <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="fa fa-edit "></i></a> -->
                                <!-- <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i -->
                                <!-- class="fa fa-trash"></i></a> -->
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Date</td>
                            <td class="text-center">
                                <img src="" alt="Course Logo"
                                    class="img-thumbnail border border-dark p-0 rounded-0 course-logo">
                            </td>
                            <td>tutor-name</td>
                            <td>name of course</td>
                            <td class="text-center">
                                <span
                                    style=" background-color: red;color: white;  padding: 2px 4px; text-align: center; border-radius: 4px;">Unread</span>
                                <span
                                    style=" background-color: green;color: white;  padding: 2px 4px; text-align: center; border-radius: 4px;">Read</span>
                            </td>
                            <td align="center">

                                <!-- <button type="button"
                                        class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown">
                                        Action
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>

                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item view_data" href="javascript:void(0)" data-id=""><span
                                                class="fa fa-eye text-dark"></span>
                                            View</a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item edit_data" href="javascript:void(0)" data-id=""><span
                                                class="fa fa-edit text-primary"></span> Edit</a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item delete_data" href="javascript:void(0)" data-id=""><span
                                                class="fa fa-trash text-danger"></span> Delete</a>
                                    </div> -->

                                <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                        class="fa fa-eye"></i></a>
                                <!-- <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="fa fa-edit "></i></a> -->
                                <!-- <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="fa fa-trash"></i></a> -->
                            </td>
                        </tr>


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


    <script src="../js/script.js"></script>
</body>

</html>