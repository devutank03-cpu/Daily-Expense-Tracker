<?php
require('config.php');
if(isset($_REQUEST['firstname']))
{
    if($_REQUEST['password']==$_REQUEST['confirm_password'])
    {
        $firstname=stripslashes($_REQUEST['firstname']);
        $firstname=mysqli_real_escape_string($con,$firstname);

        $lastname=stripslashes($_REQUEST['lastname']);
        $lastname=mysqli_real_escape_string($con,$lastname);

        $email=stripslashes($_REQUEST['email']);
        $email=mysqli_real_escape_string($con,$email);

        $password=stripslashes($_REQUEST['password']);
        $password=mysqli_real_escape_string($con,$password);

        $query="insert into `users` (firstname,lastname,password,email)values('$firstname','$lastname','".md5($password)."','$email')";
        $result=mysqli_query($con,$query);

        if($result)
        {
            header("Location:login.php");
        }
    }
    else
    {
        echo("Error: Please chaeck your password & configration password");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,intial-scale=1,shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Bootstrap core css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        .body{
            color:#000;
            background:#fff;
            font-family:'Roboto',sans-serif;
            
    
        }
        .form-control{
            height:40px;
            box-shadow:none;
            color:#969fa4;
            border:2px solid;
            background:yellow;
            
        }
        .form-control:focus{
            border-color:#5cb85c;

        }
        .form-control,
        .btn
        {
            border-radius:3px;
        }
        .signup-form{
            width:450px;
            margin:0 auto;
            padding:10px 0;
            font-size:15px;
            margin-bottom:10px;
            margin-top:50px;
        }
        .signup-form h2{
            color:#636363;
            margin:0 0 15px;
            position:relative;
            text-align:center;
        }
        .signup-form h2:before,
        .signup-form h2:after{
            content="";
            height:2px;
            width:30%;
            background:#d4d4d4;
            position:absolute;
            top:50%;
            z-index:2;
        }
        .signup-form h2:before{
            left:0;
        }
        .signup-form h2:after{
            right:0;
        }
        .signup-form .hint-text{
            color:#999;
            margin-bottom:30px;
            text-align:center;
        }
        .signup-form form{
            color:#999;
            border-radius:3px;
            margin-bottom:15px;
            background:#fff;
            box-shadow:0px 2px 2px rgba(0,0,0,0.3);
            padding:30px;
            border:3px solid black;
            background-image:radial-gradient(pink,skyblue,gold);
        }
        .signup-form .form-group{
            margin-bottom:20px;
        }
        .signup-form input[type="checkbox"]{
            margin-top:3px;
        }
        .signup-form .btn{
            font-size:16px;
            font-weight:bold;
            min-width:140px;
            outline:none !important;
            margin-left:120px;
        }
        .signup-form .row div:first-child{
            padding-right:10px;
        }
        .signup-form .row div:last-child{
            padding-left:10px;
        }
        .signup-form a:hover{
            text-decoration:none;
        }
        .signup-form form a{
            color:#5cb85c;
            text-decoration:none;
        }
        .signup-form form a:hover{
            text-decoration:underline;
        }
    </style>
    </head>
    <body>
        <div class="signup-form">
            <form action="" method="POST" autocomplete="off">
                <h2>Register</h2>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col"><input type="text" class="form-control" name="firstname" placeholder="First Name"required="required"></div>
                        <div class="col"><input type="text" class="form-control" name="lastname" placeholder="Last Name"required="required"></div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="password" required="required">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="confirm_password" required="required">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-lg btn-block" style="border-radius:0%;">Register</button>
                </div>
            
            <div class="text-center">Already have an account?<a class="text-success" href="login.php">Login here</a></div>
            </form>
        </div>
    </body>
                    


    <!-- Bootstrap core javascript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/profile-picture.js"></script>

    

        <!--Menu toggle script-->
    <script>
        $("#menu-toggle").click(function (e)
        {
                e.preventDefault();
                $("#Wrapper").toggleclass("toggled");
        });
    </script>
    <script>
        feather.replace()
    </script>
</html>