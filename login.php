

<?php  
session_start();
$conn = mysqli_connect("localhost", "root");

if($conn){
    echo "connected";
}else{
    echo "failed to connect";
}

mysqli_select_db($conn,'myweb');
$user_name = $_POST['user_name'];
$user_password = $_POST['password'];
$_SESSION['mysession'] = $user_name;
$qury_select = "SELECT * FROM signup_form WHERE email ='$user_name' && password1= '$user_password'";
$result = mysqli_query($conn, $qury_select);
$ispresent = mysqli_num_rows($result);
if($ispresent >0){
    header('location: home.php');
    echo "present";
}else{
header('location: firstpage.php');
  
}
die;
?>
