<?php

$conn = mysqli_connect("localhost","root");
session_start();
mysqli_select_db($conn, 'myweb');
header('location: home.php');
$books = $_POST['books'];
$movies = $_POST['movies'];
$songs = $_POST['songs'];
$weather = $_POST['weather'];
$singer = $_POST['singer'];
$email =$_SESSION['mysession'];
$query_select = "SELECT * FROM matchform WHERE email ='$email'";
$result = mysqli_query($conn, $query_select);
$ispresent = mysqli_num_rows($result);
echo $ispresent;
if(!$ispresent>0){
$query_ins = "INSERT INTO matchform(email,books,movies,songs,weather,singer) values('$email','$books','$movies','$songs','$weather','$singer')";
$query1 = mysqli_query($conn,$query_ins);

if($query1){
    echo "insetred";
}else{
    echo "ervror".mysqli_error($conn);
}
}else{

$query_update = "UPDATE matchform set email='$email', books='$books',movies='$movies',songs='$songs' ,weather='$weather',singer='$singer' where email='$email'";
$query_u= mysqli_query($conn,$query_update);

if($query_u){
    echo "updated";
}else{
    echo "ervror".mysqli_error($conn);
}

}


?>
