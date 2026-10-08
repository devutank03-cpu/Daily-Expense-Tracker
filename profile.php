<?php
include("session.php");
$exp_fetched=mysqli_query($con,"SELECT * FROM expenses WHERE user_id='$user_id'");
if(isset($_POST['save']))
{
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $useremail=$_POST['useremail'];
    $sql="UPDATE users SET firstname='$fname',lastname='$lname' WHERE user_id='$user_id'";
    if(mysqli_query($con,$sql))
    {
        echo "Records were updated successfully.";
    }
    else
    {
        echo "ERROR: could not able to execute $sql.".mysqli_error($con);
    }
    header('location:profile.php');
}
if(isset($_POST['but_upload']))
{
    $name=$_FILES['file']['name'];
    $target_dir="uploads/";
    $target_file=$target_dir.basename($_FILES["file"]["name"]);

    //select file type
    $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //valid file extensions
    $extensions_arr=array("jpg","jpeg","png","gif");

    //check extension
    if(in_array($imageFileType ,$extensions_arr))
    {
        //insert record
        $query="UPDATE users SET profile_path='$name' WHERE user_id='$user_id'";

        //upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
        header("Refresh: 0");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Expense Manager - Dashboard</title>
        <!--Bootstrap core css-->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!--custome style for this -->
        <link href="css/style.css" rel="stylesheet">

        <script src="js/feather.min.js"></script>
        <style>
            .try
            {
                font-size:28px;
                color:#333;
                padding:15px 65px 5px 0px;
            }
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!--sidebar-->
        <div class="border-right" id="sidebar-wrapper">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="uploads\profile.jpg" width="120">
                <h5><?php echo $username ?></h5>
                <p><?php echo $useremail ?></p>
             </div>
             
             <div class="sidebar-heading">Management</div>
             <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action"><span data-feather="home"></span>Dashboard</a>
                <a href="add_expense.php" class="list-group-item list-group-item-action"><span data-feather="plush-square"></span>Add Expenses</a>
                <a href="manage_expense.php" class="list-group-item list-group-item-action"><span data-feather="dollar-sign"></span>manage expenses</a>
                <a href="expensereport.php" class="list-group-item list-group-item-action"><span data-feather="file-text"></span>Expense Report</a>
            </div>
            <div class="sidebar-heading">Setting</div>
            <div class="list-group list-group-flush">
            <a hhref="profile.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="user"></span>profile</a>
            <a hhref="logout.php" class="list-group-item list-group-item-action"><span data-feather="power"></span>Logout</a>
            </div>
        </div>

        <!--#sidebar-wraperA-->
            <!--page content-->
             <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light border-bottom">

        <!--<button class="toggle-btn" onclick="toggleSidebar()">
        <div class="content">
        <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
             <span data-feather="menu"></span> 
        </button>-->
        <div class="col-md-12 text-center">
            <h3 class="try">Update Profile</h3>
        </div>
            <hr>
        </nav>
        
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form class="form" method="post" action="" enctype='multipart/form-data'>
                                <div class="text-center mt-3">
                                    <img src="uploads\profile.jpg" class="text-center img img-fluid rounded-circle avatar" width="120" alt="profile picture">
                                </div>
                                <div class="input-group col-md mb-3 mt-3">
                                </div>
                            </form>
                            <form class="form" action="" method="post" id="registrationForm" autocomplete="off">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="col-md">
                                            <label for="first_name" style="color:yellow";>
                                                first_name
                                            </label>
                                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $firstname;?>">
                                        </div>
                                    <div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="col-md">
                                            <label for="last_name" style="color:yellow";>
                                                Last_name
                                            </label>
                                            <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname;?>" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md">
                                        <label for="email" style="color:yellow";>
                                              Email
                                        </label>
                                         <input type="text" class="form-control" name="email" id="email" value="<?php echo $useremail;?>">

                                    </div>
                                </div>
                                    <div class="form-group">
                                        <div class="col-md">
                                            <br>
                                            <button class="btn btn-block btn-md btn-success" style="border-radius:0%;" name="save" type="Submit">Save Changes</button>
                                        </div>
                                    </div>

                            </form>
                        <!--/tab-content-->
                                </div>
                                <!--/col-9-->
                             </div>
                        </div>
                     </div>
                     <!--/#page-content-wrapper-->
                 </div>
            </div>
        <!--/#wrapper--> 
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>

    <!--menu toggle script-->
    <script>
        $("#menu-toggle").click(function(e)
        {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace()
    </script> 
    <script type="text/javascript">     
    $(document).ready(function(){
        var readURL=function(input)
        {
            if(input.file && input.files[0])
            {
                var reader=new FileReader();
                reader.onload=function(e){
                    $('.avaatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.file[0]);
            }
        }
        $(".file-upload").on('change',function()
        {
            readURL(this);
        });
    });
    </script>
    </body>
</html>

        


