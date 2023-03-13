<?php
include_once('../php/database.php');

$course_id = $_POST['record'];

$sql = $conn->query("SELECT c.*, concat(t.lastname,', ', t.firstname, COALESCE(concat(' ', t.middlename),'')) as `tutor` from `course_list` c inner join `tutor_list` t on c.tutor_id = t.id where c.delete_flag = 0  order by c.`name` asc ");

// $sql = "SELECT order_status from orders where order_id='$order_id'";
// $result = $conn->query($sql);


$row = $result->fetch_assoc();

// echo $row["pay_status"];

// if ($row["order_status"] == 0) {
//     $update = mysqli_query($conn, "UPDATE orders SET order_status=1 where order_id='$order_id'");
// } else if ($row["order_status"] == 1) {
//     $update = mysqli_query($conn, "UPDATE orders SET order_status=0 where order_id='$order_id'");
// }

if ($row['status'] == 0) {
    $update = mysqli_query($conn, "UPDATE course_list SET status = 1 where id='$course_id'");
} else if ($row["order_status"] == 1) {
    $update = mysqli_query($conn, "UPDATE course_list SET status =0 where id='$course_id'");
}





// if($update){
//     echo"success";
// }
// else{
//     echo"error";
// }

?>