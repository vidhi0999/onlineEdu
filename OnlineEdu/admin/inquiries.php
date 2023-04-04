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
                            <th> For Tutor Name<i class="fa fa-sort"></i></th>
                            <th>Message<i class="fa fa-sort"></i></th>
                            <th>Status<i class="fa fa-sort"></i></th>
                            <!-- <th>Action</th> -->
                        </tr>

                    </thead>
                    <tbody>
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