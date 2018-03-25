<?php
$phoneNumber=$_POST["phoneNumber"];
$text=$_POST["text"];
$options=explode("*","$text");

if ($text=="")//user pressed nothing
{
    $response="CON Welcome to Equity Mobile Banking Services\n1.Register Account\n2.My Account";
}elseif ($text=="1") //user pressed 1
{
    $response="CON Registration Forum\nEnter your ID number";
}elseif ($options[0]=="1" and count($options)==2)//user pressed 1*31948762
{
    $response="CON Enter your full name";
}elseif ($options[0]=="1" and count($options)==3)//user pressed 1*31948763*Dennis Mufasa
{
    $response="CON Enter your secret pin";
}elseif ($options[0]=="1" and count($options)==4)//user pressed 1*31948763*Dennis Mufasa*1234
{
    $response="CON Confirm your details\nID:$options[1]\nName:$options[2]\nPin:$options[3]\n1.Accept\n2.Decline";
}elseif ($options[4]=="1" and count($options)==5)//userpressed 1*31948763*Dennis Mufasa*1234*1
{
    $connect=mysqli_connect("localhost","root","","studentss") or die('Connection Failed' . mysqli_connect_error());
    $sql="INSERT INTO `equity`(`IDNumber`, `name`, `pin`) VALUES 
                              ('$options[1]','$options[2]','$options[3]')";
    mysqli_query($connect,$sql);

    $response="END Registration Complete!";
}else{$response="Registration Cancelled!";}

header("Content-type:text/plain");
echo $response;