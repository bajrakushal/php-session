<?php require_once 'functions.php'?>

<?php
    $functions = new functions();
    $data = stripslashes(file_get_contents('php://input'));
    $mydata = json_decode($data,true);
    $id = $mydata['uid'];
    $users = $functions->deleteUser($id);
    if($users){
        echo json_encode(
            array(
                'status' => true,
                'message' => 'Deleted',
                'delete_parent_id' => 'row_'.$id
            )
        );
    }else{
        echo json_encode(
            array(
                'status' => false,
                'message' => 'Deleted',
                'delete_parent_id' => ''
            )
        );
    }

?>