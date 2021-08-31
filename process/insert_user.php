<?php require_once 'functions.php'?>
<?php 
    $functions = new functions();
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $contact = $_POST['contact'];
        $status = $_POST['status'];
        $con_password=$_POST['con_password'];
        $params = array(
            'fname'=>$fname,
            'lname'=>$lname,
            'email'=>$email,
            'username'=>$username,
            'password'=>$password,
            'contact'=>$contact,
            'status'=>$status,
            'con_password'=>$con_password,
        );
        $functions->saveUser($params);
    }
    if(isset($_POST['update'])){
        $fname = $_POST['fname'];
        $id = $_POST['user_id'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $contact = $_POST['contact'];
        $status = $_POST['status'];
        $con_password=$_POST['con_password'];
        $params = array(
            'fname'=>$fname,
            'lname'=>$lname,
            'email'=>$email,
            'username'=>$username,
            'password'=>$password,
            'contact'=>$contact,
            'status'=>$status,
            'con_password'=>$con_password,
        );
        $functions->updateUser($params,$id);
    }
    else{
        echo "not set";
    }

?>