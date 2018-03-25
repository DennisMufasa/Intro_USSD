<?php
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$data = explode("*", $text);//delimeter splits array at * for multiple option inputs

//var_dump($data);

if ($text=="")
{
    $response = "CON Welcome to KCB\n1.Check Balance\n2.Register Account\n3.Withdraw funds";
}
elseif ($text =="1")
{
    $response = "END Your balance is KES 1000";
}elseif ($text=="2")//text=2
{
    $response = "CON Enter your ID Number";
}
elseif ($data[0]=="2" and count($data)==2)//text=2*44455566
{
    $response = "CON Enter Your names";
}
elseif ($data[0]=="2" and count($data)==3)//text=2*44455566*Hellen
{
    $response = "CON Enter Your secret PIN";
}
elseif ($data[0]=="2" and count($data)==4)//text=2*44455566*Hellen*6666
{
    $response = "END Thank You $data[2] for registering";
}


header("Content-type:text/plain");
echo $response;
