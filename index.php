<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .border-error{
            border:2px red solid;
        }
    </style>
</head>

<body>
    <div>
        <form action="" id="getForm" method="post">
            <label>Name</label>
            <input type="text" name="name" id="name"><br>
            <label>Age</label>
            <input type="number" name="age" id="age"><br>
            <label>email</label>
            <input type="email" name="email" id="email"><br>
            <label>Username</label>
            <input type="text" name="username" id="username"><br>
            <label>password</label>
            <input type="password" name="password" id="password"><br>
            <label>Confirm password</label>
            <input type="password" class="hello" name="con_password" id="con_password"><br>
            <label>phone number</label>
            <input type="number" name="contact" id="contact"><br>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>

    <script src="vendor/jquery-validation/jquery.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jQuery-Mask/dist/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $.validator.addMethod('strongPassword',function(value){
                return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/.test(value);
            },"A password must contain UpperCase, LowerCase and a Number");
            $.validator.addMethod('numberCheck',function(value){
                return /^[9]/.test(value);
            },"Invalid number format");
            $("#getForm").validate({
                rules: {
                    name:{
                        required:true,
                        maxlength:200,
                        minlength:3,
                        lettersonly:true,
                    },
                    email:{
                        required:true,
                        email:true,
                    },
                    password:{
                        required:true,
                        minlength:8,
                        maxlength:30,
                        strongPassword:true,
                    },
                    con_password:{
                        required:true,
                        equalTo:"#password",
                    },
                    age:{
                        required:true,
                        number:true
                    },
                    username:{
                        required:true,
                        nowhitespace:true
                    },
                    contact:{
                        required:true,
                        numberCheck:true,
                        number:true,
                        maxlength:10,
                        minlength:10,
                    }

                },
                highlight:function(element){
                    $(element).addClass('border-error');
                },
                unhighlight:function(element){
                    $(element).removeClass('border-error');
                },
                messages:{
                    name:{
                        required:"Name field is mandatory",
                        minlength:"Name must be aleast 3 characters",
                    },
                    email:{
                        required:"Email field is mandatory",
                        email:"Invalid email",
                    },
                    contact:{
                        minlength:"Contact detail must be of 10 numbers",
                        maxlength:'Invalid Number',
                    }

                }
            });
        })
    </script>
</body>

</html>