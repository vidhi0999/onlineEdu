<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">

    <title>Student</title>
</head>

<body>

    <?php
    include('./student-sidebar.php');
    ?>

    <!-- CONTENT -->
    <section id="content">

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>

            </div>
            <hr>
            <ul class="box-info">
                <li>
                    <i class='fa fa-list'></i>
                    <span class="text">
                        <h3>4</h3>
                        <!-- php code number will be shown dynamically -->
                        <p>Active Courses</p>
                    </span>
                </li>
                <li>
                    <i class='fa fa-list'></i>
                    <span class="text">
                        <h3>0</h3>
                        <p>Inactive Courses</p>
                    </span>
                </li>
                <li>
                    <i class='fa fa-users'></i>
                    <span class="text">
                        <h3>2</h3>
                        <p>Verified</p>
                    </span>
                </li>
            </ul>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="../js/script.js"></script>
</body>

</html>