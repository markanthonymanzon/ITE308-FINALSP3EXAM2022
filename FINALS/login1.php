<?php
session_start();
$server_name="localhost";
$username="root";
$password="";
$database_name="p3finalexam";



$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn){
    die("Connection Failed:" . mysqli_connect_error());
}else "Connected";

if(isset($_POST['uname']) && isset($_POST['pin'])){

    function validata($data){
        $data = trim ($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validata($_POST['uname']);
    $pin = validata ($_POST['pin']);

    if (empty($uname)){
        header("location: login2.php?error=uname Required");
        exit();

    } else if (empty($pin)) {
        header("location: login2.php?error=pin Required");
        exit();

    }else {
        $sql = "SELECT * FROM login WHERE userName='$uname' AND pword='$pin' limit 1";

        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) === 1) {
            header("location: page2.html");
        } else {
            header("location: login2.php?error=Incorrect Username and Password, Please Try Again!!!");
            exit();
        }
    }

}else {

    header("location: login2.php");
    exit();

}