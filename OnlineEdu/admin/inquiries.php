<?php
session_start();
$adminuser = $_SESSION['adminuser'];
if (empty($adminuser)) {
    header("location:index.php");
}

include("../php/database.php");

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
            <div class="head-title">
                <div class="left">
                    <h1>Inquiries</h1>
                </div>
            </div>

            <hr>
            <div class="courses">
                <table class="table">
                    <colgroup>
                        <col width="7%">
                        <col width="17%">
                        <col width="15%">
                        <col width="22%">
                        <col width="25%">
                        <col width="15%">
                        <!-- <col width="10%"> -->
                    </colgroup>


                    <thead>


                        <tr>
                            <th>#</th>
                            <th>Date Created<i class="fa fa-sort"></i></th>
                            <th>Inquirer Name</th>
                            <th> For Course Name<i class="fa fa-sort"></i></th>
                            <th>Message<i class="fa fa-sort"></i></th>
                            <th>Status<i class="fa fa-sort"></i></th>
                            <!-- <th>Action</th> -->
                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        // $i = 1;
                        $qry = $conn->query("SELECT* FROM inquiries");
                        while ($row = $qry->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['date_created'] ?>
                                </td>

                                <td>
                                    <?php echo $row['username'] ?>
                                </td>
                                <td>
                                    <?php echo $row['course_name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['message'] ?>
                                </td>
                                <td>

                                    <?php if ($row['status'] == 1): ?>

                                        <span class="btn btn-success">Read</span> </a>

                                    <?php elseif ($row['status'] == 0): ?>

                                        <span class="btn btn-danger">Unread</span></a>
                                    <?php endif; ?>
                                </td>




                            </tr>

                        <?php endwhile; ?>

                    </tbody>
                </table>



            </div>


        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="../js/script.js"></script>
</body>

</html>