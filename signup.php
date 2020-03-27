

<?php 
$conn = mysqli_connect("localhost", "root");
if($conn){
    echo "connected";
}else{
    echo "failed to connect";
}

mysqli_select_db($conn,'myweb');
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];


$query_select = "SELECT * FROM signup_form WHERE email ='$email'";
$result = mysqli_query($conn, $query_select);
$ispresent = mysqli_num_rows($result);
echo $ispresent;
if($ispresent>0){ 
    header('location:fristpage.php');  
  return false;
   }else if($pass1 == $pass2){
   header('location:firstpage.php');
    $q = "INSERT INTO signup_form(first_name,second_name,email,password1) VALUES('$fname','$sname','$email','$pass1')";
    $test = mysqli_query($conn, $q);
    if($test){
        echo "inserted ";
    }else{
        echo "failed".mysqli_error($conn);
    }
}else{
  header('location: firstpage.php');
   echo "password doesnt match";

}
    

mysqli_close($conn);

?>
