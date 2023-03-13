const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
  const li = item.parentElement;

  item.addEventListener("click", function () {
    allSideMenu.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector("#content nav .fa.fa-bars");
const sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
});

const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
});

// table of course list in admin
$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
  // Animate select box length
  var searchInput = $(".search-box input");
  var inputGroup = $(".search-box .input-group");
  var boxWidth = inputGroup.width();
  searchInput
    .focus(function () {
      inputGroup.animate({
        width: "300",
      });
    })
    .blur(function () {
      inputGroup.animate({
        width: boxWidth,
      });
    });
});

// for view in course list

// change course status
// function ChangeOrderStatus(id) {
//   $.ajax({
//     url: "./controller/updateCourseStatus.php",
//     method: "post",
//     data: { record: id },
//     success: function (data) {
//       alert("Course Status updated successfully");
//       $("form").trigger("reset");
//       showOrders();
//     },
//   });
// }

$(document).ready(function () {
  // $(".delete_data").click(function () {
  //   _conf("Are you sure to delete this Course permanently?", "delete_course", [
  //     $(this).attr("data-id"),
  //   ]);
  // });

  $(".view_data").click(function () {
    uni_modal(
      "<i class='fa fa-bars'></i> Course Details",
      "../course_view.php?id=" + $(this).attr("data-id")
    );
  });
  // $(".edit_data").click(function () {
  //   uni_modal(
  //     "<i class='fa fa-edit'></i> Update Course Details",
  //     "courses/manage_course.php?id=" + $(this).attr("data-id")
  //   );
  // });
  // $('.table').dataTable({
  //     columnDefs: [{
  //         orderable: false,
  //         targets: [2, 6]
  //     }],
  //     order: [0, 'asc']
  // });
  // $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
});

// function delete_course($id) {
//     start_loader();
//     $.ajax({
//         url: _base_url_ + "classes/Master.php?f=delete_course",
//         method: "POST",
//         data: {
//             id: $id
//         },
//         dataType: "json",
//         error: err => {
//             console.log(err)
//             alert_toast("An error occured.", 'error');
//             end_loader();
//         },
//         success: function(resp) {
//             if (typeof resp == 'object' && resp.status == 'success') {
//                 location.reload();
//             } else {
//                 alert_toast("An error occured.", 'error');
//                 end_loader();
//             }
//         }
//     })
// }
