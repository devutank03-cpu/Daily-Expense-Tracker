<?php
$con=mysqli_connect("localhost","root","","dailyexpense");
if(mysqli_connect_error())
{
    echo"Failed to connect to MYSQL:".mysqli_connect_error()." seems like you haven't created the DATABASE with an exact name";

}
?>