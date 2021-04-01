<?php
session_start();
header('location:reg.html');
//check connection
$con = mysqli_connect('localhost','root');
if($con){
    echo "connection successful";
}
else{
    echo "no connection";

}
//select database
mysqli_select_db($con,'sessionpractical');
$name= $_POST['user'];
$pass= $_POST['pass'];

$q ="select * from signin where name='$name' && password='$pass' ";
//if user name in database and this name are same, file a query.
$result=mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num==1){
    echo"duplicate data";
}
else{
    $qy="insert into signin(name,password) values('$name','$pass')";
    mysqli_query($con,$qy);
}

?>
