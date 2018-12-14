<html>
<head>
<style>
body{
background-image: url("diet-food_625x350_61434110132.jpg ");
background-repeat:no-repeat;
background-size:1300px 650px;
color:white
}
</style>
</head>
</html>

<?php
$conn = new mysqli("localhost", "root", "", "mydb");
if ($conn->connect_error) {
    die("connection-failed".$conn->connect_error);
}?>
<?php
    $x = $_POST["username"];
    $y = $_POST["email"];
    $z=  $_POST["psw"];
    $sql = "insert into details values('" . $x . "','" . $y . "','".$z."')";
    $conn->query($sql);
    echo "your done with your registration</br>";
	echo"<a href='login_dp.php'>login</a>";

?>
