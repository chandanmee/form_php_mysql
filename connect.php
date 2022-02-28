<?php
$email = $_POST["email"];
$fname=$_POST["fname"];
$lname = $_POST["lname"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$mobile = $_POST["mobile"];
$subject = $_POST["subject"];

$conn =new mysqli('localhost','root','','enquiry');
if($conn->connect_error)
{
    echo "$conn->connect_error";
    die('Connection Failed:'.$conn->connect_error);
}
else
{
    $work=$conn->prepare("insert into enquiryform(email,fname,lname,city,pin,mobile,subject) values(?,?,?,?,?,?,?)");
    $work->bind_param("sssssss",$email,$fname,$lname,$city,$pin,$mobile,$subject);
    $work->execute();
    echo "Registration Successful";
    $work->close();
    $conn->close();
}
