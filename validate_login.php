<?php
session_start();
$_SESSION["username"]=$_POST["username"];
$username=$_POST["username"];
$_SESSION["psw"]=$_POST["psw"];
$psw=$_POST["psw"];
$conn=new mysqli("localhost", "root", "", "mydb");
if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
}
$s="select * from details where username='$username'and psw='$psw';";
$r=$conn->query($s);
if($r->num_rows)
{
    while($row=$r->fetch_assoc())
    {
        if($row[username]==$username)
        {
            header("location: welcome_dp.php");
echo"<a href='calory_calc'>calculate</a>";
                   
        }
        else 
        {
            echo "THIS USERNAME IS NOT REGISTERED PLEASE REGISTER";
            include "registration_dp.html";
        }
    }
}
    $conn->close();
?>