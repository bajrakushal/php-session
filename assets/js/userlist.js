$(document).ready(function () {
  $(".btn-delete").on("click", function () {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        let id = $(this).attr("data-sid");
        let my_data = { uid: id };
        $.ajax({
          url: "/phpsession/php-second/process/delete_user.php",
          method: "POST",
          data: JSON.stringify(my_data),
          success: function (data) {
            var response = JSON.parse(data);
            if (response.status) {
              $("#" + response.delete_parent_id).remove();
              Swal.fire({
                icon: "success",
                title: "Deleted",
                text: "The user you tried to delete has been removed!",
              });
            } else {
              Swal.fire({
                icon: "error",
                title: "Failed",
                text: "The user you tried to delete could not be removed!",
              });
            }
          },
        });
      }
    });
  });
  //Edit user
  $(".btn-edit").on("click", function () {
    $("#editmodal").modal("show");
    let id = $(this).attr("data-sid");
    let my_data = { uid: id };
    $.ajax({
      url: "/phpsession/php-second/process/update_user.php",
      method: "POST",
      dataType: "json",
      data: JSON.stringify(my_data),
      success: function (data) {
        console.log(data);
        $("#fnames").val(data.fname);
        $("#lnames").val(data.lname);
        $("#emails").val(data.email);
        $("#usernames").val(data.username);
        $("#passwords").val(data.password);
        $("#con_passwords").val(data.password);
        $("#contacts").val(data.mobile);
        $("#statuss").val(data.status);
        $("#user_id").val(data.md5_id);
      },
    });
  });
  //close modal
  $(".btn-close").on("click", function () {});
});
