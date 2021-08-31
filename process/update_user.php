<?php require_once 'functions.php';?>

<?php 
    $functions = new functions();
    $data = stripslashes(file_get_contents('php://input'));
    $mydata = json_decode($data,true);
    $id = $mydata['uid'];
    $users = $functions->editUser($id);
    $data = mysqli_fetch_assoc($users);  
      
    echo json_encode($data);
?>