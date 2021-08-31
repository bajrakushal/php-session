<?php 
require_once 'constants.php'; 
date_default_timezone_set('Asia/Kathmandu');


class functions{

    public function __construct()
	{
		$this->makeConnection();
	}

    private function makeConnection(){
        $host = DB_HOST;
		$user = DB_USER;
		$pass = DB_PASSWORD;
		$database = DB_NAME;
		$conn = mysqli_connect( $host, $user, $pass, $database ) or die();
        return $conn;

    }
    function getUser(){
        $conn = $this->makeConnection();
        $query = "SELECT *,md5(id) as md5_id, CONCAT(fname,' ',lname) as name FROM users";
        $result = mysqli_query($conn,$query);
        if($result){
            return $result;
            mysqli_close($conn);
        }
    }
    
    
    function saveUser($params){
        $conn = $this->makeConnection();
        $fname = trim($params['fname']);
        $lname = trim($params['lname']);
        $username = $params['username'];
        $password = $params['password'];
        $email=$params['email'];
        $status=$params['status'];
        $contact = $params['contact'];
        $date = date('Y-m-d h:i:sa');
        $con_password = $params['con_password'];
        
        $error = false;
        $msg="";
        /**********************/
        /*  Validation starts */
        /*********************/
      
        //user check
        $user_check = "SELECT * FROM users WHERE username='$username' or email='$email'";
        $result = mysqli_query($conn,$user_check);
        $user = mysqli_fetch_assoc($result);
    
        if(!empty($username)){
            if(strpos($username,' ') === false){
                if($user){
                    if($user['email'] == $email || $user['username'] == $username){
                        $msg="username";
                        $error = true;
                        $_SESSION['userErr'] = "Please enter a unique username or email";
                    }
                }
            }else{
                
                $error = true;
                $_SESSION['userErr'] = "White spaces found";
            }
        }else{
            $error = true;
            $_SESSION['userErr'] = "Username is mandatory";
        }
    
        if(!empty($password)){
            if( $password != $con_password){
                $msg="pass";
                $error = true;
                $_SESSION['passErr'] = "Two password donot match";
            }
            if(strlen($password) >= 8 && strlen($password) <= 30  ){
                if (!preg_match ("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/", $password) ) {  
                    $error = true;
                    $_SESSION['passErr'] = "A password must contain UpperCase, LowerCase and a Number";  
                } 
            }else{
                $error = true;
                $_SESSION['passErr'] = "Password must be minimum 8 characters and no more than 30";
            }
        }else{
            $error = true;
            $_SESSION['passErr'] = "Password is mandatory";
        }
        
        if(!empty($fname)){
            if(strlen($fname)< 3 && strlen($fname)> 200){ 
                $msg="name";
                $error = true;
                $_SESSION['nameERR'] = "Only alphabets and whitespace are allowed.";  
            }
        }else{
            $error = true;
            $_SESSION['nameERR'] = "Name is mandatory";
        }
        
        if(!empty($contact)){
            if(strlen($contact) == 10){
                if (!preg_match ("/^[9]/", $contact) ) {  
                    $msg="contact";
                    $error = true;
                    $_SESSION['phoneErr'] = "Invalid Number";  
                }
            }else{
                $error = true;
                $_SESSION['phoneErr'] = "Invalid Number";
            }
        }else{
            $error = true;
            $_SESSION['phoneErr'] = "Number is mandatory";
        }
        
        if(!empty($email)){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $msg="email";
                $error = true;
                $_SESSION['emailErr'] = "Email is not valid";
            }
        }else{
            $error = true;
            $_SESSION['emailErr'] = "Email is mandatory";
        }
        
    
        /**********************/
        /*  Validation Ends */
        /*********************/
        if($error === false){
            $query = "INSERT INTO users (fname,lname,username,password,email,mobile,status,created_at) values('$fname','$lname','$username','$password','$email','$contact','$status','$date')";
            echo "In here";
            $result = mysqli_query($conn,$query);
            if($result){
                $_SESSION['success'] = "Data saved successfully";
                header('location:../user/list.php');
                mysqli_close($conn);
            }
        }        
        
    }

    public function deleteUser($id) {
		$conn = $this->makeConnection();
		$sql = "DELETE FROM users where md5(id) ='$id' ";
		$result = mysqli_query($conn, $sql);
        if($result){
            return true;
        }else{
            return false;
        }
		mysqli_close( $conn );
	}
    
    public function editUser($id){
        $conn = $this->makeConnection();
		$sql = "SELECT *, md5(id) as md5_id FROM users where md5(id) = '$id' ";
        $result = $conn->query($sql);
        if($result){
            return $result;
            mysqli_close($conn);
        }
    }

    public function updateUser($params,$id){
        $conn = $this->makeConnection();
        $fname = trim($params['fname']);
        $lname = trim($params['lname']);
        $username = $params['username'];
        $password = $params['password'];
        $email=$params['email'];
        $status=$params['status'];
        $contact = $params['contact'];
        $date = date('Y-m-d h:i:sa');
        $con_password = $params['con_password'];
        $query = "UPDATE users SET fname='$fname',lname='$lname',password='$password',email='$email',mobile='$contact',status='$status',updated_at='$date' 
                WHERE md5(id) = '$id'";
        $result = mysqli_query($conn,$query);
        if($result){

            $_SESSION['success'] = "Updated successfully";

            header('location:../user/list.php');
            mysqli_close($conn);
        }else{
            echo "ERROR";
        }
    }
}



?>