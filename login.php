<?php
require('config.php');
session_start();
$errormsg="";
if(isset($_POST['email']))
{
    $email=stripslashes($_REQUEST['email']);
    $email=mysqli_real_escape_string($con,$email);
    $password=stripslashes($_REQUEST['password']);
    $password=mysqli_real_escape_string($con,$password);
    $query="SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
    $rows=mysqli_num_rows($result);
    if($rows==1)
    {
        $_SESSION['email'] = $email;
        header("Location: index.php");
    }
    else
    {
        $errormsg = "wrong";
    }
}
else{}
?>

<!DOCTYPE html>

<html lang="en">


    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,intial-scale=1,shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!--Bootstrap core css-->
    <link href="css/style.css" rel="stylesheet"> 
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        
    .login-form
    {
        width:340px;
        margin:50px auto;
        font-size:15px;
        border-top: #000;
        border: 3px solid;
        background-image:linear-gradient(green,yellow);
        /* height:25px; */
        
        
    }
    .login-form form
    {
        margin-bottom:15px;
        background-image:linear-gradient(yellow,red,pink);
        box-shadow:0px 2px 2px rgba(0, 0, 0, 0.3);
        padding:30px;
        border:1px solid #ddd;
        /* width:20px; */
    }
    .login-form h2
    {
        color:#636363;
        margin:0 0 15px;
        position:relative;
        text-align:center;
    }
    
    .login-form h2:after
    {
        right:0;
    }
    .login-form.hint-text
    {
        color:#aaa;
        margin-bottom:30px;
        text-align:center;
    }
    .login-form a:hover
    {
        text-decoration:none;
    }
    .form-control,
    .btn
    {
        min-height:38px;
        
        border-radius:2px;
    }
    .btn
    {
        font-size:15px;
        font-weight:bold;
        width: 190px;
        margin-left:50px;
    }

 /* .form-control{
            height:40px;
            box-shadow:none;
            color:#969fa4;
            border:2px dotted;
           
} 
 .form-group{
    margin-left:400px;
} */

</style> 
</head>
<body>
   
    <div class="login-form">
        <form action="" method="POST" autocomplete="off">
        
            <h2 class="text-center">Personal Expense Tracker</h2>
            <h5 class="text-center">Login panel</h5>    
            <div class="form-group">
                
                <input type="text" name="email" class="form-control" placeholder="Email" require="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password" require="required">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block" style="border-radius:0%">Login</button>
        </div>
        </form>
            <p class="text-center">Dont have an account?<a href="register.php"class="text-danger">Register Here</a></p>
    
</div>
</body>

<!--Bootsrap core javascript-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/feather.min.js"></script>

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