<?php

$phoneNumber=$_POST["phoneNumber"];
$text=$_POST["text"];
$options=explode("*","$text");

if ($text=="")
{
    $response="CON Welcome to IEBC\n1.Show Voter Details\n2.Register Voter";
}elseif ($text=="1")
{
    $response="END You're a registered Voter";
}elseif ($text=="2")//2
{
    $response="CON Enter your ID Number";
}elseif ($options[0]=="2" and count($options)==2)//2*33333333
{
    $response="CON Enter your full names";
}elseif ($options[0]=="2" and count($options)==3)//2*333333*Denis
{
    $response="CON Enter your voter station county";
}elseif ($options[0]=="2" and   count($options)==4)//2*333333*Denis*Kiambu
{
    $response="CON Enter your voter station sub-county";
}elseif ($options[0]=="2" and count($options)==5)//2*333333*Denis*kiambu*kikuyu
{
    $response="CON Registration Complete\nConfirm details\nName:$options[2]\nID:$options[1]\nCounty:$options[3]\nSubCounty:$options[4]\n1.Accept\n2.Cancel";
}elseif ($options[0]=="2" and count($options)==6)//2*333333*Denis*kiambu*kikuyu*1
{
    if ($options[5]=="1")
    {
        $connect=mysqli_connect("localhost","root","","studentss") or die('Connection Failed' . mysqli_connect_error());
        $sql="INSERT INTO `voters`(`id`, `names`, `phone`, `nat_Id`, `county`, `subcounty`)VALUES 
                                  (null,'$options[2]','$phoneNumber','$options[1]','$options[3]','$options[4]')";
        mysqli_query($connect,$sql);


        $response="END Registration successful.";
    }else
    {
        $response="END Registration Cancelled";
    }
}

header("Content-type:text/plain");
echo $response;
