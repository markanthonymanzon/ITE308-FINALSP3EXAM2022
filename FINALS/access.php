<?php
session_start();
$server_name="localhost";
$userid= "id";
$username="root";
$password="";
$database_name="p3finalexam";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}
